<div class="row my-3">
	<div class="col-3">
		Nomor
	</div>
	<div class="col-9 pl-0">
		: 800/<?php echo $row['id']; ?>/Kec/2022
	</div>
</div>
<div class="row my-3">
	<div class="col-3">
		Jabatan
	</div>
	<div class="col-9 pl-0">
		: <?php echo $row['jabatan']; ?>
	</div>
</div>
<div class="row my-3">
	<div class="col-3">
		Kegiatan
	</div>
	<div class="col-9 pl-0">
		: <?php echo $row['kegiatan']; ?>
	</div>
</div>
<div class="row my-3">
	<div class="col-3">
		Lokasi
	</div>
	<div class="col-9 pl-0">
		: <?php echo $row['lokasi']; ?>
	</div>
</div>
<div class="row my-3">
	<div class="col-3">
		Lama Perjalanan Dinas
	</div>
	<div class="col-9 pl-0">
		:
		<?php
		$tanggal_mulai = new DateTime($row['tgl_mulai']);
		$tanggal_selesai =  new DateTime($row['tgl_selesai']);
		$diff = $tanggal_selesai->diff($tanggal_mulai);

		if ($diff->d <= 0) {
			echo "1 Hari";
		} else {
			echo $diff->d;
			echo " Hari";
		}
		?>
	</div>
</div>
<div class="row my-3">
	<div class="col-3">
		Nama
	</div>
	<div class="col-9 pl-0">
		: <?php echo $row['name']; ?>
	</div>
</div>
<div class="row my-3">
	<div class="col-3">
		Pengikut 1
	</div>
	<div class="col-9 pl-0">
		: <?php echo $row['pengikut_a'] . ' - ' . $row['nik_a']; ?>
	</div>
</div>
<div class="row my-3">
	<div class="col-3">
		Pengikut 2
	</div>
	<div class="col-9 pl-0">
		: <?php echo $row['pengikut_b'] . ' - ' . $row['nik_b']; ?>
	</div>
</div>
<div class="row my-3">
	<div class="col-3">
		Pengikut 3
	</div>
	<div class="col-9 pl-0">
		: <?php echo $row['pengikut_c'] . ' - ' . $row['nik_c']; ?>
	</div>
</div>