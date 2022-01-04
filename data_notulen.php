<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include 'head.php';
  ?>

  <title>Input Notulen Kegiatan</title>
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
                  <select class="form-control form-control-sm border border-success" name="id" id="id">
                    <option disabled selected>Pilih Agenda Kegiatan</option>
                    <?php
                    $result = $mysqli->query("SELECT * FROM data_asn INNER JOIN data_agenda ON data_asn.id = data_agenda.id_asn ORDER BY tgl_mulai DESC") or die($mysqli->error);

                    while ($row = $result->fetch_assoc()) {
                      $keterangan = "";

                      if (isset($_GET['id_asn'])) {
                        $get_id_asn = trim($_GET['id_asn']);

                        if ($get_id_asn == $row['id']) {
                          $keterangan = "selected";
                        }
                      } else {
                        $keterangan = "damn";
                      }

                    ?>
                      <option <?php echo $keterangan; ?> value="<?= $row['id'] ?>"><?= $row['name'] . ' - ' . $row['kegiatan'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </h4>
            </div>
            <div class="col"></div>
          </div>

          <div class="row mb-1">
            <div class="col">

            </div>
            <div class="col-sm-6">

            </div>
            <div class="col">

            </div>
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