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
  $n=[];
    $qkriteria=mysqli_query($konek,"SELECT * FROM tbl_kriteria");
    while($dkriteria=mysqli_fetch_array($qkriteria)){
        $n[]=$dkriteria["atribut"]/100;
    }
?>
<body onload="window.print();">
<center>
<p style="font-size:30px;padding:0px;margin-bottom:-15px;">SMPN 02 SUNGAI RUMBAI</p>
<p style="font-size:18px;padding:0px;margin-bottom:-12px;">Kurnia Koto Salak, Sungai Rumbai</p>
<p style="font-size:18px;padding:0px;margin-bottom:-12px;">Kabupaten Dharmasraya, Sumatera Barat 27684</p>
<br>
<hr>
<hr>
<p style="font-size:18px;padding:0px;margin-bottom:0px;">LAPORAN HASIL KEPUTUSAN SISWA DITERIMA</p>
<br>
<div class="table-responsive">
  <table border="1" width="100%">
    <thead>
      <tr>
        <th style="text-align: center;">No</th>
        <th style="text-align: center;">NISN</th>
        <th style="text-align: center;">Nama Siswa</th>
        <th style="text-align: center;">Status</th>
      </tr>
    </thead>
    <?php 
    include ("../config/koneksi.php");
    $no = 1;
    $sql1 = mysqli_query($konek,"SELECT * FROM tbl_alternatif a LEFT JOIN tbl_siswa b ON a.nisn=b.nisn");
    while ($data1 = mysqli_fetch_array($sql1)){
      $sql2=mysqli_query($konek,"SELECT * FROM tbl_crips WHERE nm_crips = '$data1[prestasi]'");
      $data2=mysqli_fetch_array($sql2); 
      $analisa = ($n['0']*($data1['rata_un']/100))+($n['1']*($data1['wawancara']/100))+($n['2']*($data1['test_diniyah']/100))+($n['3']*($data2['nilai']/100));
      if($analisa >= 0.60){
        ?>
        <tbody>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data1['nisn']; ?></td>
            <td><?php echo $data1['nm_siswa']; ?></td>
            <td><?php echo "Diterima"; ?></td>
          </tr>
        </tbody>
        <?php 
      }else{}
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