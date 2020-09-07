<?php
	include ("style/header.php");
	include ("style/sidebar.php");	
	include ("config/koneksi.php");	
?>
<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Daftar Guru</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th style="text-align: center;">No</th>
							<th style="text-align: center;">NIP</th>
							<th style="text-align: center;">Nama Guru</th>
							<th style="text-align: center;">Jabatan</th>
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