<?php 
	include ("style/header.php");
	include ("style/sidebar.php");
  include ("../config/koneksi.php");
?>
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Nilai Kriteria</h6>
		</div>
		<div class="card-body">
			<div class="form-group">	
				<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_nilaikriteria"><i class="fas fa-plus fa-sm"></i> Tambah Nilai Kriteria</button>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th style="text-align: center;">No</th>
							<th style="text-align: center;">Kode Crips</th>
							<th style="text-align: center;">Kriteria</th>
              <th style="text-align: center;">Nama Crips</th>
              <th style="text-align: center;">Nilai</th>
							<th style="text-align: center;" colspan="2">Aksi</th>
						</tr>
					</thead>
					<?php 
					$no = 1;
					$sql = mysqli_query($konek,"SELECT * FROM tbl_kriteria a LEFT JOIN tbl_crips b ON a.kd_kriteria=b.kd_kriteria WHERE b.kd_crips = kd_crips");
					while ($data = mysqli_fetch_array($sql)){
					?>
					<tbody>
						<tr>
							<td><?php echo $no++; ?></td>
              <td><?php echo $data['kd_crips']; ?></td>
              <td><?php echo $data['nm_kriteria']; ?></td>
							<td><?php echo $data['nm_crips']; ?></td>
							<td><?php echo $data['nilai']; ?></td>
							<td style="text-align: center;"><a href="editnilaikriteria.php?kd=<?php echo $data['kd_crips']; ?>"><i class="btn btn-success btn-sm"><span class="fas fa-edit fa-sm"></span></i></a></td>
							<td style="text-align: center;"><a href="hapusnilaikriteria.php?kd=<?php echo $data['kd_crips']; ?>"><i class="btn btn-danger btn-sm"><span class="fas fa-trash fa-sm"></span></i></a></td>
						</tr>
					</tbody>
					<?php 
					}
					?>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_nilaikriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Entry Data Kriteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="" method="POST" enctype="multipart/form-data">
      		<?php 
      		$querykri=mysqli_query($konek,"SELECT * FROM tbl_crips");
      		$jmlkri=mysqli_num_rows($querykri);
      		if($jmlkri==0){
      			$id="R0001";
      		}else{
      			$query1=mysqli_query($konek,"SELECT * FROM tbl_crips ORDER BY kd_crips DESC");
      			$datakri=mysqli_fetch_array($query1);
      			$subid = substr($datakri['kd_crips'],1);
      			if($subid>0 && $subid<=8){
      				$sub = $subid+1;
      				$id='R000'.$sub;
      			}elseif($subid>=9 && $subid<=100){
      				$sub = $subid+1;
      				$id='R00'.$sub;
      			}elseif($subid>=99 && $subid<=1000){
      				$sub = $subid+1;
      				$id='R0'.$sub;
      			}
      		}
      		?>
      		<div class="form-group">
                <label>Kode Kriteria</label>
      			<input type="text" class="form-control" name="kd_crips" value="<?php echo $id; ?>" readonly>
      		</div>
      		<div class="form-group">
      			<label>Nama Kriteria</label>
            <select name="kd_kriteria" class="form-control">
              <option value="pilih kriteria">Pilih Kriteria</option>
              <?php 
              $sql2 = mysqli_query($konek, "SELECT * FROM tbl_kriteria");
              while($data2 = mysqli_fetch_array($sql2)){
              ?>
              <option value="<?php echo $data2['kd_kriteria'] ?>"><?php echo $data2['nm_kriteria']; ?></option>
              <?php 
              }
              ?>
            </select>
      		</div>
      		<div class="form-group">
      			<label>Nama Crips</label>
      			<input type="text" class="form-control" name="nm_crips" placeholder="Masukan Nama Crips" required="">
      		</div>
          <div class="form-group">
            <label>Nilai</label>
            <input type="text" class="form-control" name="nilai" placeholder="Masukan Nilai Crips" required="">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="tambah" class="btn btn-primary btn-sm">Tambah</button>
      </div>
      	</form>
    </div>
  </div>
</div>

<?php
if(isset($_POST['tambah'])){
	$save = mysqli_query($konek,"INSERT INTO tbl_crips VALUES('$_POST[kd_crips]','$_POST[kd_kriteria]','$_POST[nm_crips]','$_POST[nilai]')");

	if($save) {
      echo "<script language=javascript>
          window.alert('Berhasil Menambah!');
          window.location='datanilaikriteria.php';
          </script>";
      }else{
        echo "<script language=javascript>
          window.alert('Gagal Menambah!');
          window.location='datanilaikriteria.php';
          </script>";
      }
}
?>
<?php 
	include ("style/footer.php");
?>