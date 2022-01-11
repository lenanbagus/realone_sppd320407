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

	// (local) tidak perlu memanggil konfig db
	//$mysqli = new mysqli('localhost', 'root', '', 'cilengkrang') or die(mysqli_error($mysqli));

	// $result = $mysqli->query("SELECT * FROM data_agenda 
	// JOIN data_notulen ON data_agenda.id = data_notulen.id_agenda
	// JOIN data_asn ON data_asn.id = data_agenda.id_asn") or die($mysqli->error);

	$result = $mysqli->query("SELECT data_notulen.id, data_notulen.isi_notulen, data_notulen.id_agenda, data_agenda.dasar_surat, data_agenda.lokasi, data_agenda.kegiatan, data_agenda.id_asn, data_asn.name FROM data_notulen JOIN data_agenda ON data_notulen.id_agenda = data_agenda.id JOIN data_asn ON data_agenda.id_asn = data_asn.id ORDER BY data_notulen.created_at DESC") or die($mysqli->error);
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
							<li class="breadcrumb-item active" aria-current="page">Data Notulen</li>
						</ol>
					</div>
				</div>
			</div>

			<div class="card-body bg-light">
				<div class="row grid-head d-flex align-items-center">
					<div class="col-12 col-lg-2">
						<strong>Surat Tugas</strong>
					</div>
					<div class="col-12 col-lg-2">
						<strong>Nama Pegawai</strong>
					</div>
					<div class="col-12 col-lg-3">
						<strong>Kegiatan</strong>
					</div>
					<div class="col-12 col-lg-3 text-center">
						<strong>Isi Notulen</strong>
					</div>
					<div class="col-12 col-lg-2 text-center">
						<strong>Opsi</strong>
					</div>
				</div>

				<?php while ($row = $result->fetch_assoc()) : ?>
					<div class="row grid-body">
						<div class="col-12 col-lg-2">
							<?php echo $row['dasar_surat']; ?>
						</div>
						<div class="col-12 col-lg-2">
							<?php echo $row['name']; ?>
						</div>
						<div class="col-12 col-lg-3">
							<?php echo $row['kegiatan']; ?>
						</div>
						<div class="col-12 col-lg-3">
							<?php echo $row['isi_notulen']; ?>
						</div>
						<div class="col-12 col-lg-2 text-center px-0">
							<!-- Edit Notulen Modal #start -->
							<a href="" data-toggle="modal" data-target="#editNotulen<?php echo $row['id']; ?>" class="ml-1">
								<i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Cetak"></i> Ubah |
							</a>

							<div class="modal fade bd-example-modal-lg" id="editNotulen<?php echo $row['id']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editNotulenLabel" aria-hidden="true">
								<form action="process_asn.php" method="post">
									<input type="hidden" name="id_notulen" value="<?php echo $row['id']; ?>">

									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<h6 class="modal-title" id="editNotulenLabel">
													<strong><?php echo $row['kegiatan']; ?></strong>
												</h6>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body text-left">
												<div class="row my-3">
													<div class="col-3">
														Isi Notulen
													</div>
													<div class="col-9 pl-0">
														<textarea class="form-control" rows="5" id="isi_notulen" name="isi_notulen" value="<?php echo $row['isi_notulen']; ?>"><?php echo $row['isi_notulen']; ?></textarea>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
												<button class="btn btn-primary" type="submit" name="update3">Ubah</button>
											</div>
										</div>
									</div>
								</form>
							</div>
							<!-- Edit Notulen Modal #end -->

							<!-- Modal Delete #start -->
							<a href="" data-toggle="modal" data-target="#hapusNotulen-<?php echo $row['id']; ?>" class="mr-1">
								<i class="fa fa-trash-o" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Hapus"></i> Hapus |
							</a>

							<div class="modal fade" id="hapusNotulen-<?php echo $row['id']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="hapusNotulenLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h6 class="modal-title" id="hapusNotulenLabel">
												Konfirmasi!
											</h6>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body text-left">
											Apakah anda yakin ingin menghapus Notulen dari kegiatan <strong><?php echo $row['kegiatan']; ?></strong> ?
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
											<a href="process_asn.php?delete3=<?php echo $row['id']; ?>" id_notulen="<?php echo $row['id']; ?>" class="mr-2 btn btn-danger btn-delete-modal" type="button">Hapus</a>
										</div>
									</div>
								</div>
							</div>
							<!-- Modal Delete #end -->

							<!-- Preview Modal #start -->
							<a href="" data-toggle="modal" data-target="#cetakSspd<?php echo $row['id']; ?>" class="mr-1">
								<i class="fa fa-print" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Cetak"></i> Print
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
											<?php include 'preview_notulen.php'; ?>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
											<!-- <button type="button" class="btn btn-primary btn-sm">Cetak SPPD</button> -->
											<a href="print_notulen.php?id=<?php echo $row['id']; ?>" target="blank" class="btn btn-primary btn-action-custom" type="button">
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
			</div>
		</div>
	</div>

	<?php
	include 'footer.php';
	?>
</body>

</html>