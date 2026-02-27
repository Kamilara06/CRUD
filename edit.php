<?php

require 'connection.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM mahasiswa WHERE id = ?");
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $sql = "UPDATE mahasiswa SET npm = ?, nama = ?, jurusan = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$npm, $nama, $jurusan, $id])) {
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
    <title>Edit Mahasiswa - Pink Elegance</title>
    <style>
        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #fdf6f8;
            color: #4a4a4a;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

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

        label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #b5b5b5;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 25px;
            border: 1px solid #f2f2f2;
            border-radius: 10px;
            box-sizing: border-box;
            font-size: 15px;
            color: #555;
            transition: all 0.3s ease;
            background-color: #fafafa;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #d48198;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(212, 129, 152, 0.1);
        }

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
            box-shadow: 0 6px 20px rgba(212, 129, 152, 0.3);
        }

        .btn-cancel {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #e5a1b3;
            font-size: 13px;
            transition: color 0.3s;
        }

        .btn-cancel:hover {
            color: #d48198;
            text-decoration: underline;
        }

        /* Badge kecil untuk ID (opsional) */
        .id-badge {
            display: inline-block;
            background: #fceef2;
            color: #d48198;
            padding: 2px 8px;
            border-radius: 5px;
            font-size: 11px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="card">
        <h2>Edit Data</h2>
        <div style="text-align: center;">
            <span class="id-badge">ID Mahasiswa: #<?= htmlspecialchars($data['id']); ?></span>
        </div>

        <form method="POST" action="">
            <label>NIM / NPM</label>
            <input type="text" name="npm" value="<?= htmlspecialchars($data['npm']); ?>" required>
            
            <label>Nama Lengkap</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required>
            
            <label>Jurusan</label>
            <input type="text" name="jurusan" value="<?= htmlspecialchars($data['jurusan']); ?>" required>
            
            <button type="submit">Update Data</button>
            <a href="index.php" class="btn-cancel">Batal dan Kembali</a>
        </form>
    </div>
</body>

</html>