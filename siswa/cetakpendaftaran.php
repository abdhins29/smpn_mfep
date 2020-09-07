<?php
  include("../config/koneksi.php");
  $nisn = $_GET['kd'];
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
  $date = tgl_indo(date('Y-m-d'));
?>
<body onload="window.print();">
<center>
<p style="font-size:30px;padding:0px;margin-bottom:-15px;">SMPN 02 SUNGAI RUMBAI</p>
<p style="font-size:18px;padding:0px;margin-bottom:-12px;">Kurnia Koto Salak, Sungai Rumbai</p>
<p style="font-size:18px;padding:0px;margin-bottom:-12px;">Kabupaten Dharmasraya, Sumatera Barat 27684</p>
<br>
<hr>
<hr>
<h3 style="text-decoration: underline;">TANDA BUKTI PENDAFTARAN</h3>
</center>
<div class="table-responsive">
  <table style="margin-left: 60%;" width="30%">
    <tr>
      <th>Nomor Pendaftaran</th>
      <th>:</th>
      <?php 
        $qqq = mysqli_query($konek,"SELECT * FROM tbl_siswa a LEFT JOIN tbl_daftar b ON a.nisn=b.nisn WHERE b.nisn='$nisn'");
        while ($ddd = mysqli_fetch_array($qqq)){
      ?>
      <th><?php echo $ddd['id_pendaftaran']; ?></th>
      <?php 
        }
      ?>
    </tr>
  </table>
  <br>
  <br>
  <table width="80%">
    <?php 
    $no = 1;
    $sql = mysqli_query($konek,"SELECT * FROM tbl_siswa WHERE nisn = '$nisn'");
    while ($data = mysqli_fetch_array($sql)){
    ?>
    <tbody>
      <tr>
        <td>1.</td>
        <td>Nama Calon Siswa</td>
        <td>:</td>
        <td><?php echo $data['nm_siswa']; ?></td>
      </tr>
      <tr>
        <td>2.</td>
        <td>Tempat / Tanggal Lahir</td>
        <td>:</td>
        <td><?php echo $data['tempat_lahir']; ?> / <?php echo tgl_indo($data['tanggal_lahir']) ?></td>
      </tr>
      <tr>
        <td>3.</td>
        <td>NISN</td>
        <td>:</td>
        <td><?php echo $data['nisn']; ?></td>
      </tr>
      <tr>
        <td>4.</td>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td><?php echo $data['jenis_kelamin']; ?></td>
      </tr>
      <tr>
        <td>5.</td>
        <td>Nama Orang Tua</td>
        <td>:</td>
        <td><?php echo $data['nm_orangtua']; ?></td>
      </tr>
      <tr>
        <td>6.</td>
        <td>Sekolah Asal</td>
        <td>:</td>
        <td><?php echo $data['sekolah_asal']; ?></td>
      </tr>
      <tr>
        <td>7.</td>
        <td>Rata-Rata Nilai UN</td>
        <td>:</td>
        <td><?php echo $data['rata_un']; ?></td>
      </tr>
    </tbody>
    <?php 
    }
    ?>
  </table>

  <div id="panitia" style="float: left; width: 50%; text-align: center">
    <p>Panitia Pendaftaran</p>
    <br>
    <br>
    <br>
    <br>
    <p>(...............................................)</p>
    <p style="margin-top: -20px;">NIP:............................................</p>
  </div>
  <div id="siswa" style="float: left; width: 50%;">
    <p align="center">Kurnia, <?php echo $date; ?><br>
    Tanda Tangan Calon Siswa</p>
    <?php 
    $sqt = mysqli_query($konek, "SELECT * FROM tbl_siswa WHERE nisn='$nisn'");
    $dt = mysqli_fetch_array($sqt);
    ?>
    <br>
    <br>
    <br>
    <p align="center">( <?php echo $dt['nm_siswa']; ?> )</p>
  </div>
</div>
<p>----------------------------------------------- Gunting Disini</p>
<center>
<h3 style="text-decoration: underline;">TANDA BUKTI PENDAFTARAN</h3>
</center>
<div class="table-responsive">
  <table style="margin-left: 60%;" width="30%">
    <tr>
      <th>Nomor Pendaftaran</th>
      <th>:</th>
      <?php 
        $qqq = mysqli_query($konek,"SELECT * FROM tbl_siswa a LEFT JOIN tbl_daftar b ON a.nisn=b.nisn WHERE b.nisn='$nisn'");
        while ($ddd = mysqli_fetch_array($qqq)){
      ?>
      <th><?php echo $ddd['id_pendaftaran']; ?></th>
      <?php 
        }
      ?>
    </tr>
  </table>
  <br>
  <br>
  <table width="80%">
    <?php 
    $no = 1;
    $sql = mysqli_query($konek,"SELECT * FROM tbl_siswa WHERE nisn = '$nisn'");
    while ($data = mysqli_fetch_array($sql)){
    ?>
    <tbody>
      <tr>
        <td>1.</td>
        <td>Nama Calon Siswa</td>
        <td>:</td>
        <td><?php echo $data['nm_siswa']; ?></td>
      </tr>
      <tr>
        <td>2.</td>
        <td>Tempat / Tanggal Lahir</td>
        <td>:</td>
        <td><?php echo $data['tempat_lahir']; ?> / <?php echo $data['tanggal_lahir'] ?></td>
      </tr>
      <tr>
        <td>3.</td>
        <td>NISN</td>
        <td>:</td>
        <td><?php echo $data['nisn']; ?></td>
      </tr>
      <tr>
        <td>4.</td>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td><?php echo $data['jenis_kelamin']; ?></td>
      </tr>
      <tr>
        <td>5.</td>
        <td>Nama Orang Tua</td>
        <td>:</td>
        <td><?php echo $data['nm_orangtua']; ?></td>
      </tr>
      <tr>
        <td>6.</td>
        <td>Sekolah Asal</td>
        <td>:</td>
        <td><?php echo $data['sekolah_asal']; ?></td>
      </tr>
      <tr>
        <td>7.</td>
        <td>Rata-Rata Nilai UN</td>
        <td>:</td>
        <td><?php echo $data['rata_un']; ?></td>
      </tr>
    </tbody>
    <?php 
    }
    ?>
  </table>
</div>
<div class="panitia" style="float: left; width: 50%; text-align: center">
  <p>Panitia Pendaftaran</p>
  <br>
  <br>
  <br>
  <br>
  <p>(...............................................)</p>
  <p style="margin-top: -20px;">NIP:............................................</p>
</div>
<div class="siswa" style="float: right; width: 50%;">
  <p align="center">Kurnia, <?php echo $date; ?><br>
    Tanda Tangan Calon Siswa</p>
  <?php 
  $sqt = mysqli_query($konek, "SELECT * FROM tbl_siswa WHERE nisn='$nisn'");
  $dt = mysqli_fetch_array($sqt);
  ?>
  <br>
  <br>
  <br>
  <p align="center">( <?php echo $dt['nm_siswa']; ?> )</p>
</div>
</body>