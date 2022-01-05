<?php
session_start();

include 'connection_db.php';

$id = 0;
$update = false;
$name = '';
$nip = '';
$tempatlahir = '';
$tanggallahir = '';
$golongan = '';
$jabatan = '';

$id_surat = '0';
$update2 = false;
$dasar_surat = '';
$tgl_mulai = '';
$tgl_selesai = '';
$jam_mulai = '';
$jam_selesai = '';
$lokasi = '';
$kegiatan = '';
$pengikut_a = '';
$pengikut_b = '';
$pengikut_c = '';
$nip_a = '';
$nip_b = '';
$nip_c = '';
$id_asn = '';
$id_agenda = '';
$isi_notulen = '';

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $nip = $_POST['nip'];
    $tempatlahir = $_POST['tempatlahir'];
    $tanggallahir = date('Y-m-d', strtotime($_POST['tanggallahir']));
    $golongan = $_POST['golongan'];
    $jabatan = $_POST['jabatan'];
    $mysqli->query("INSERT INTO data_asn (name,nip,tempatlahir,tanggallahir,golongan,jabatan) VALUES
    ('$name','$nip','$tempatlahir','$tanggallahir','$golongan','$jabatan')") or die($mysqli->error);
    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";
    header("location: show_asn.php");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data_asn WHERE id=$id") or die($mysqli->error);
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location: show_asn.php");
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data_asn WHERE id=$id") or die($mysqli->error);
    if (count(array($result)) == 1) {
        $row = $result->fetch_array();
        $name = $row['name'];
        $nip = $row['nip'];
        $tempatlahir = $row['tempatlahir'];
        $tanggallahir = date('Y-m-d', strtotime($row['tanggallahir']));
        $golongan = $row['golongan'];
        $jabatan = $row['jabatan'];
    }
}

if (isset($_GET['input'])) {
    $id = $_GET['input'];
    // $update = true;
    $result = $mysqli->query("SELECT * FROM data_asn WHERE id=$id") or die($mysqli->error);
    if (count(array($result)) == 1) {
        $row = $result->fetch_array();
        $name = $row['name'];
        $nip = $row['nip'];
        $tempatlahir = $row['tempatlahir'];
        $tanggallahir = date('Y-m-d', strtotime($row['tanggallahir']));
        $golongan = $row['golongan'];
        $jabatan = $row['jabatan'];
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $nip = $_POST['nip'];
    $tempatlahir = $_POST['tempatlahir'];
    $tanggallahir = date('Y-m-d', strtotime($_POST['tanggallahir']));
    $golongan = $_POST['golongan'];
    $jabatan = $_POST['jabatan'];
    $mysqli->query("UPDATE data_asn SET 
    name = '$name', nip = '$nip', tempatlahir = '$tempatlahir', tanggallahir = '$tanggallahir', golongan = '$golongan', jabatan = '$jabatan' 
    WHERE id ='$id'") or die($mysqli->error);
    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";
    header("location: show_asn.php");
}

//zzzzzzzzzzz

if (isset($_POST['save2'])) {
    echo $id_asn;
    $dasar_surat = $_POST['dasar_surat'];
    $lokasi = $_POST['lokasi'];
    $kegiatan = $_POST['kegiatan'];
    $tgl_mulai = date('Y-m-d', strtotime($_POST['tgl_mulai']));
    $tgl_selesai = date('Y-m-d', strtotime($_POST['tgl_selesai']));
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $pengikut_a = $_POST['pengikut_a'];
    $pengikut_b = $_POST['pengikut_b'];
    $pengikut_c = $_POST['pengikut_c'];
    $nip_a = $_POST['nip_a'];
    $nip_b = $_POST['nip_b'];
    $nip_c = $_POST['nip_c'];
    $id_asn = $_POST['id_asn'];
    $mysqli->query("INSERT INTO data_agenda 
    (dasar_surat,lokasi,kegiatan,tgl_mulai,tgl_selesai,jam_mulai,jam_selesai,pengikut_a,pengikut_b,pengikut_c,nip_a,nip_b,nip_c,id_asn)
    VALUES 
    ('$dasar_surat','$lokasi','$kegiatan','$tgl_mulai','$tgl_selesai','$jam_mulai','$jam_selesai','$pengikut_a','$pengikut_b','$pengikut_c','$nip_a','$nip_b','$nip_c','$id_asn')")
        or die($mysqli->error);
    // $_SESSION['message'] = "Record has been saved!";
    // $_SESSION['msg_type'] = "success";
    header("location: show_agenda.php");
}

if (isset($_GET['delete2'])) {
    $id_surat = $_GET['delete2'];
    $mysqli->query("DELETE FROM data_agenda WHERE id=$id_surat") or die($mysqli->error);
    // $_SESSION['message'] = "Record has been deleted!";
    // $_SESSION['msg_type'] = "danger";
    header("location: show_agenda.php");
}
if (isset($_GET['edit2'])) {
    $id_surat = $_GET['edit2'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data_agenda WHERE id=$id_surat") or die($mysqli->error);
    echo $name;
    if (count(array($result)) == 1) {
        $row = $result->fetch_array();
        // $golongan = $row['golongan'];
        // $jabatan = $row['jabatan'];
        $dasar_surat = $row['dasar_surat'];
        $lokasi = $row['lokasi'];
        $kegiatan = $row['kegiatan'];
        $tgl_mulai = date('Y-m-d', strtotime($row['tgl_mulai']));
        $tgl_selesai = date('Y-m-d', strtotime($row['tgl_selesai']));
        $jam_mulai = $row['jam_mulai'];
        $jam_selesai = $row['jam_selesai'];
        $pengikut_a = $row['pengikut_a'];
        $pengikut_b = $row['pengikut_b'];
        $pengikut_c = $row['pengikut_c'];
        $nip_a = $row['nip_a'];
        $nip_b = $row['nip_b'];
        $nip_c = $row['nip_c'];
        $_GET['id_asn'] = $row['id_asn'];
    }
}

if (isset($_POST['update2'])) {
    $id_surat = $_POST['id_surat'];
    $dasar_surat = $_POST['dasar_surat'];
    $lokasi = $_POST['lokasi'];
    $kegiatan = $_POST['kegiatan'];
    $tgl_mulai = date('Y-m-d', strtotime($_POST['tgl_mulai']));
    $tgl_selesai = date('Y-m-d', strtotime($_POST['tgl_selesai']));
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $pengikut_a = $_POST['pengikut_a'];
    $pengikut_b = $_POST['pengikut_b'];
    $pengikut_c = $_POST['pengikut_c'];
    $nip_a = $_POST['nip_a'];
    $nip_b = $_POST['nip_b'];
    $nip_c = $_POST['nip_c'];
    $id_asn = $_POST['id_asn'];

    $mysqli->query("UPDATE `data_agenda` SET 
    `dasar_surat` = '$dasar_surat', `lokasi` = '$lokasi', `kegiatan` = '$kegiatan', `tgl_mulai` = '$tgl_mulai', 
    `tgl_selesai` = '$tgl_selesai', `jam_mulai` = '$jam_mulai', `jam_selesai` = '$jam_selesai', `pengikut_a` = '$pengikut_a', 
    `pengikut_b` = '$pengikut_b', `pengikut_c` = '$pengikut_c', `nip_a` = '$nip_a', `nip_b` = '$nip_b', `nip_c` = '$nip_c', `id_asn` = '$id_asn' WHERE `data_agenda`.`id` = $id_surat") or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";
    header("location: show_agenda.php");
}

// if (isset($_GET['modal'])) {
//     $id_surat = $_GET['modal'];
//     // $update = true;
//     $result = $mysqli->query("SELECT * FROM data_agenda WHERE id=$id_surat") or die($mysqli->error);
//     if (count(array($result)) == 1) {
//         $row = $result->fetch_array();
//         // $golongan = $row['golongan'];
//         // $jabatan = $row['jabatan'];
//         $dasar_surat = $row['dasar_surat'];
//         $lokasi = $row['lokasi'];
//         $kegiatan = $row['kegiatan'];
//         $tgl_mulai = date('Y-m-d', strtotime($row['tgl_mulai']));
//         $tgl_selesai = date('Y-m-d', strtotime($row['tgl_selesai']));
//         $jam_mulai = $row['jam_mulai'];
//         $jam_selesai = $row['jam_selesai'];
//         $pengikut_a = $row['pengikut_a'];
//         $pengikut_b = $row['pengikut_b'];
//         $pengikut_c = $row['pengikut_c'];
//         // $id_asn = $row['id_asn'];
//     }
// }


//notulen_action
if (isset($_POST['save3'])) {
    echo $id_agenda;
    $isi_notulen = $_POST['isi_notulen'];
    $id_agenda = $_POST['id_agenda'];
    
    $mysqli->query("INSERT INTO data_notulen (isi_notulen,id_agenda) VALUES ('$isi_notulen','$id_agenda')") or die($mysqli->error);

    header("location: show_notulen.php");
}

if (isset($_GET['delete3'])) {
    $id = $_GET['delete3'];
    $mysqli->query("DELETE FROM data_notulen WHERE id=$id") or die($mysqli->error);
    header("location: show_notulen.php");
}

if (isset($_GET['edit3'])) {
    $id_agenda = $_GET['edit3'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data_notulen WHERE id=$id") or die($mysqli->error);
    if (count(array($result)) == 1) {
        $row = $result->fetch_array();
        $isi_notulen = $row['isi_notulen'];
        $id_agenda = $row['id_agenda'];
    }
}

if (isset($_POST['update3'])) {
    $isi_notulen = $_POST['isi_notulen'];
    $id_agenda = $_POST['id_agenda'];

    $mysqli->query("UPDATE data_notulen SET 'isi_notulen' = '$isi_notulen','id_agenda'='$id_agenda WHERE 'data_notulen'.'id' = '$id' ") or die($mysqli->error);
    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";
    header("location: show_agenda.php");
}


// Generate notulen
if (isset($_POST['generate_notulen'])) {
    $id_agenda = $_POST['id_agenda'];
    $isi_notulen = $_POST['isi_notulen'];
    
    $mysqli->query("INSERT INTO data_notulen (isi_notulen,id_agenda) VALUES ('$isi_notulen','$id_agenda')") or die($mysqli->error);

    header("location: show_notulen.php");
}