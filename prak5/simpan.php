<?php

include "koneksi.php";

if (! mysqli_select_db($koneksi, "akademik")) {
    die("Database akademik belum tersedia. Jalankan setup.php terlebih dahulu.");
}

$nim      = $_POST["nim"];
$nama     = $_POST["nama"];
$email    = $_POST["email"];
$prodi    = $_POST["prodi"];
$angkatan = $_POST["angkatan"];
$ipk      = $_POST["ipk"];

$query = mysqli_query(
    $koneksi,
    "INSERT INTO mahasiswa
    (nim, nama, email, prodi, angkatan, ipk)
    VALUES
    ('$nim', '$nama', '$email', '$prodi', '$angkatan', '$ipk')"
);

if ($query) {
    echo "data berhasil disimpan";
} else {
    echo "data gagal disimpan";
}
