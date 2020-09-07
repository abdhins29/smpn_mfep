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

<?php 
	include ("style/footer.php");
?>