<?php
$jumlahProduk = mysqli_num_rows($dataProduk);
$e = function ($nilai) {
    return htmlspecialchars((string) $nilai, ENT_QUOTES, 'UTF-8');
};
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Produk | Penjualan</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <main class="container">
        <header class="page-header">
            <div>
                <p class="eyebrow">APLIKASI PENJUALAN</p>
                <h1>Daftar Produk</h1>
                <p class="subtitle">Kelola nama, harga, dan stok produk.</p>
            </div>
            <a class="button button-primary" href="index.php?aksi=create">+ Tambah Produk</a>
        </header>

        <section class="panel">
            <div class="panel-heading">
                <h2>Produk tersimpan</h2>
                <span class="count"><?php echo $jumlahProduk; ?> produk</span>
            </div>

            <?php if ($pesan !== '') { ?>
                <div class="notice notice-success" role="status"><?php echo $e($pesan); ?></div>
            <?php } ?>
            <?php if ($error !== '') { ?>
                <div class="alert" role="alert"><?php echo $e($error); ?></div>
            <?php } ?>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($jumlahProduk > 0) { ?>
                            <?php while ($produk = mysqli_fetch_assoc($dataProduk)) { ?>
                                <tr>
                                    <td><?php echo 'P' . str_pad($e($produk['id']), 4, '0', STR_PAD_LEFT); ?></td>
                                    <td class="product-name"><?php echo $e($produk['nama_produk']); ?></td>
                                    <td>Rp <?php echo number_format((float) $produk['harga'], 2, ',', '.'); ?></td>
                                    <td><?php echo $e($produk['stok']); ?></td>
                                    <td>
                                        <a class="button button-small" href="index.php?aksi=edit&id=<?php echo $e($produk['id']); ?>">Edit</a>
                                        <form class="inline-form" method="post" action="index.php?aksi=hapus" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                            <input type="hidden" name="id" value="<?php echo $e($produk['id']); ?>">
                                            <button class="button button-small button-danger" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td class="empty-state" colspan="5">
                                    Belum ada produk. Klik “Tambah Produk” untuk memasukkan data.
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