<?php

include "models/ProdukModel.php";

class ProdukController
{
    private $model;

    public function __construct($koneksi)
    {
        $this->model = new ProdukModel($koneksi);
    }

    public function index($error = '')
    {
        $dataProduk = $this->model->getAllProduk();
        $pesan = ($_GET['status'] ?? '') === 'hapus' ? 'Produk berhasil dihapus.' : '';
        include "views/produk/index.php";
    }

    public function create()
    {
        $form = [
            'nama_produk' => '',
            'harga' => '',
            'stok' => '',
        ];
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $form = $this->ambilDataForm();
            $error = $this->validasiForm($form);

            if ($error === '') {
                $berhasil = $this->model->tambahProduk(
                    $form['nama_produk'],
                    (float) $form['harga'],
                    (int) $form['stok']
                );

                if ($berhasil) {
                    header('Location: index.php');
                    exit;
                }

                $error = 'Produk gagal disimpan. Silakan coba lagi.';
            }
        }

        include "views/produk/create.php";
    }

    public function edit()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $produk = $id && $id > 0 ? $this->model->getProdukById($id) : null;
        $error = '';
        $form = $produk ?: [
            'nama_produk' => '',
            'harga' => '',
            'stok' => '',
        ];

        if ($produk && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $form = $this->ambilDataForm();
            $error = $this->validasiForm($form);

            if ($error === '') {
                $berhasil = $this->model->updateProduk(
                    $id,
                    $form['nama_produk'],
                    (float) $form['harga'],
                    (int) $form['stok']
                );

                if ($berhasil) {
                    header('Location: index.php');
                    exit;
                }

                $error = 'Perubahan produk gagal disimpan. Silakan coba lagi.';
            }
        }

        if (! $produk) {
            http_response_code(404);
            $error = 'Produk tidak ditemukan.';
        }

        include "views/produk/edit.php";
    }

    public function hapus()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            header('Allow: POST');
            $this->index('Permintaan hapus tidak valid.');
            return;
        }

        $id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT);
        if ($id === false || $id === null || $id < 1) {
            http_response_code(400);
            $this->index('ID produk tidak valid.');
            return;
        }

        if ($this->model->hapusProduk($id)) {
            header('Location: index.php?status=hapus');
            exit;
        }

        $this->index('Produk tidak ditemukan atau gagal dihapus.');
    }

    private function ambilDataForm()
    {
        return [
            'nama_produk' => trim($_POST['nama_produk'] ?? ''),
            'harga' => trim($_POST['harga'] ?? ''),
            'stok' => trim($_POST['stok'] ?? ''),
        ];
    }

    private function validasiForm($form)
    {
        if ($form['nama_produk'] === '') {
            return 'Nama produk wajib diisi.';
        }

        if (! is_numeric($form['harga']) || (float) $form['harga'] < 0) {
            return 'Harga harus berupa angka nol atau lebih.';
        }

        if (
            filter_var($form['stok'], FILTER_VALIDATE_INT) === false
            || (int) $form['stok'] < 0
        ) {
            return 'Stok harus berupa bilangan bulat nol atau lebih.';
        }

        return '';
    }
}