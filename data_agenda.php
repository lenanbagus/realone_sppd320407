<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	include 'head.php';
	?>

	<title>Data Agenda</title>
</head>

<body>
	<?php
	require 'process_asn.php';
	include 'menu.php';
	?>

	<div class="container-fluid">
		<br>
		<div class="card text-center shadow-lg">
			<div class="card-header bg-success text-white">
				<div class="d-flex top-breadcrumb">
					<div class="mr-auto"><strong></strong></div>
					<div>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Menu Utama</a></li>
							<li class="breadcrumb-item"><a href="show_agenda.php">Data</a></li>
							<li class="breadcrumb-item active" aria-current="page">Ubah Data Agenda</li>
						</ol>
					</div>
				</div>
			</div>

			<div class="card-body bg-light">
				<form action="process_asn.php" method="post">
					<input type="hidden" name="id_asn" value="<?php echo $id; ?>" />
					<input type="hidden" name="id_surat" value="<?php echo $id_surat; ?>" />

					<div class="row mb-1">
						<div class="col">
						</div>
						<div class="col-sm-6">
							<h4 class="text-center mb-1">

								<div class="form-group mb-0">
									<select class="form-control form-control-sm border border-success" name="id_asn" id="id_asn">
										<option disabled selected>Pilih Nama Pegawai</option>
										<?php
										$result = $mysqli->query("SELECT * FROM data_asn");

										while ($row = $result->fetch_assoc()) {
											$keterangan = "";

											if (isset($_GET['id_asn'])) {
												$get_id_asn = trim($_GET['id_asn']);

												if ($get_id_asn == $row['id']) {
													$keterangan = "selected";
												}
											} else {
												$keterangan = "empty select";
											}

										?>
											<option <?php echo $keterangan; ?> value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</h4>

						</div>
						<div class="col"></div>
					</div>
					<div class="row mb-2">
						<div class="col"></div>
						<div class="col-sm-3">
							<input class="form-control form-control-sm border border-success" name="dasar_surat" value="<?php echo $dasar_surat; ?>" type="text" placeholder="Dasar Nomor Surat">
						</div>
						<div class="col-sm-3">
							<input class="form-control form-control-sm border border-success" name="lokasi" value="<?php echo $lokasi; ?>" type="text" placeholder="Tempat / Lokasi">
						</div>
						<div class="col"></div>
					</div>
					<div class="row mb-2">
						<div class="col"></div>
						<div class="col-6">
							<input class="form-control form-control-sm border border-success" name="kegiatan" value="<?php echo $kegiatan; ?>" type="text" placeholder="Kegiatan">
						</div>
						<div class="col"></div>
					</div>
					<div class="row mb-3">
						<div class="col"></div>
						<div class="col-sm-3">
							<label class="mb-1 small" for="">Tanggal Mulai dan Selesai</label>
							<div class="mb-2">
								<input class=" form-control form-control-sm border border-success" name="tgl_mulai" value="<?php echo $tgl_mulai; ?>" type="date" placeholder="">
							</div>
							<div class="">
								<input class=" form-control form-control-sm border border-success" name="tgl_selesai" value="<?php echo $tgl_selesai; ?>" type="date" placeholder="">
							</div>
						</div>
						<div class="col-sm-3">
							<label class="mb-1 small" for="">Waktu Mulai dan Selesai</label>
							<div class="mb-2">
								<input class=" form-control form-control-sm border border-success" name="jam_mulai" value="<?php echo $jam_mulai; ?>" type="time" placeholder="Mulai">
							</div>
							<div class="">
								<input class=" form-control form-control-sm border border-success" name="jam_selesai" value="<?php echo $jam_selesai; ?>" type="time" placeholder="Selesai">
							</div>
						</div>
						<div class="col"></div>
					</div>

					<div class="row mb-2">
						<div class="col"></div>
						<div class="col-sm-2">
							<input class="form-control form-control-sm border border-success" name="pengikut_a" value="<?php echo $pengikut_a; ?>" type="text" placeholder="Pengikut 1">
						</div>
						<div class="col-sm-2">
							<input class="form-control form-control-sm border border-success" name="pengikut_b" value="<?php echo $pengikut_b; ?>" type="text" placeholder="Pengikut 2">
						</div>
						<div class="col-sm-2">
							<input class="form-control form-control-sm border border-success" name="pengikut_c" value="<?php echo $pengikut_c; ?>" type="text" placeholder="Pengikut 3">
						</div>
						<div class="col"></div>
					</div>

					<div class="row mb-2">
						<div class="col"></div>
						<div class="col-sm-2">
							<input class="form-control form-control-sm border border-success" name="nip_a" value="<?php echo $nip_a; ?>" type="text" placeholder="NIP">
						</div>
						<div class="col-sm-2">
							<input class="form-control form-control-sm border border-success" name="nip_b" value="<?php echo $nip_b; ?>" type="text" placeholder="NIP">
						</div>
						<div class="col-sm-2">
							<input class="form-control form-control-sm border border-success" name="nip_c" value="<?php echo $nip_c; ?>" type="text" placeholder="NIP">
						</div>
						<div class="col"></div>
					</div>

					<div class="form-group">
						<?php if ($update == true) : ?>
							<button class="btn btn-info mt-2" type="submit" name="update2">Update</button>
						<?php else : ?>
							<button class="btn btn-success mt-2" type="submit" name="save2">Simpan</button>
						<?php endif; ?>
					</div>
				</form>

			</div>
		</div>
	</div>

	<?php
	include 'footer.php';
	?>
</body>

</html>