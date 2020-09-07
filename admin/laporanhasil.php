<?php 
	include ("style/header.php");
	include ("style/sidebar.php");
	include ("../config/koneksi.php");
	$n=[];
    $qkriteria=mysqli_query($konek,"SELECT * FROM tbl_kriteria");
    while($dkriteria=mysqli_fetch_array($qkriteria)){
        $n[]=$dkriteria["atribut"]/100;
    }
?>
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Laporan Data Hasil Analisa</h6>
		</div>
		<div class="card-body">
			<div class="form-group">
				<form action="cetakhasil.php" method="get">
					<input type="text" name="kepala_sekolah" placeholder="Masukan Nama Kepsek">
					<button type="submit" name="cetak" class="btn btn-md btn-primary"><i class="fas fa-md fa-print"> Cetak Laporan</i></button>
				</form>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th style="text-align: center;">No</th>
							<th style="text-align: center;">NISN</th>
							<th style="text-align: center;">Nama Siswa</th>
							<th style="text-align: center;">Nilai</th>
						</tr>
					</thead>
					<?php 
					$no = 1;
					$sql1 = mysqli_query($konek,"SELECT * FROM tbl_alternatif a LEFT JOIN tbl_siswa b ON a.nisn=b.nisn");
					while ($data1 = mysqli_fetch_array($sql1)){
                        $sql2=mysqli_query($konek,"SELECT * FROM tbl_crips WHERE nm_crips = '$data1[prestasi]'");
                        $data2=mysqli_fetch_array($sql2);
					?>
					<tbody>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data1['nisn']; ?></td>
							<td><?php echo $data1['nm_siswa']; ?></td>
							<?php 
								$analisa = ($n['0']*($data1['rata_un']/100))+($n['1']*($data1['wawancara']/100))+($n['2']*($data1['test_diniyah']/100))+($n['3']*($data2['nilai']/100));
							?>
							<td><?php echo number_format((float)$analisa,2,".","") ?></td>
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