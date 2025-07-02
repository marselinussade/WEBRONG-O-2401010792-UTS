<?php
global $koneksi;
include_once("konfigurasi.php");

$sql = "SELECT 
            nim, 
            nama, 
            tanggal_lahir, 
            jenis_kelamin, 
            jenis_beasiswa, 
            prodi, 
            tempat_lahir 
        FROM beasiswa;";

$ps = mysqli_query($koneksi, $sql);
$h = [];

while ($res = mysqli_fetch_assoc($ps)) {
    $h[] = array(
        'NIM'            => $res["nim"],
        'NAMA'           => $res["nama"],
        'TANGGAL_LAHIR'  => $res["tanggal_lahir"],
        'JENIS_KELAMIN'  => $res["jenis_kelamin"],
        'JENIS_BEASISWA' => $res["jenis_beasiswa"],
        'PRODI'          => $res["prodi"],
        'TEMPAT_LAHIR'   => $res["tempat_lahir"]
    );
}

header("Content-type: application/json");
echo json_encode($h);
