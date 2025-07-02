<?php
include_once("konfigurasi.php");
$dta["error"] = '1';

if (isset($_GET["nim"])) {
    $dta["error"] = '2';
    $nim = $_GET["nim"];
    $sql = "SELECT * FROM beasiswa WHERE nim='$nim';";
    $hasil = mysqli_query($koneksi, $sql);
    $jAfrow = mysqli_num_rows($hasil);

    if ($jAfrow > 0) {
        $h = mysqli_fetch_assoc($hasil);
        $dta["isi"] = [
            'NIM'            => $h["nim"],
            'NAMA'           => $h["nama"],
            'JENIS_BEASISWA' => $h["jenis_beasiswa"],
            'JENIS_KELAMIN'  => $h["jenis_kelamin"],
            'PRODI'          => $h["prodi"],
            'TEMPAT_LAHIR'   => $h["tempat_lahir"],
        ];
        $dta["error"] = '0';
    }
    mysqli_close($koneksi);
}

header("Content-type: application/json");
echo json_encode($dta);


