<?php

$host = '127.0.0.1';
$user = 'root';
$password = '';
$dbname = 'penjualan';
$port = 3306;

$koneksi = mysqli_connect($host, $user, $password, $dbname, $port);

if (! $koneksi) {
    die('Koneksi database gagal: ' . mysqli_connect_error());
}

mysqli_set_charset($koneksi, 'utf8mb4');