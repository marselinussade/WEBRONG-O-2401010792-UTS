<?php
include_once("konfigurasi.php");
$dta["error"] = '1';

if (isset($_GET["nim"])) {
    $dta["error"] = '2';
    $nim = $_GET["nim"];
    $sql = "SELECT * FROM beasiswa WHERE nim = '$nim';";
    $hasil = mysqli_query($koneksi, $sql);
    $jAfrow = mysqli_num_rows($hasil);

    if ($jAfrow > 0) {
        $h = mysqli_fetch_assoc($hasil);
        $dta["isi"] = [
            'nim'             => $h["nim"],
            'nama'            => $h["nama"],
            'prodi'           => $h["prodi"],
            'jenis_beasiswa'  => $h["jenis_beasiswa"],
            'tempat_lahir'    => $h["tempat_lahir"],
            'tanggal_lahir'   => $h["tanggal_lahir"],
            'jenis_kelamin'   => $h["jenis_kelamin"]
        ];
        $dta["error"] = '0';
    }
    mysqli_close($koneksi);
}

header("Content-type: application/json");
echo json_encode($dta);
