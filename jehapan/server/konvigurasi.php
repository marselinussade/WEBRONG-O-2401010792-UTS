<?php
    define("DBHOST", "localhost");
    define("DBUSERNAME", "root");
    define("DBPASSWORD", "");
    define("DBNAME", "beasiswa"); 
    define("DBPORT", "3306");

    global $koneksi;
    $koneksi = mysqli_connect(DBHOST, DBUSERNAME, DBPASSWORD, DBNAME, DBPORT);

    if (!$koneksi) {
        die("Koneksi ke database gagal: " . mysqli_connect_error());
    }
?>
