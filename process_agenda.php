<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'tane8339_cilengkrang') or die(mysqli_error($mysqli));

$id_surat = '';
$update2 = false;
$dasar_surat = '';
$tgl_mulai = '';
$tgl_selesai = '';
$jam_mulai = '';
$jam_selesai = '';
$lokasi = '';
$pengikut_a = '';
$pengikut_b = '';
$pengikut_c = '';
$id_asn = '';

if (isset($_POST['save2'])) {
    echo $id_asn;
    $dasar_surat = $_POST['dasar_surat'];
    $lokasi = $_POST['lokasi'];
    $tgl_mulai = date('Y-m-d', strtotime($_POST['tgl_mulai']));
    $tgl_selesai = date('Y-m-d', strtotime($_POST['tgl_selesai']));
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $pengikut_a = $_POST['pengikut_a'];
    $pengikut_b = $_POST['pengikut_b'];
    $pengikut_c = $_POST['pengikut_c'];
    $id_asn = $_POST['id_asn'];
    $mysqli->query("INSERT INTO data_agenda (dasar_surat,lokasi,tgl_mulai,tgl_selesai,jam_mulai,jam_selesai,pengikut_a,pengikut_b,pengikut_c,id_asn) VALUES 
    ('$dasar_surat','$lokasi','$tgl_mulai','$tgl_selesai','$jam_mulai','$jam_selesai','$pengikut_a','$pengikut_b','$pengikut_c','$id_asn')") or die($mysqli->error);
    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";
    header("location: show_agenda.php");
}

if (isset($_GET['delete2'])) {
    $id = $_GET['delete2'];
    $mysqli->query("DELETE FROM data_agenda WHERE id=$id") or die($mysqli->error);
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location: show_agenda.php");
}
if (isset($_GET['edit2'])) {
    $id = $_GET['edit2'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data_agenda WHERE id=$id") or die($mysqli->error);
    if (count(array($result)) == 1) {
        $row = $result->fetch_array();
        $dasar_surat = $_POST['dasar_surat'];
        $lokasi = $_POST['lokasi'];
        $tgl_mulai = date('Y-m-d', strtotime($_POST['tgl_mulai']));
        $tgl_selesai = date('Y-m-d', strtotime($_POST['tgl_selesai']));
        $jam_mulai = $_POST['jam_mulai'];
        $jam_selesai = $_POST['jam_selesai'];
        $pengikut_a = $_POST['pengikut_a'];
        $pengikut_b = $_POST['pengikut_b'];
        $pengikut_c = $_POST['pengikut_c'];
        $id_asn = $_POST['id_asn'];
    }
}

if (isset($_POST['update2'])) {
    $dasar_surat = $_POST['dasar_surat'];
    $lokasi = $_POST['lokasi'];
    $tgl_mulai = date('Y-m-d', strtotime($_POST['tgl_mulai']));
    $tgl_selesai = date('Y-m-d', strtotime($_POST['tgl_selesai']));
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $pengikut_a = $_POST['pengikut_a'];
    $pengikut_b = $_POST['pengikut_b'];
    $pengikut_c = $_POST['pengikut_c'];
    $id_asn = $_POST['id_asn'];
    $mysqli->query("UPDATE data_asn SET 
    name = '$name', nip = '$nip', tempatlahir = '$tempatlahir', tanggallahir = '$tanggallahir', golongan = '$golongan', jabatan = '$jabatan' 
    WHERE id ='$id'") or die($mysqli->error);
    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";
    header("location: show_asn.php");
}
