<?php

class ProdukModel
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    public function getAllProduk()
    {
        $query = mysqli_query(
            $this->koneksi,
            'SELECT id, nama_produk, harga, stok FROM produk ORDER BY id DESC'
        );

        return $query;
    }

    public function getProdukById($id)
    {
        $stmt = mysqli_prepare(
            $this->koneksi,
            'SELECT id, nama_produk, harga, stok FROM produk WHERE id = ?'
        );
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $produk = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);

        return $produk;
    }

    public function tambahProduk($namaProduk, $harga, $stok)
    {
        $stmt = mysqli_prepare(
            $this->koneksi,
            'INSERT INTO produk (nama_produk, harga, stok) VALUES (?, ?, ?)'
        );
        mysqli_stmt_bind_param($stmt, 'sdi', $namaProduk, $harga, $stok);
        $berhasil = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        return $berhasil;
    }

    public function updateProduk($id, $namaProduk, $harga, $stok)
    {
        $stmt = mysqli_prepare(
            $this->koneksi,
            'UPDATE produk SET nama_produk = ?, harga = ?, stok = ? WHERE id = ?'
        );
        mysqli_stmt_bind_param($stmt, 'sdii', $namaProduk, $harga, $stok, $id);
        $berhasil = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        return $berhasil;
    }

    public function hapusProduk($id)
    {
        $stmt = mysqli_prepare(
            $this->koneksi,
            'DELETE FROM produk WHERE id = ?'
        );
        mysqli_stmt_bind_param($stmt, 'i', $id);
        $berhasil = mysqli_stmt_execute($stmt);
        $terhapus = $berhasil && mysqli_stmt_affected_rows($stmt) === 1;
        mysqli_stmt_close($stmt);

        return $terhapus;
    }
}