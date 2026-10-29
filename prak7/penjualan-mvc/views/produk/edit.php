<?php
$e = function ($nilai) {
    return htmlspecialchars((string) $nilai, ENT_QUOTES, 'UTF-8');
};
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Produk | Penjualan</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <main class="container container-form">
        <a class="back-link" href="index.php">&larr; Kembali ke daftar produk</a>
        <section class="panel form-panel">
            <p class="eyebrow">PERBARUI DATA</p>
            <h1>Edit Produk</h1>
            <p class="subtitle">Perbarui informasi produk yang dipilih.</p>

            <?php if ($error !== '') { ?>
                <div class="alert" role="alert"><?php echo $e($error); ?></div>
            <?php } ?>

            <?php if ($produk) { ?>
                <form method="post" action="index.php?aksi=edit&amp;id=<?php echo $e($produk['id']); ?>">
                    <label for="nama_produk">Nama produk</label>
                    <input id="nama_produk" name="nama_produk" type="text" maxlength="150" value="<?php echo $e($form['nama_produk']); ?>" required>

                    <label for="harga">Harga (Rp)</label>
                    <input id="harga" name="harga" type="number" min="0" step="0.01" value="<?php echo $e($form['harga']); ?>" required>

                    <label for="stok">Stok</label>
                    <input id="stok" name="stok" type="number" min="0" step="1" value="<?php echo $e($form['stok']); ?>" required>

                    <div class="form-actions">
                        <a class="button button-secondary" href="index.php">Batal</a>
                        <button class="button button-primary" type="submit">Simpan Perubahan</button>
                    </div>
                </form>
            <?php } ?>
        </section>
    </main>
</body>
</html>