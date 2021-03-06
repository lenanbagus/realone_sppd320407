<!DOCTYPE html>
<html lang="en">

<head>
	<!-- meta's -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- load css -->
	<link rel="stylesheet" href="assets/stylesheets/bootstrap.min.css">
	<link rel="stylesheet" href="assets/stylesheets/custom.css">

	<!-- load javascript -->
	<script src="assets/javascripts/jquery.slim.min.js"></script>
	<script src="assets/javascripts/bootstrap.bundle.min.js"></script>

	<title>Beranda</title>
</head>

<body>
	<?php
	include 'menu.php';
	?>

	<div class="container">
		<br>
		<div class="card text-center shadow-lg">
			<div class="card-header bg-success text-white">
				<strong>Aplikasi Agenda Perjalanan Dinas</strong>
			</div>
			<div class="card-body bg-light">

				<div class="row">
					<div class="col-sm-6 mt-2">
						<div class="card shadow-lg">
							<div class="card-body">
								<h5 class="card-title">Data Pegawai</h5>
								<p class="card-text">Registrasi data pegawai sebelum melakukan input Agenda Perjalanan</p>
								<br>
								<a href="data_asn.php" class="btn btn-success">Register</a>
							</div>
						</div>
					</div>
					<div class="col-sm-6 mt-2">
						<div class="card shadow-lg">
							<div class="card-body">
								<h5 class="card-title">Agenda Perjalanan</h5>
								<p class="card-text">Surat tugas kepada Pejabat Negara, Pegawai Negeri Sipil dan Pegawai Harian Lepas untuk melaksanakan perjalanan dinas</p>
								<a href="data_agenda.php" class="btn btn-success">Buat Agenda</a>
							</div>
						</div>
					</div>
					<!-- <div class="col-sm-4">
						<div class="card shadow-lg">
							<div class="card-body">
								<h5 class="card-title">Notulen Rapat / Bimtek</h5>
								<p class="card-text">Catatan penting dalam jalannya sebuah pertemuan yang bersifat resmi</p>
								<br>
								<a href="data_notulen.php" class="btn btn-success">Buat Notulen</a>
							</div>
						</div>
					</div> -->

				</div>
				<br><br><br><br>
				<h5 class="card-title">Evergreen Quote</h5>
				<blockquote class="card-text">
					<p class="mb-0">Big things have small beginnigs, enjoy the journey.</p>
					<footer class="blockquote-footer">anonymous<cite title="Source Title"></cite></footer>
				</blockquote>
			</div>
		</div>
	</div>
	<?php
	include 'footer.php';
	?>
</body>

</html>