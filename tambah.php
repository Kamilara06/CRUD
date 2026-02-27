<?php

require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    
    $sql = "INSERT INTO mahasiswa (npm, nama, jurusan) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$nim, $nama, $jurusan])) {
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #fdf6f8; /* Background senada dengan index */
            color: #4a4a4a;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container Card */
        .card {
            background-color: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            color: #d48198;
            font-weight: 300;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.5rem;
        }

        /* Styling Form */
        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #888;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 25px;
            border: 1px solid #f2f2f2;
            border-radius: 10px;
            box-sizing: border-box; /* Agar padding tidak merusak lebar */
            font-size: 15px;
            transition: all 0.3s ease;
            background-color: #fafafa;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #d48198;
            background-color: #fff;
            box-shadow: 0 0 8px rgba(212, 129, 152, 0.1);
        }

        /* Tombol Simpan */
        button {
            width: 100%;
            background-color: #d48198;
            color: white;
            padding: 14px;
            border: none;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(212, 129, 152, 0.2);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        button:hover {
            background-color: #bc7084;
            transform: translateY(-2px);
        }

        /* Link Batal */
        .btn-cancel {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #e5a1b3;
            font-size: 14px;
            transition: color 0.3s;
        }

        .btn-cancel:hover {
            color: #d48198;
        }
    </style>
</head>

<body>
    <div class="card">
        <h2>Tambah Data</h2>
        <form method="POST" action="">
            <label>NPM</label>
            <input type="text" name="npm" placeholder="Masukkan NPM..." required>
            
            <label>Nama Lengkap</label>
            <input type="text" name="nama" placeholder="Masukkan nama mahasiswa..." required>
            
            <label>Jurusan</label>
            <input type="text" name="jurusan" placeholder="Masukkan jurusan..." required>
            
            <button type="submit">Simpan Data</button>
            <a href="index.php" class="btn-cancel">Batal & Kembali</a>
        </form>
    </div>
</body>

</html>