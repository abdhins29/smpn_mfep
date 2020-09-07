<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SPK MFEP - SMPN 02 SUNGAI RUMBAI - Daftar</title>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6" style="margin: auto;">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Silahkan Daftar</h1>
                  </div>
                  <form class="user" method="post" action="">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" placeholder="Username" required="">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Password" required="">
                      <input type="hidden" class="form-control form-control-user" name="level" value="siswa" readonly="">
                    </div>
                    <button type="submit" name="daftar" class="btn btn-primary btn-user btn-block">
                      Daftar
                    </button>
                    <button type="reset" name="reset" class="btn btn-danger btn-user btn-block">
                      Reset
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="login.php">Sudah Punya Akun? Silahkan Login!</a>
                  </div>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="index.php">Kembali Kehalaman Utama</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  <?php 
    session_start();
    include ('config/koneksi.php');
    if(isset($_POST['daftar'])) {

    $simpan  =mysqli_query($konek,"INSERT INTO tbl_login VALUES('','','$_POST[username]','$_POST[password]','$_POST[level]')");
    if($simpan){
      echo "<script language=javascript>
          window.alert('Berhasil Mendaftar!');
          window.location='login.php';
          </script>";
      }else{
      echo "<script language=javascript>
          window.alert('Gagal Mendaftar!');
          window.location='daftar.php';
          </script>";
      }
    }
  ?>

  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>