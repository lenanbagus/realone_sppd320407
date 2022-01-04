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
	<link rel="stylesheet" href="assets/stylesheets/sweetalert2.min.css">

	<!-- load javascript -->
	<script src="assets/javascripts/jquery.slim.min.js"></script>
	<script src="assets/javascripts/bootstrap.bundle.min.js"></script>

	<title>Registrasi Karyawan</title>
</head>

<body>
	<?php
	include 'process_asn.php';
	include 'menu.php';
	?>

	<div class="container-fluid">
		<br>
		<div class="card text-center shadow-lg">
			<div class="card-header bg-success text-white">
				<div class="d-flex top-breadcrumb">
					<div class="mr-auto"></div>
					<div>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Menu Utama</a></li>
							<li class="breadcrumb-item"><a href="show_asn.php">Data</a></li>
							<li class="breadcrumb-item active" aria-current="page">Registrasi Karyawan</li>
						</ol>
					</div>
				</div>
			</div>

			<form action="process_asn.php" method="post">
				<div class="card-body bg-light">
					<input type="hidden" name="id" value="<?php echo $id ?>">

					<div class="row mb-3 justify-content-md-center">
						<div class="col-sm-6">
							<input class="form-control form-control-sm border border-success" value="<?php echo $name; ?>" name="name" type="text" placeholder="Nama Lengkap" required>
						</div>
					</div>

					<div class="row mb-2 justify-content-md-center">
						<div class="col-sm-6">
							<input class="form-control form-control-sm border border-success" value="<?php echo $nip; ?>" name="nip" type="number" placeholder="NIP">
						</div>
					</div>

					<div class="row mb-3 justify-content-md-center">
						<div class="col-sm-3 mt-2">
							<input class="form-control form-control-sm border border-success" value="<?php echo $tempatlahir; ?>" name="tempatlahir" type="text" placeholder="Tempat Lahir" required>
						</div>
						<div class="col-sm-3 mt-2">
							<input class="form-control form-control-sm border border-success" value="<?php echo $tanggallahir; ?>" name="tanggallahir" type="date" placeholder="Tanggal Lahir" required>
						</div>
					</div>

					<div class="row justify-content-md-center">
						<div class="col-sm-6">
							<div class="form-group">
								<select class="form-control form-control-sm border border-success" value="<?php echo $golongan; ?>" name="golongan">
									<option value="" selected>Pilih Golongan</option>
									<optgroup label="Golongan II">
										<option value="II/a - Pengatur Muda">II/a - Pengatur Muda</option>
										<option value="II/b - Pengatur Muda Tingkat I">II/b - Pengatur Muda Tingkat I</option>
										<option value="II/c - Pengatur">II/c - Pengatur</option>
										<option value="II/d - Pengatur Tingkat I">II/d - Pengatur Tingkat I</option>
									</optgroup>
									<optgroup label="Golongan III">
										<option value="III/a - Penata Muda">III/a - Penata Muda</option>
										<option value="III/b - Penata Muda Tingkat I">III/b - Penata Muda Tingkat I</option>
										<option value="III/c - Penata">III/c - Penata</option>
										<option value="III/d - Penata Tingkat I">III/d - Penata Tingkat I</option>
									</optgroup>
									<optgroup label="Golongan IV">
										<option value="IV/a - Pembina">IV/a - Pembina</option>
										<option value="IV/b - Pembina Tingkat I">IV/b - Pembina Tingkat I</option>
										<option value="IV/c - Pembina Utama Muda">IV/c - Pembina Utama Muda</option>
										<option value="IV/d - Pembina Utama Madya">IV/d - Pembina Utama Madya</option>
										<option value="IV/e - Pembina Utama">IV/e - Pembina Utama</option>
									</optgroup>
								</select>
							</div>
						</div>
					</div>

					<div class="row mb-2 justify-content-md-center">
						<div class="col-sm-6">
							<div class="form-group">
								<select class="form-control form-control-sm border border-success" value="<?php echo $jabatan; ?>" name="jabatan">
									<option value="" selected>Pilih Jabatan</option>
									<option value="Camat">Camat</option>
									<option value="Sekretaris Camat">Sekretaris Camat</option>
									<optgroup label="Program dan Keuangan">
										<option value="Kepala Sub Bagian Program dan Keuangan">Kasubag Program dan Keuangan</option>
										<option value="Bendahara">Bendahara</option>
										<option value="Penyusun Program Anggaran dan Pelaporan">Penyusun Program Anggaran dan Pelaporan</option>
										<option value="Penata Laporan Keuangan">Penata Laporan Keuangan</option>
										<option value="Pengolah Data Aplikasi dan Pengelola Data Sistem Keuangan">Pengolah Data Aplikasi dan Pengelola Data Sistem Keuangan</option>
									</optgroup>
									<optgroup label="Umum dan Kepegawaian">
										<option value="Kepala Sub Bagian Umum dan Kepegawaian">Kasubag Umum dan Kepegawaian</option>
										<option value="Pengelola Dokumentasi">Pengelola Dokumentasi</option>
										<option value="Pengelola Kepegawaian">Pengelola Kepegawaian</option>
										<option value="Pengelola Pemanfaatan Barang Milik Daerah">Pengelola Pemanfaatan Barang Milik Daerah</option>
										<option value="Pengelola Layanan Operasional">Pengelola Layanan Operasional</option>
										<option value="Pengadministrasian Umum">Pengadministrasian Umum</option>
									</optgroup>
									<optgroup label="Seksi Pemerintahan">
										<option value="Kepala Seksi Pemerintahan">Kasi Pemerintahan</option>
										<option value="Pengelola Bantuan Keuangan Kepada Pemerintah Desa">Pengelola Bantuan Keuangan Kepada Pemerintah Desa</option>
										<option value="Pengelola Monitoring dan Evaluasi Penyelenggaraan">Pengelola Monitoring dan Evaluasi Penyelenggaraan</option>
										<option value="Pengelola PBB P2 dan BPHTB">Pengelola PBB P2 dan BPHTB</option>
										<option value="Pengadministrasi Kependudukan">Pengadministrasi Kependudukan</option>
									</optgroup>
									<optgroup label="Seksi Pemberdayaan Masyarakat">
										<option value="Kepala Seksi Pemberdayaan Masyarakat">Kasi Pemberdayaan Masyarakat</option>
										<option value="Pengelola Pemberdayaan Masyarakat">Pengelola Pemberdayaan Masyarakat</option>
										<option value="Pengolah Data">Pengolah Data</option>
									</optgroup>
									<optgroup label="Seksi Pembangunan">
										<option value="Kepala Seksi Pembangunan">Kasi Pembangunan</option>
										<option value="Pengelola Pengendalian Monitoring dan Evaluasi">Pengelola Pengendalian Monitoring dan Evaluasi</option>
										<option value="Pengadministrasi Sarana dan Prasarana">Pengadministrasi Sarana dan Prasarana</option>
									</optgroup>
									<optgroup label="Seksi Sosial dan Budaya">
										<option value="Kepala Seksi Pemberdayaan Masyarakat">Kasi Pemberdayaan Masyarakat</option>
										<option value="Pengelola Fasilitas Sosial dan Umum">Pengelola Fasilitas Sosial dan Umum</option>
										<option value="Pengelola Kesejahteraan Sosial">Pengelola Kesejahteraan Sosial</option>
									</optgroup>
									<optgroup label="Seksi Ketentraman dan Ketertiban Umum">
										<option value="Kepala Seksi Ketentraman dan Ketertiban Umum">Kasi Trantibum</option>
										<option value="Pengelola Keamanan dan Ketertiban">Pengelola Keamanan dan Ketertiban</option>
										<option value="Petugas Keamanan">Petugas Keamanan</option>
									</optgroup>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<?php if ($update == true) : ?>
							<button class="btn btn-info btn-sm" type="submit" name="update">Update</button>
						<?php else : ?>
							<button class="btn btn-success btn-sm" type="submit" name="save">Simpan</button>
						<?php endif; ?>
					</div>
			</form>
		</div>
	</div>
	<?php
	include 'footer.php';
	?>
</body>

<script type="text/javascript">
	$(document).ready(function() {

	});
</script>

</html>