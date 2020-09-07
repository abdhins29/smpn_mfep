<?php
	include ("style/header.php");
	include ("style/sidebar.php");
	include ("../config/koneksi.php");	
?>
<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Guru</h6>
		</div>
		<div class="card-body">
			<div class="form-group">	
				<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_guru"><i class="fas fa-plus fa-sm"></i> Tambah Guru</button>
				<h3>Guru dapat Login dengan menggunakan NIP sebagai Username dan Password.</h3>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th style="text-align: center;">No</th>
							<th style="text-align: center;">NIP</th>
							<th style="text-align: center;">Nama Guru</th>
							<th style="text-align: center;">Jabatan</th>
							<th style="text-align: center;" colspan="2">Aksi</th>
						</tr>
					</thead>
					<?php 
					$no = 1;
					$sql = mysqli_query($konek,"SELECT * FROM tbl_guru");
					while ($data = mysqli_fetch_array($sql)){
					?>
					<tbody>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data['nip']; ?></td>
							<td><?php echo $data['nm_guru']; ?></td>
							<td><?php echo $data['jabatan']; ?></td>
							<td style="text-align: center;"><a href="editguru.php?kd=<?php echo $data['id_guru']; ?>"><i class="btn btn-success btn-sm"><span class="fas fa-edit fa-sm"></span></i></a></td>
							<td style="text-align: center;"><a href="hapusguru.php?kd=<?php echo $data['id_guru']; ?>"><i class="btn btn-danger btn-sm"><span class="fas fa-trash fa-sm"></span></i></a></td>
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
<div class="modal fade" id="tambah_guru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Entry Data Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="" method="POST" enctype="multipart/form-data">
      		<div class="form-group">
                <label>NIP Guru</label>
      			<input type="text" class="form-control mb-2" name="nip" placeholder="Masukan NIP Guru" required="">
      		</div>
      		<div class="form-group">
      			<label>Nama Guru</label>
      			<input type="text" class="form-control mb-2" name="nm_guru" placeholder="Masukan Nama Guru" required="">
      		</div>
      		<div class="form-group">
      			<label>Jabatan</label>
      			<input type="text" class="form-control mb-2" name="jabatan" placeholder="Masukan Jabatan Guru" required="">
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
	$querykri=mysqli_query($konek,"SELECT * FROM tbl_guru");
      		$jmlkri=mysqli_num_rows($querykri);
      		if($jmlkri==0){
      			$id="G0001";
      		}else{
      			$query1=mysqli_query($konek,"SELECT * FROM tbl_guru ORDER BY id_guru DESC");
      			$datakri=mysqli_fetch_array($query1);
      			$subid = substr($datakri['id_guru'],1);
      			if($subid>0 && $subid<=8){
      				$sub = $subid+1;
      				$id='G000'.$sub;
      			}elseif($subid>=9 && $subid<=100){
      				$sub = $subid+1;
      				$id='G00'.$sub;
      			}elseif($subid>=99 && $subid<=1000){
      				$sub = $subid+1;
      				$id='G0'.$sub;
      			}
      		}
	$save = mysqli_query($konek,"INSERT INTO tbl_guru VALUES('$id','$_POST[nip]','$_POST[nm_guru]','$_POST[jabatan]')");
	$save2 = mysqli_query($konek,"INSERT INTO tbl_login VALUES('','$id','$_POST[nip]','$_POST[nip]','guru')");

	if($save) {
      echo "<script language=javascript>
          window.alert('Berhasil Menambah!');
          window.location='dataguru.php';
          </script>";
      }else{
        echo "<script language=javascript>
          window.alert('Gagal Menambah!');
          window.location='dataguru.php';
          </script>";
      }
}
?>
<?php 
	include ("style/footer.php");
?>