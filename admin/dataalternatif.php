<?php 
	include ("style/header.php");
	include ("style/sidebar.php");
  include ("../config/koneksi.php");
?>
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Alternatif</h6>
		</div>
		<div class="card-body">
			<div class="form-group">	
				<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_alternatif"><i class="fas fa-plus fa-sm"></i> Tambah Alternatif</button>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th style="text-align: center;">No</th>
							<th style="text-align: center;">NISN</th>
              <th style="text-align: center;">Nama Siswa</th>
							<th style="text-align: center;">Rata-Rata UN</th>
              <th style="text-align: center;">Prestasi Akademik/Non Akademik</th>
							<th style="text-align: center;">Wawancara</th>
							<th style="text-align: center;">Test Diniyah</th>
							<th style="text-align: center;" colspan="2">Aksi</th>
						</tr>
					</thead>
					<?php 
					$no = 1;
					$sql = mysqli_query($konek,"SELECT * FROM tbl_alternatif a LEFT JOIN tbl_siswa b ON a.nisn=b.nisn");
					while ($data = mysqli_fetch_array($sql)){
					?>
					<tbody>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data['nisn']; ?></td>
							<td><?php echo $data['nm_siswa']; ?></td>
							<td><?php echo $data['rata_un']; ?></td>
              <td><?php echo $data['prestasi']; ?></td>
							<td><?php echo $data['wawancara']; ?></td>
							<td><?php echo $data['test_diniyah']; ?></td>
							<td style="text-align: center;"><a href="editalternatif.php?kd=<?php echo $data['kd_alternatif']; ?>"><i class="btn btn-success btn-sm"><span class="fas fa-edit fa-sm"></span></i></a></td>
							<td style="text-align: center;"><a href="hapusalternatif.php?kd=<?php echo $data['nisn']; ?>"><i class="btn btn-danger btn-sm"><span class="fas fa-trash fa-sm"></span></i></a></td>
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
<div class="modal fade" id="tambah_alternatif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Entry Data Alternatif</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="" method="POST" enctype="multipart/form-data">
      		<div class="form-group">
      			<label>NISN</label>
            <select name="nisn" id="nisn" class="form-control">
              <option value="pilih nisn">Pilih NISN Siswa</option>
              <?php
              $daftar_siswa = array();
              $qq = mysqli_query($konek,"SELECT * FROM tbl_siswa a LEFT JOIN tbl_daftar b ON a.nisn=b.nisn");
              while($dd = mysqli_fetch_assoc($qq)){
              if ($dd['status'] == "0" )
                {
              $daftar_siswa[] = $dd;
              ?>
              <option value="<?php echo $dd['nisn']; ?>"><?php echo $dd['nisn']; ?></option>
              <?php 
              }
              }
              ?>
            </select>
      		</div>
      		<div class="form-group">
      			<label>Nama Siswa</label>
      			<input type="text" class="form-control" name="nm_siswa" id="nm_siswa" readonly="">
      		</div>
      		<div class="form-group">
      			<label>Rata-Rata UN</label>
      			<input type="text" class="form-control" name="rata_un" id="rata_un" readonly="">
      		</div>
          <div class="form-group">
            <label>Prestasi Akademik/Non Akademik</label>
            <input type="text" class="form-control" name="prestasi" id="prestasi" readonly="">
          </div>
      		<div class="form-group">
      			<label>Wawancara</label>
      			<input type="text" class="form-control" name="wawancara" placeholder="Masukan Nilai Wawancara Siswa" required="">
      		</div>
      		<div class="form-group">
      			<label>Test Diniyah</label>
      			<input type="text" class="form-control" name="test_diniyah" placeholder="Masukan Nilai Test Diniyah Siswa" required="">
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
  $query2 = mysqli_query($konek,"SELECT * FROM tbl_alternatif ORDER BY kd_alternatif DESC");
    $data2 = mysqli_fetch_assoc($query2);
    $jml = mysqli_num_rows($query2);
    if($jml==0){
      $kd_alternatif='A0001';
      }else{
        $subid = substr($data2['kd_alternatif'],3);
        if($subid>0 && $subid<=8){
          $sub = $subid+1;
          $kd_alternatif='A000'.$sub;
        }elseif($subid>=9 && $subid<=100){
          $sub = $subid+1;
          $kd_alternatif='A00'.$sub;
        }elseif($subid>=99 && $subid<=1000){
          $sub = $subid+1;
          $kd_alternatif='A0'.$sub;
        }
      }

	$save = mysqli_query($konek,"INSERT INTO tbl_alternatif VALUES('$kd_alternatif','$_POST[nisn]','$_POST[rata_un]','$_POST[prestasi]','$_POST[wawancara]','$_POST[test_diniyah]')");

	if($save) {
    $status = "1";
    $update = mysqli_query($konek,"UPDATE tbl_daftar SET status = '$status' WHERE nisn = '$_POST[nisn]'");

      echo "<script language=javascript>
          window.alert('Berhasil Menambah!');
          window.location='dataalternatif.php';
          </script>";
      }else{
        echo "<script language=javascript>
          window.alert('Gagal Menambah!');
          window.location='dataalternatif.php';
          </script>";
      }
}
?>
<script>
  document.getElementById("nm_siswa").value = "";
  document.getElementById("rata_un").value = "";
  document.getElementById("prestasi").value = "";
  function tampilkanHargamobil()
  {
    var siswa = <?php echo json_encode($daftar_siswa); ?>;
    var pilihsiswa = document.getElementById("nisn").selectedIndex;
    var nm_siswa = "";
    var rata_un = "";
    var prestasi = "";
    if(pilihsiswa != 0)
    {
      nm_siswa = siswa[pilihsiswa-1].nm_siswa;
      rata_un = siswa[pilihsiswa-1].rata_un;
      prestasi = siswa[pilihsiswa-1].prestasi;
    }
    document.getElementById("nm_siswa").value = nm_siswa;
    document.getElementById("rata_un").value = rata_un;
    document.getElementById("prestasi").value = prestasi;
  }
  // Daftarkan fungsi ke element HTML
  document.getElementById("nisn").addEventListener("change", tampilkanHargamobil);
</script>
<?php 
	include ("style/footer.php");
?>