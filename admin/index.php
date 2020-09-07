<?php 
include ("style/header.php");
include ("style/sidebar.php");
?>
<div class="container-fluid">
	<div class="card border-left-primary">
		<div class="card-body">
			<center>
				<h2>Selamat Datang Admin</h2>
				<h2>Sistem Informasi Pengambilan Keputusan</h2>
				<h2>Metode MFEP</h2>
			</center>
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="../assets/img/1.jpg" class="d-block" width="100%" height="450px">
					</div>
					<div class="carousel-item">
						<img src="../assets/img/2.jpg" class="d-block" width="100%" height="450px">
					</div>
					<div class="carousel-item">
						<img src="../assets/img/3.jpg" class="d-block" width="100%" height="450px">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
</div>
<?php 
include ("style/footer.php");
?>