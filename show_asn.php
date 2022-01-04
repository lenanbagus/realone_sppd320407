<!DOCTYPE html>
<html lang="id">

<head>
	<?php
	include 'head.php';
	?>

	<title>Karyawan Cilengkrang</title>

</head>

<body>
	<?php
	require_once 'process_asn.php';
	include 'menu.php';
	?>

	<?php if (isset($_SESSION['message']) && $_SESSION['message'] !== '') : ?>
		<?php
		echo '
					<script type="text/javascript">
						$(document).ready(function(){
							let timerInterval
							Swal.fire({
								position: "top-end",
								icon: "success",
								text: "Data berhasil disimpan.",
								showConfirmButton: false,
								timer: 2500,
								timerProgressBar: true
							}).then((result) => {
								/* Read more about handling dismissals below */
								if (result.dismiss === Swal.DismissReason.timer) {
									console.log("I was closed by the timer")
								}
							})
						});
					</script>
				';

		unset($_SESSION['message']);
		?>
	<?php endif ?>

	<?php
	// db_hosting below
	// $mysqli = new mysqli('localhost:3306', 'tane8339_lenan', '320407.', 'tane8339_cilengkrang') or die(mysqli_error($mysqli));
	$mysqli = new mysqli('localhost', 'root', '', 'cilengkrang') or die(mysqli_error($mysqli));

	$result = $mysqli->query("SELECT * FROM data_asn ORDER BY golongan DESC") or die($mysqli->error);
	?>

	<div class="container-fluid">
		<br>
		<div class="card shadow-lg">
			<div class="card-header bg-success text-white">
				<div class="d-flex top-breadcrumb">
					<div class="mr-auto"><strong></strong></div>
					<div>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Menu Utama</a></li>
							<li class="breadcrumb-item active" aria-current="page">Data Karyawan</li>
						</ol>
					</div>
				</div>
			</div>

			<div class="card-body bg-light">
				<div class="row grid-head d-flex align-items-center">
					<!-- <div class="col-12 col-lg-1">
						BUAT AGENDA
					</div> -->
					<div class="col-12 col-lg-2">
						<strong>N I P</strong>
					</div>
					<div class="col-12 col-lg-2">
						<strong>Nama</strong>
					</div>
					<div class="col-12 col-lg-4">
						<strong>Jabatan</strong>
					</div>
					<div class="col-12 col-lg-3">
						<strong>Golongan</strong>
					</div>
					<div class="col-12 col-lg-1 text-left">
						<strong>Opsi</strong>
					</div>
				</div>

				<?php while ($row = $result->fetch_assoc()) : ?>
					<?php
					$hari = date('l', strtotime($row['tanggallahir']));
					$tanggal = date('d', strtotime($row['tanggallahir']));
					$bulan = date('F', strtotime($row['tanggallahir']));
					$tahun = date('Y', strtotime($row['tanggallahir']));

					switch ($hari) {
						case 'Monday':
							$hari = 'Senin';
							break;
						case 'Tuesday':
							$hari = 'Selasa';
							break;
						case 'Wednesday':
							$hari = 'Rabu';
							break;
						case 'Thursday':
							$hari = 'Kamis';
							break;
						case 'Friday':
							$hari = 'Jum\'at';
							break;
						case 'Saturday':
							$hari = 'Sabtu';
							break;
						case 'Sunday':
							$hari = 'Minggu';
							break;
					}

					switch ($bulan) {
						case 'January':
							$bulan = 'Januari';
							break;
						case 'February':
							$bulan = 'Februari';
							break;
						case 'March':
							$bulan = 'Mart';
							break;
						case 'May':
							$bulan = 'Mei';
							break;
						case 'June':
							$bulan = 'Juni';
							break;
						case 'July':
							$bulan = 'Juli';
							break;
						case 'August':
							$bulan = 'Agustus';
							break;
						case 'October':
							$bulan = 'Oktober';
							break;
						case 'December':
							$bulan = 'Desember';
							break;
					}
					?>

					<div class="row grid-body">
						<!-- <div class="col-12 col-lg-1 text-center">
							<a href="data_agenda.php?input=<?php echo $row['id']; ?>" class="">
								<i class="fa fa-file-text-o" aria-hidden="true"></i>
							</a>
						</div> -->
						<div class="col-12 col-lg-2">
							<?php echo $row['nip']; ?>
						</div>
						<div class="col-12 col-lg-2">
							<?php echo $row['name']; ?>
						</div>
						<div class="col-12 col-lg-4">
							<?php echo $row['jabatan']; ?>
						</div>
						<div class="col-12 col-lg-3">
							<?php echo $row['golongan']; ?>
						</div>
						<div class="col-12 col-lg-1 text-left">

							<!-- Detail Modal #start -->
							<a href="" data-toggle="modal" data-target="#detailAsn<?php echo $row['id']; ?>" class="">
								<i class="fa fa-pencil" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Lihat"></i> Edit
							</a>

							<div class="modal fade bd-example-modal-lg" id="detailAsn<?php echo $row['id']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="detailAsnLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<h6 class="modal-title" id="detailAsnLabel">
												<strong><?php echo $row['name']; ?></strong>
											</h6>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body text-left">
											<?php include 'detail_asn.php'; ?>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
											<a href="data_asn.php?edit=<?php echo $row['id']; ?>" target="blank" class="btn btn-primary btn-action-custom" type="button">
												Ubah
											</a>
										</div>
									</div>
								</div>
							</div>
							<!-- Detail Modal #end -->

							<!-- <a href="data_asn.php?edit=<?php echo $row['id']; ?>" class="ml-1 mr-1">
								<i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Ubah"></i>
							</a> -->

							<!-- Modal Delete #start -->
							<!-- <a href="" data-toggle="modal" data-target="#hapusAsn<?php echo $row['id']; ?>" class="ml-1 mr-1">Hapus
								<i class="fa fa-trash-o" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Hapus"></i>
							</a> -->

							<div class="modal fade bd-example-modal-lg" id="hapusAsn<?php echo $row['id']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="hapusAsnLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<h6 class="modal-title" id="hapusAsnLabel">
												Konfirmasi!
											</h6>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body text-left">
											Apakah anda yakin ingin menghapus <strong><?php echo $row['name']; ?></strong> ?
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
											<a href="process_asn.php?delete=<?php echo $row['id']; ?>" class="mr-2 btn btn-danger btn-delete-modal" type="button">Hapus</a>
										</div>
									</div>
								</div>
							</div>
							<!-- Modal Delete #end -->
						</div>
					</div>
				<?php endwhile; ?>

				<div class="row justify-content-end">
					<div class="mr-2 mt-3">
						<a href="data_asn.php" class="btn btn-success btn-sm">Tambah Data Karyawan</a>
					</div>
					<div class="mr-2 mt-3">
						<a href="data_agenda.php" class="btn btn-success btn-sm">Buat Agenda Perjalanan</a>
					</div>
				</div>

			</div>
		</div>
	</div>

	<?php
	include 'footer.php';
	?>
</body>

</html>