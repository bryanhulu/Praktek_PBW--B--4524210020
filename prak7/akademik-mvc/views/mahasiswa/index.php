<?php $jumlahMahasiswa = mysqli_num_rows($dataMahasiswa); ?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa | Akademika</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/mahasiswa.css">
</head>
<body>
    <header class="topbar">
        <div class="brand"><span class="brand-mark">B</span>Bryan Prak 7</div>
        <span class="topbar-label">Sistem Informasi Akademik</span>
    </header>

    <main>
        <section class="page-heading" aria-labelledby="page-title">
            <div>
                <h1 id="page-title">Data Mahasiswa</h1>
                <p class="intro">Kelola dan pantau informasi mahasiswa dalam satu tempat.</p>
            </div>
            <div class="record-summary" aria-label="Jumlah mahasiswa terdaftar">
                <strong><?php echo number_format($jumlahMahasiswa); ?></strong>
                <span>MAHASISWA TERDAFTAR</span>
            </div>
        </section>

        <section class="directory" aria-labelledby="directory-title">
            <div class="directory-toolbar">
                <div>
                    <h2 class="directory-title" id="directory-title">Direktori mahasiswa</h2>
                    <p class="directory-caption">Informasi akademik dan kontak mahasiswa</p>
                </div>
                <input class="search" id="student-search" type="search" placeholder="Cari nama, NIM, atau prodi..." aria-label="Cari mahasiswa">
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama mahasiswa</th>
                            <th>Email</th>
                            <th>Program studi</th>
                            <th>Angkatan</th>
                            <th>IPK</th>
                        </tr>
                    </thead>
                    <tbody id="student-list">
                        <?php if ($jumlahMahasiswa > 0) { ?>
                            <?php while ($mhs = mysqli_fetch_assoc($dataMahasiswa)) { ?>
                                <tr>
                                    <td class="student-id"><?php echo htmlspecialchars($mhs['nim'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td class="student-name"><?php echo htmlspecialchars($mhs['nama'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($mhs['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><span class="program"><?php echo htmlspecialchars($mhs['prodi'], ENT_QUOTES, 'UTF-8'); ?></span></td>
                                    <td><?php echo htmlspecialchars($mhs['angkatan'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><span class="gpa"><?php echo htmlspecialchars($mhs['ipk'], ENT_QUOTES, 'UTF-8'); ?></span></td>
                                </tr>
                            <?php } ?>
                            <tr id="no-results" hidden>
                                <td class="empty-state" colspan="6"><strong>Mahasiswa tidak ditemukan</strong>Coba kata kunci yang berbeda.</td>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <td class="empty-state" colspan="6"><strong>Belum ada data mahasiswa</strong>Data mahasiswa akan tampil di sini setelah tersedia.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <script>
        const searchInput = document.getElementById('student-search');
        const studentRows = Array.from(document.querySelectorAll('#student-list tr:not(#no-results)'));
        const noResults = document.getElementById('no-results');

        searchInput.addEventListener('input', function () {
            const query = this.value.trim().toLocaleLowerCase('id');
            let visibleCount = 0;

            studentRows.forEach(function (row) {
                const matches = row.textContent.toLocaleLowerCase('id').includes(query);
                row.hidden = !matches;
                if (matches) visibleCount++;
            });

            if (noResults) noResults.hidden = visibleCount > 0;
        });
    </script>
</body>
</html>