<!DOCTYPE html>
<html lang="id">

<head>
	<?php
	include 'head.php';
	?>

	<title>Agenda Cilengkrang</title>

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
	$mysqli = new mysqli('localhost:3306', 'tane8339_lenan', '320407.', 'tane8339_cilengkrang') or die(mysqli_error($mysqli));
	$result = $mysqli->query("SELECT * FROM data_asn INNER JOIN data_agenda ON data_asn.id = data_agenda.id_asn ORDER BY tgl_mulai DESC") or die($mysqli->error);
	?>

	<div class="container-fluid">
		<br>
		<div class="card shadow-lg">
			<div class="card-header bg-success text-white">
				<div class="d-flex top-breadcrumb">
					<div class="mr-auto"><strong></strong></div>
					<div>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="home.php">Menu Utama</a></li>
							<li class="breadcrumb-item active" aria-current="page">Data Agenda Karyawan</li>
						</ol>
					</div>
				</div>
			</div>

			<div class="card-body bg-light">
				<div class="row grid-head d-flex align-items-center">
					<div class="col-12 col-lg-2 mb-3">
						<strong>DASAR SURAT</strong>
					</div>
					<div class="col-12 col-lg-3 mb-3">
						<strong>NAMA</strong>
					</div>
					<div class="col-12 col-lg-6 mb-3">
						<strong>KEGIATAN</strong>
					</div>
					<div class="col-12 col-lg-1 p-0 mb-3 text-center">
						<strong>#</strong>
					</div>
				</div>

				<?php while ($row = $result->fetch_assoc()) : ?>
					<?php
					$hari_mulai = date('l', strtotime($row['tgl_mulai']));
					$tanggal_mulai = date('d', strtotime($row['tgl_mulai']));
					$bulan_mulai = date('F', strtotime($row['tgl_mulai']));
					$tahun_mulai = date('Y', strtotime($row['tgl_mulai']));
					$hari_akhir = date('l', strtotime($row['tgl_selesai']));
					$tanggal_akhir = date('d', strtotime($row['tgl_selesai']));
					$bulan_akhir = date('F', strtotime($row['tgl_selesai']));
					$tahun_akhir = date('Y', strtotime($row['tgl_selesai']));
					$jam_start = date('H', strtotime($row['jam_mulai']));
					$menit_start = date('i', strtotime($row['jam_mulai']));
					$jam_end = date('H', strtotime($row['jam_selesai']));
					$menit_end = date('i', strtotime($row['jam_selesai']));

					switch ($hari_mulai) {
						case 'Monday':
							$hari_mulai = 'Senin';
							break;
						case 'Tuesday':
							$hari_mulai = 'Selasa';
							break;
						case 'Wednesday':
							$hari_mulai = 'Rabu';
							break;
						case 'Thursday':
							$hari_mulai = 'Kamis';
							break;
						case 'Friday':
							$hari_mulai = 'Jum\'at';
							break;
						case 'Saturday':
							$hari_mulai = 'Sabtu';
							break;
						case 'Sunday':
							$hari_mulai = 'Minggu';
							break;
					}

					switch ($hari_akhir) {
						case 'Monday':
							$hari_akhir = 'Senin';
							break;
						case 'Tuesday':
							$hari_akhir = 'Selasa';
							break;
						case 'Wednesday':
							$hari_akhir = 'Rabu';
							break;
						case 'Thursday':
							$hari_akhir = 'Kamis';
							break;
						case 'Friday':
							$hari_akhir = 'Jum\'at';
							break;
						case 'Saturday':
							$hari_akhir = 'Sabtu';
							break;
						case 'Sunday':
							$hari_akhir = 'Minggu';
							break;
					}

					switch ($bulan_mulai) {
						case 'January':
							$bulan_mulai = 'Jan';
							break;
						case 'February':
							$bulan_mulai = 'Feb';
							break;
						case 'March':
							$bulan_mulai = 'Mar';
							break;
						case 'May':
							$bulan_mulai = 'Mei';
							break;
						case 'June':
							$bulan_mulai = 'Jun';
							break;
						case 'July':
							$bulan_mulai = 'Jul';
							break;
						case 'August':
							$bulan_mulai = 'Agus';
							break;
						case 'October':
							$bulan_mulai = 'Okt';
							break;
						case 'December':
							$bulan_mulai = 'Des';
							break;
					}

					switch ($bulan_akhir) {
						case 'January':
							$bulan_akhir = 'Jan';
							break;
						case 'February':
							$bulan_akhir = 'Feb';
							break;
						case 'March':
							$bulan_akhir = 'Mar';
							break;
						case 'May':
							$bulan_akhir = 'Mei';
							break;
						case 'June':
							$bulan_akhir = 'Jun';
							break;
						case 'July':
							$bulan_akhir = 'Jul';
							break;
						case 'August':
							$bulan_akhir = 'Agus';
							break;
						case 'October':
							$bulan_akhir = 'Okt';
							break;
						case 'December':
							$bulan_akhir = 'Des';
							break;
					}
					?>

					<div class="row grid-body mb-2">
						<div class="col-12 col-lg-2">
							<?php echo $row['dasar_surat']; ?>
						</div>
						<div class="col-12 col-lg-3 ">
							<?php echo $row['name']; ?>
						</div>
						<div class="col-12 col-lg-6">
							<?php echo $row['kegiatan']; ?>
						</div>
						<div class="col-12 col-lg-1 text-center p-0">
							<a href="data_agenda.php?edit2=<?php echo $row['id']; ?>" class="mr-2">
								<i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Edit"></i>
							</a>

							<!-- Modal Delete #start -->
							<a href="" data-toggle="modal" data-target="#hapusSspd<?php echo $row['id']; ?>" class="mr-2">
								<i class="fa fa-trash-o" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Hapus"></i>
							</a>

							<div class="modal fade" id="hapusSspd<?php echo $row['id']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="hapusSspdLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h6 class="modal-title" id="hapusSspdLabel">
												Konfirmasi!
											</h6>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body text-left">
											Apakah anda yakin ingin menghapus SSPD <strong><?php echo $row['kegiatan']; ?></strong> ?
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
											<a href="process_asn.php?delete2=<?php echo $row['id']; ?>" class="mr-2 btn btn-danger btn-delete-modal" type="button">Hapus</a>
										</div>
									</div>
								</div>
							</div>
							<!-- Modal Delete #end -->

							<!-- Preview Modal #start -->
							<a href="" data-toggle="modal" data-target="#cetakSspd<?php echo $row['id']; ?>" class="mr-2">
								<i class="fa fa-print" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Cetak"></i>
							</a>

							<div class="modal fade bd-example-modal-lg" id="cetakSspd<?php echo $row['id']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="cetakSspdLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<h6 class="modal-title" id="cetakSspdLabel">
												<strong><?php echo $row['dasar_surat']; ?></strong>
											</h6>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body text-left">
											<?php include 'preview.php'; ?>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
											<!-- <button type="button" class="btn btn-primary btn-sm">Cetak SPPD</button> -->
											<a href="print_pdf.php?id=<?php echo $row['id']; ?>" target="blank" class="btn btn-primary btn-action-custom" type="button">
												Cetak Surat Tugas
											</a>
										</div>
									</div>
								</div>
							</div>
							<!-- Preview Modal #end -->
						</div>
					</div>
				<?php endwhile; ?>

				<div class="row justify-content-end">
					<div class="mt-3">
						<a href="data_agenda.php" class="btn btn-success btn-sm">Tambah Agenda Perjalanan</a>
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