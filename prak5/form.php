<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Mahasiswa</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 32px 16px;
            background: #f1f5f9;
            color: #1e293b;
            font-family: Arial, sans-serif;
        }

        main {
            width: min(100%, 480px);
            margin: 0 auto;
            padding: 28px;
            background: #ffffff;
            border: 1px solid #dbe3ec;
            border-radius: 8px;
        }

        h1 {
            margin: 0 0 24px;
            font-size: 24px;
        }

        .field {
            margin-bottom: 16px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            font-weight: 600;
        }

        input {
            width: 100%;
            min-height: 42px;
            padding: 9px 11px;
            border: 1px solid #cbd5e1;
            border-radius: 4px;
            font: inherit;
        }

        input:focus {
            border-color: #2563eb;
            outline: 2px solid #bfdbfe;
        }

        button {
            width: 100%;
            min-height: 44px;
            border: 0;
            border-radius: 4px;
            background: #2563eb;
            color: #ffffff;
            font: inherit;
            font-weight: 600;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }
    </style>
</head>
<body>
    <main>
        <h1>Form Data Mahasiswa</h1>
        <form action="simpan.php" method="post">
            <div class="field">
                <label for="nim">NIM</label>
                <input id="nim" type="text" name="nim" required>
            </div>
            <div class="field">
                <label for="nama">Nama</label>
                <input id="nama" type="text" name="nama" required>
            </div>
            <div class="field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" required>
            </div>
            <div class="field">
                <label for="prodi">Prodi</label>
                <input id="prodi" type="text" name="prodi" required>
            </div>
            <div class="field">
                <label for="angkatan">Angkatan</label>
                <input id="angkatan" type="text" name="angkatan" required>
            </div>
            <div class="field">
                <label for="ipk">IPK</label>
                <input id="ipk" type="text" name="ipk" required>
            </div>
            <button type="submit">Simpan</button>
        </form>
    </main>
</body>
</html>
