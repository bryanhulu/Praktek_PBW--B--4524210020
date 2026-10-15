
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="style.css">
    <title>Tambah Mahasiswa</title>
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
                </span>
            </a>
            <nav class="site-nav" aria-label="Navigasi utama">
                <a href="index.php">Data Mahasiswa</a>
                <a class="active" href="create.php">Tambah Data</a>
            </nav>
        </div>
    </header>

    <main class="page-shell">
        <section class="page-heading">
            <div>
                <p class="page-eyebrow">AKADEMIK / MAHASISWA / TAMBAH</p>
                <h1>Tambah Mahasiswa</h1>
                <p class="page-subtitle">Lengkapi informasi mahasiswa pada formulir berikut.</p>
            </div>
        </section>

        <form action="store.php" method="POST" class="form-panel">

        <div class="form-field form-field-half">
            <label for="nim" class="text-sm font-semibold mb-1">NIM:</label>
            <input type="text" id="nim" name="nim" required
                class="mb-4 p-2 border border-gray-300 rounded">
        </div>

        <div class="form-field form-field-half">
            <label for="nama" class="text-sm font-semibold mb-1">Nama:</label>
            <input type="text" id="nama" name="nama" required
                class="mb-4 p-2 border border-gray-300 rounded">
        </div>

        <div class="form-field">
            <label for="email" class="text-sm font-semibold mb-1">Email:</label>
            <input type="email" id="email" name="email" required
                class="mb-4 p-2 border border-gray-300 rounded">
        </div>

        <div class="form-field">
            <label for="prodi" class="text-sm font-semibold mb-1">Prodi:</label>
            <input type="text" id="prodi" name="prodi" required
                class="mb-4 p-2 border border-gray-300 rounded">
        </div>

        <div class="form-field form-field-half">
            <label for="ipk" class="text-sm font-semibold mb-1">IPK:</label>
            <input type="number" id="ipk" name="ipk" step="0.01" required
                class="mb-6 p-2 border border-gray-300 rounded">
        </div>

        <div class="form-field form-field-half">
            <label for="angkatan" class="text-sm font-semibold mb-1">Angkatan:</label>
            <input type="text" id="angkatan" name="angkatan" required
                class="mb-4 p-2 border border-gray-300 rounded">
        </div>

        <div class="form-actions">
            <a href="index.php" class="back-button">Kembali</a>
            <button type="submit" class="bg-blue-600 text-white font-bold py-2 rounded">
                Simpan
            </button>
        </div>
        </form>
    </main>
</body>
</html>
