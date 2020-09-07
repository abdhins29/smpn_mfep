<?php
  include("../config/koneksi.php");
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
<p style="font-size:18px;padding:0px;margin-bottom:0px;">LAPORAN DATA SISWA</p>
<br>
<div class="table-responsive">
  <table class="table table-bordered" border="1">
    <thead>
      <tr>
        <th style="text-align: center;">No</th>
        <th style="text-align: center;">NISN</th>
        <th style="text-align: center;">Nama Siswa</th>
        <th style="text-align: center;">Jenis Kelamin</th>
        <th style="text-align: center;">Tempat / Tanggal Lahir</th>
        <th style="text-align: center;">Nama Orang Tua</th>
        <th style="text-align: center;">Sekolah Asal</th>
        <th style="text-align: center;">No. Telp</th>
      </tr>
    </thead>
    <?php 
    include ("../config/koneksi.php");
    $no = 1;
    $sql = mysqli_query($konek,"SELECT * FROM tbl_siswa");
    while ($data = mysqli_fetch_array($sql)){
      ?>
      <tbody>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $data['nisn']; ?></td>
          <td><?php echo $data['nm_siswa']; ?></td>
          <td><?php echo $data['jenis_kelamin']; ?></td>
          <td><?php echo $data['tempat_lahir']; ?> / <?php echo tgl_indo($data['tanggal_lahir']); ?></td>
          <td><?php echo $data['nm_orangtua']; ?></td>
          <td><?php echo $data['sekolah_asal']; ?></td>
          <td><?php echo $data['no_telp']; ?></td>
        </tr>
      </tbody>
      <?php 
    }
    ?>
  </table>
</div>
</center>
<div id="siswa" style="float: right; width: 30%;">
  <p align="center">Kurnia, <?php echo $date; ?><br>
  KEPALA SEKOLAH</p>
  <br>
  <br>
  <br>
  <p align="center">( <?php echo $_GET['kepala_sekolah']; ?> )</p>
</div>       
</body>