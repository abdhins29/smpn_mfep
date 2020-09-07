<?php 
	include ("style/header.php");
	include ("style/sidebar.php");
  function tgl_indo($tanggal){
    $bulan = array(
      1 => 'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember',);
    $pecahkan = explode('-', $tanggal);
    return $pecahkan[2] . '-' . $bulan[(int)$pecahkan[1]] . '-' . $pecahkan[0];
  }
?>
<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Pendaftaran</h6>
		</div>
		<div class="card-body">
			<div class="form-group">	
				<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_pendaftaran"><i class="fas fa-plus fa-sm"></i> Tambah Pendaftaran</button>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th style="text-align: center;">No</th>
							<th style="text-align: center;">NISN</th>
							<th style="text-align: center;">Nama Siswa</th>
							<th style="text-align: center;">Jenis Kelamin</th>
							<th style="text-align: center;">Tempat/Tanggal Lahir</th>
							<th style="text-align: center;">Nama Orang Tua</th>
							<th style="text-align: center;">Sekolah Asal</th>
							<th style="text-align: center;">No. Telp</th>
							<th style="text-align: center;">Rata-Rata UN</th>
             	<th style="text-align: center;">Prestasi Akademik/Non Akademik</th>
							<th style="text-align: center;" colspan="3">Aksi</th>
						</tr>
					</thead>
					<?php 
					include ("../config/koneksi.php");
					$no = 1;
					$sql = mysqli_query($konek,"SELECT * FROM tbl_siswa ORDER BY nisn ASC");
					while ($data = mysqli_fetch_array($sql)){
					?>
					<tbody>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data['nisn']; ?></td>
							<td><?php echo $data['nm_siswa']; ?></td>
							<td><?php echo $data['jenis_kelamin']; ?></td>
							<td><?php echo $data['tempat_lahir']; ?>/<?php echo tgl_indo($data['tanggal_lahir']); ?></td>
							<td><?php echo $data['nm_orangtua']; ?></td>
							<td><?php echo $data['sekolah_asal']; ?></td>
							<td><?php echo $data['no_telp']; ?></td>
							<td><?php echo $data['rata_un']; ?></td>
            	<td><?php echo $data['prestasi']; ?></td>
							<td style="text-align: center;"><a href="editpendaftaran.php?kd=<?php echo $data['nisn']; ?>"><i class="btn btn-success btn-sm"><span class="fas fa-edit fa-sm"></span></i></a></td>
							<td style="text-align: center;"><a href="hapuspendaftaran.php?kd=<?php echo $data['nisn']; ?>"><i class="btn btn-danger btn-sm"><span class="fas fa-trash fa-sm"></span></i></a></td>
							<td style="text-align: center;"><a href="cetakpendaftaran.php?kd=<?php echo $data['nisn']; ?>"><i class="btn btn-primary btn-sm"><span class="fas fa-print fa-sm"></span></i></a></td>
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
<div class="modal fade" id="tambah_pendaftaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Entry Data Pendafataran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="" method="POST" enctype="multipart/form-data">
      		<div class="form-group">
            <input type="hidden" class="form-control" name="id" value="<?php echo $_SESSION['id']; ?>" readonly>
      			<label>NISN</label>
      			<input type="text" class="form-control" name="nisn" placeholder="Masukan NISN Siswa" required="">
      		</div>
      		<div class="form-group">
      			<label>Nama Siswa</label>
      			<input type="text" class="form-control" name="nm_siswa" placeholder="Masukan Nama Siswa" required="">
      		</div>
      		<div class="form-group">
      			<label>Jenis Kelamin</label>
      			<select name="jenis_kelamin" class="form-control" required="">
      				<option value="Pilih Jenis Kelamin">Pilih Jenis Kelamin</option>
      				<option value="Laki-Laki">Laki-Laki</option>
      				<option value="Perempuan">Perempuan</option>
      			</select>
      		</div>
      		<div class="form-group">
      			<label>Tempat Lahir</label>
      			<input type="text" class="form-control" name="tempat_lahir" placeholder="Masukan Tempat Lahir Siswa" required="">
      		</div>
      		<div class="form-group">
      			<label>Tanggal Lahir</label>
      			<input type="date" class="form-control" name="tanggal_lahir" placeholder="Masukan Tanggal Lahir Siswa" required="">
      		</div>
      		<div class="form-group">
      			<label>Nama Orang Tua</label>
      			<input type="text" class="form-control" name="nm_orangtua" placeholder="Masukan Nama Orang Tua Siswa" required="">
      		</div>
      		<div class="form-group">
      			<label>Sekolah Asal</label>
      			<input type="text" class="form-control" name="sekolah_asal" placeholder="Masukan Sekolah Asal Siswa" required="">
      		</div>
      		<div class="form-group">
      			<label>No. Telp</label>
      			<input type="text" class="form-control" name="no_telp" placeholder="Masukan No. Telp" required="">
      		</div>
      		<div class="form-group">
      			<label>Rata-Rata UN</label>
      			<input type="text" class="form-control" name="rata_un" placeholder="Masukan Nilai Rata-Rata UN Siswa" required="">
      		</div>
      		<div class="form-group">
      			<label>Prestasi Akademik/Non Akademik</label>
      			<select name="prestasi" class="form-control">
      				<option value="pilih prestasi">Pilih Prestasi</option>
      				<?php 
      				$sql2 = mysqli_query($konek, "SELECT * FROM tbl_crips");
      				while($data2 = mysqli_fetch_array($sql2)){
      					?>
      					<option value="<?php echo $data2['nm_crips']; ?>"><?php echo $data2['nm_crips']; ?></option>
      					<?php 
      				}
      				?>
      			</select>
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
	$save = mysqli_query($konek,"INSERT INTO tbl_siswa VALUES('$_POST[nisn]','$_POST[nm_siswa]','$_POST[jenis_kelamin]','$_POST[tempat_lahir]','$_POST[tanggal_lahir]','$_POST[nm_orangtua]','$_POST[sekolah_asal]','$_POST[no_telp]','$_POST[rata_un]','$_POST[prestasi]')");
	$save2 = mysqli_query($konek,"INSERT INTO tbl_daftar VALUES('','$_POST[nisn]','$_POST[id]','0')");

	if($save) {
      echo "<script language=javascript>
          window.alert('Berhasil Menambah!');
          window.location='datapendaftaran.php';
          </script>";
      }else{
        echo "<script language=javascript>
          window.alert('Gagal Menambah!');
          window.location='datapendaftaran.php';
          </script>";
      }
}
?>

<?php 
	include ("style/footer.php");
?>