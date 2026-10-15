<?php
// biodata.php
function statusKelulusan(float $ipk): string
{
    if ($ipk >= 3.50) return 'Sangat Memuaskan';
    if ($ipk >= 3.00) return 'Memuaskan';
    return 'Perlu Peningkatan';
}

$mahasiswa = [
    'nim' => '4524210020',
    'nama' => 'Bryan Ananda Saputra Hulu',
    'prodi' => 'Teknik Informatika',
    'semester' => 5,
    'ipk' => 3.99
];
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Biodata</title>
    <style>
        body {
            margin: 0;
            padding: 40px 20px;
            color: #333;
            font-family: Arial, sans-serif;
            background: #f2f6fc;
        }

        h1 {
            max-width: 600px;
            margin: 0 auto;
            padding: 24px;
            color: white;
            background: #2f80ed;
            text-align: center;
            font-size: 28px;
        }

        ul {
            max-width: 600px;
            margin: 0 auto;
            padding: 24px 40px;
            list-style: none;
            background: white;
        }

        li {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        p {
            max-width: 600px;
            margin: 0 auto;
            padding: 18px 40px;
            color: #155724;
            background: #d4edda;
            font-weight: 700;
        }
    </style>
</head>

<body>
    <h1>Biodata Mahasiswa</h1>

    <ul>
        <?php foreach ($mahasiswa as $kunci => $nilai): ?>
            <li><?= ucfirst($kunci) ?>: <?= htmlspecialchars((string)$nilai) ?></li>
        <?php endforeach; ?>
    </ul>

    <p>Predikat: <?= statusKelulusan($mahasiswa['ipk']) ?></p>
</body>

</html>
