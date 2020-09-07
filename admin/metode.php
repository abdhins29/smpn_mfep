<?php 
	include ("style/header.php");
	include ("style/sidebar.php");
	include ("../config/koneksi.php");
?>
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Pembobotan Kriteria</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th style="text-align: center;">No</th>
							<th style="text-align: center;">Nama Kriteria</th>
							<th style="text-align: center;">Persentase Bobot Komponen</th>
							<th style="text-align: center;">Weight Evaluation</th>
						</tr>
					</thead>
					<?php 
					$no = 1;
                    $n=[];
					$sql = mysqli_query($konek,"SELECT * FROM tbl_kriteria");
					while ($data = mysqli_fetch_array($sql)){
						?>
						<tbody>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $data['nm_kriteria']; ?></td>
								<td><?php echo $data['atribut']; ?></td>
								<td><?php echo $data['atribut']/100 ?></td>
							</tr>
						</tbody>
						<?php 
                        $n[]=$data["atribut"]/100;
					}
					?>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Analisa</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th style="text-align: center;">No</th>
							<th style="text-align: center;">NISN</th>
							<th style="text-align: center;">Nama Siswa</th>
							<th style="text-align: center;">Kriteria</th>
							<th style="text-align: center;">Nilai Kriteria Alternatif</th>
							<th style="text-align: center;">Bobot * Evaluation Factor</th>
							<th style="text-align: center;">Total Bobot</th>
							<th style="text-align: center;">Hasil Analisa</th>
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
							<td><?php echo "Rata-Rata UN<br>Prestasi Akademik/Non Akademik<br>Wawancara<br>Test Diniyah/Mengaji" ?></td>
							<td><?php echo $data1['rata_un']; ?><br>
								<?php echo $data1['wawancara']; ?><br>
								<?php echo $data1['test_diniyah']; ?><br>
								<?php echo $data1['prestasi']; ?>
							</td>
							<td><?php echo $n['0'];?> * <?php echo $data1['rata_un']; ?><br>
								<?php echo $n['1'];?> * <?php echo $data1['wawancara']; ?><br>
								<?php echo $n['2'];?> * <?php echo $data1['test_diniyah']; ?><br>
								<?php echo $n['3'];?> * <?php echo $data2['nilai']; ?>
							</td>
							<td><?php echo $n['0']*($data1['rata_un']/100); ?><br>
								<?php echo $n['1']*($data1['wawancara']/100); ?><br>
								<?php echo $n['2']*($data1['test_diniyah']/100); ?><br>
								<?php echo $n['3']*($data2['nilai']/100); ?>
							</td>
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