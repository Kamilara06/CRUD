<?php

require 'connection.php';

$stmt = $pdo->query("SELECT * FROM mahasiswa ORDER BY id DESC");
$mahasiswa = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        /* Menggunakan font yang bersih dan modern */
        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #fdf6f8;
            /* Background pink sangat muda */
            color: #4a4a4a;
            margin: 0;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            color: #d48198;
            /* Dusty Pink */
            font-weight: 300;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 30px;
        }

        /* Styling Link Tambah Data */
        .btn-tambah {
            text-decoration: none;
            background-color: #d48198;
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            font-size: 14px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(212, 129, 152, 0.2);
            margin-bottom: 20px;
            display: inline-block;
        }

        .btn-tambah:hover {
            background-color: #bc7084;
            transform: translateY(-2px);
        }

        /* Styling Tabel yang Elegan */
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 900px;
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        th {
            background-color: #fceef2;
            color: #d48198;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 1px;
            padding: 20px 15px;
            text-align: left;
            border-bottom: 2px solid #f9e2e9;
        }

        td {
            padding: 18px 15px;
            border-bottom: 1px solid #f2f2 f2;
            font-size: 15px;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover {
            background-color: #fff9fb;
        }

        /* Link Aksi */
        .action-link {
            text-decoration: none;
            color: #d48198;
            font-weight: 600;
            font-size: 14px;
            transition: color 0.2s;
        }

        .action-link:hover {
            color: #7d4f5b;
        }

        .delete {
            color: #e5a1b3;
        }

        .delete:hover {
            color: #ff4d4d;
        }
    </style>
</head>

<body>
    <h2>Daftar Mahasiswa</h2>

    <a href="tambah.php" class="btn-tambah">+ Tambah Data Baru</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th style="text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($mahasiswa as $row): ?>
                <tr>
                    <td style="color: #999;"><?= $no++; ?></td>
                    <td><strong><?= htmlspecialchars($row['npm']); ?></strong></td>
                    <td><?= htmlspecialchars($row['nama']); ?></td>
                    <td><?= htmlspecialchars($row['jurusan']); ?></td>
                    <td align="center">
                        <a href="edit.php?id=<?= $row['id']; ?>" class="action-link">Edit</a>
                        <span style="color: #eee; margin: 0 5px;">|</span>
                        <a href="hapus.php?id=<?= $row['id']; ?>"
                            class="action-link delete"
                            onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>