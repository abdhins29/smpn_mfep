<?php 
	include ("style/header.php");
	include ("style/sidebar.php");
?>
<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Kriteria</h6>
		</div>
		<div class="card-body">
			<div class="form-group">	
				<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_kriteria"><i class="fas fa-plus fa-sm"></i> Tambah Kriteria</button>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th style="text-align: center;">No</th>
							<th style="text-align: center;">Nama Kriteria</th>
							<th style="text-align: center;">Atribut</th>
							<th style="text-align: center;" colspan="2">Aksi</th>
						</tr>
					</thead>
					<?php 
					include ("../config/koneksi.php");
					$no = 1;
					$sql = mysqli_query($konek,"SELECT * FROM tbl_kriteria");
					while ($data = mysqli_fetch_array($sql)){
					?>
					<tbody>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data['nm_kriteria']; ?></td>
							<td><?php echo $data['atribut']; ?></td>
							<td style="text-align: center;"><a href="editkriteria.php?kd=<?php echo $data['kd_kriteria']; ?>"><i class="btn btn-success btn-sm"><span class="fas fa-edit fa-sm"></span></i></a></td>
							<td style="text-align: center;"><a href="hapuskriteria.php?kd=<?php echo $data['kd_kriteria']; ?>"><i class="btn btn-danger btn-sm"><span class="fas fa-trash fa-sm"></span></i></a></td>
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
<div class="modal fade" id="tambah_kriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      		include ("../config/koneksi.php");
      		$querykri=mysqli_query($konek,"SELECT * FROM tbl_kriteria");
      		$jmlkri=mysqli_num_rows($querykri);
      		if($jmlkri==0){
      			$id="C0001";
      		}else{
      			$query1=mysqli_query($konek,"SELECT * FROM tbl_kriteria ORDER BY kd_kriteria DESC");
      			$datakri=mysqli_fetch_array($query1);
      			$subid = substr($datakri['kd_kriteria'],1);
      			if($subid>0 && $subid<=8){
      				$sub = $subid+1;
      				$id='C000'.$sub;
      			}elseif($subid>=9 && $subid<=100){
      				$sub = $subid+1;
      				$id='C00'.$sub;
      			}elseif($subid>=99 && $subid<=1000){
      				$sub = $subid+1;
      				$id='C0'.$sub;
      			}
      		}
      		?>
      		<div class="form-group">
                <label>Kode Kriteria</label>
      			<input type="text" class="form-control mb-2" name="kd_kriteria" value="<?php echo $id; ?>" readonly>
      		</div>
      		<div class="form-group">
      			<label>Nama Kriteria</label>
      			<input type="text" class="form-control mb-2" name="nm_kriteria" placeholder="Masukan Nama Kriteria" required="">
      		</div>
      		<div class="form-group">
      			<label>Atribut</label>
      			<input type="text" class="form-control mb-2" name="atribut" placeholder="Masukan Nilai Atribut" required="">
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
	$save = mysqli_query($konek,"INSERT INTO tbl_kriteria VALUES('$_POST[kd_kriteria]','$_POST[nm_kriteria]','$_POST[atribut]')");

	if($save) {
      echo "<script language=javascript>
          window.alert('Berhasil Menambah!');
          window.location='datakriteria.php';
          </script>";
      }else{
        echo "<script language=javascript>
          window.alert('Gagal Menambah!');
          window.location='datakriteria.php';
          </script>";
      }
}
?>
<?php 
	include ("style/footer.php");
?>