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

    $berhasil = (bool)$query;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $berhasil ? "Data Tersimpan" : "Penyimpanan Gagal"; ?></title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            display: grid;
            min-height: 100vh;
            margin: 0;
            padding: 24px;
            place-items: center;
            background: #f1f5f9;
            color: #1e293b;
            font-family: Arial, sans-serif;
        }

        main {
            width: min(100%, 440px);
            padding: 32px;
            border: 1px solid #dbe3ec;
            border-radius: 8px;
            background: #ffffff;
            text-align: center;
        }

        .status {
            margin: 0 0 10px;
            color: <?php echo $berhasil ? "#15803d" : "#b91c1c"; ?>;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        h1 {
            margin: 0 0 12px;
            font-size: 25px;
        }

        p {
            margin: 0 0 24px;
            color: #64748b;
            line-height: 1.5;
        }

        a {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 4px;
            background: #2563eb;
            color: #ffffff;
            font-weight: 600;
            text-decoration: none;
        }

        a:hover {
            background: #1d4ed8;
        }
    </style>
</head>
<body>
    <main>
        <p class="status"><?php echo $berhasil ? "Berhasil" : "Belum berhasil"; ?></p>
        <h1><?php echo $berhasil ? "Data tersimpan" : "Data gagal disimpan"; ?></h1>
        <p>
            <?php echo $berhasil
                    ? "Data mahasiswa sudah ditambahkan ke database."
                : "Silakan periksa kembali data yang dimasukkan, lalu coba lagi."; ?>
        </p>
        <a href="form.php">Kembali ke form</a>
    </main>
</body>
</html>
