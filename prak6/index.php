<?php
include "koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="style.css">
    <title>Data Mahasiswa</title>
</head>
<body class="bg-gray-50 p-6 font-sans text-gray-800">
    <header class="site-header">
        <div class="site-header-inner">
            <a class="site-brand" href="index.php">
                <span class="brand-mark">S</span>
                <span class="brand-copy">
                    <strong>SIAKAD</strong>
                    <small>KELOLA DATA MAHASISWA</small>
                </span>
            </a>
            <nav class="site-nav" aria-label="Navigasi utama">
                <a class="active" href="index.php">Data Mahasiswa</a>
                <a href="create.php">Tambah Data</a>
            </nav>
        </div>
    </header>

    <main class="page-shell">
        <section class="page-heading">
            <div>
                <p class="page-eyebrow">AKADEMIK / MAHASISWA</p>
                <h1>SIAKAD</h1>
                <p class="page-subtitle">Sistem Informasi Akademik Mahasiswa.</p>
            </div>
        </section>

        <section class="data-panel">
            <div class="panel-toolbar">
                <div>
                    <h2>Daftar Mahasiswa</h2>
                    <p>Informasi mahasiswa terdaftar</p>
                </div>
                <a href="create.php" class="primary-button">+ Tambah Mahasiswa</a>
            </div>

            <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200 text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-gray-200 p-3 font-semibold">NIM</th>
                        <th class="border border-gray-200 p-3 font-semibold">Nama</th>
                        <th class="border border-gray-200 p-3 font-semibold">Email</th>
                        <th class="border border-gray-200 p-3 font-semibold">Prodi</th>
                        <th class="border border-gray-200 p-3 font-semibold">
                            Angkatan
                        </th>
                        <th class="border border-gray-200 p-3 font-semibold">IPK</th>
                        <th class="border border-gray-200 p-3 font-semibold text-center">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="border border-gray-200 p-3"><?= $data['nim']; ?></td>
                            <td class="border border-gray-200 p-3"><?= $data['nama']; ?></td>
                            <td class="border border-gray-200 p-3"><?= $data['email']; ?></td>
                            <td class="border border-gray-200 p-3"><?= $data['prodi']; ?></td>
                            <td class="border border-gray-200 p-3"><?= $data['angkatan']; ?></td>
                            <td class="border border-gray-200 p-3"><?= $data['ipk']; ?></td>
                            <td class="border border-gray-200 p-3 text-center">
                                <a href="edit.php?nim=<?= $data['nim']; ?>" 
                                   class="text-blue-600 hover:text-blue-800 hover:underline font-medium">
                                    Edit
                                </a>
                                <span class="mx-1 text-gray-300">|</span>
                                <a href="delete.php?nim=<?= $data['nim']; ?>" 
                                   onclick="return confirm('Yakin ingin menghapus data ini?')" 
                                   class="text-red-600 hover:text-red-800 hover:underline font-medium">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
        </section>
    </main>
</body>
</html>