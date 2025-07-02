<?php
include_once("konfigurasi.php");
$dta["error"] = '1';

if (isset($_POST["txNIM"])) {
    $dta["error"] = '2';
    $nim = $_POST["txNIM"];

    $sql = "DELETE FROM beasiswa WHERE nim='$nim';";
    $hasil = mysqli_query($koneksi, $sql);
    $jAfrow = mysqli_affected_rows($koneksi);

    if ($jAfrow > 0) {
        $dta["error"] = '0';
    }

    mysqli_close($koneksi);
}

header("Content-type: application/json");
echo json_encode($dta);
