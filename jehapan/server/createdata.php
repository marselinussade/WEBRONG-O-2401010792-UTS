<?php
include_once("konfigurasi.php");

$hsl["error"] = 1;

if (isset($_POST["txNIM"])) {
    $NIM             = $_POST["txNIM"];
    $NAMA            = $_POST["txNAMA"];
    $PRODI           = $_POST["txPRODI"];
    $JENIS_BEASISWA  = $_POST["txBEASISWA"];
    $TEMPAT_LAHIR    = $_POST["txTEMPAT"];
    $TANGGAL_LAHIR   = $_POST["txTGL"];
    $JENIS_KELAMIN   = $_POST["txJK"];

    $sql = "INSERT INTO beasiswa (
                nim, nama, prodi, jenis_beasiswa, tempat_lahir, tanggal_lahir, jenis_kelamin
            ) VALUES (
                '$NIM', '$NAMA', '$PRODI', '$JENIS_BEASISWA', '$TEMPAT_LAHIR', '$TANGGAL_LAHIR', '$JENIS_KELAMIN'
            );";

    $hsl["sql"] = $sql;
    $hasil = mysqli_query($koneksi, $sql);
    $hsl["affectedrows"] = mysqli_affected_rows($koneksi);

    if ($hasil) {
        $hsl["error"] = 0;
    }
}

header("Content-type: application/json; charset=utf-8");
echo json_encode($hsl);
