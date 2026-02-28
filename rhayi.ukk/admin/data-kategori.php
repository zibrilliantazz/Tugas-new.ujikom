<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_rhayi");

$query = mysqli_query($koneksi,"SELECT * FROM tb_kategori");
$no = 1;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kategori</title>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">

    <style>
body{
    background:#eee;
    font-family: 'Baloo 2', Arial, sans-serif;
}

/* WRAPPER */
.wrapper{
    width:600px;
    margin:40px auto;
    border:3px solid #444;
    background:#ddd;
    padding:20px 30px;
    border-radius:10px;
}

/* HEADER */
.top{
    border-bottom:3px solid #444;
    padding:10px;
    margin-bottom:20px;
    text-align:center;
    font-weight:bold;
    font-size:18px;
}

/* TABLE */
table{
    width:100%;
    border-collapse:collapse;
    background:#eee;
}

th, td{
    border:2px solid #444;
    padding:8px;
    text-align:center;
    font-size:14px;
}

th{
    background:#ddd;
}

tr:hover{
    background:#dcdcdc;
}

/* BUTTON AKSI */
td button{
    padding:4px 12px;
    border:2px solid #333;
    border-radius:6px;
    background:#eee;
    cursor:pointer;
    margin:2px;
    font-weight:bold;
}

td button:hover{
    background:#ccc;
}

/* FOOTER */
.kembali{
    text-align:center;
    padding-top:15px;
}

.kembali button{
    padding:6px 15px;
    border:2px solid #333;
    border-radius:6px;
    background:#eee;
    cursor:pointer;
    font-weight:bold;
}

.kembali button:hover{
    background:#ccc;
}

a{
    text-decoration:none;
}
    </style>
</head>

<body>

<div class="wrapper">
    <div class="top">DATA KATEGORI</div>

    <table>
        <tr>
            <th>No</th>
            <th>Id</th>
            <th>Keterangan Kategori</th>
            <th>Aksi</th>
        </tr>

        <?php while ($data = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['id_kategori'] ?></td>
            <td><?= $data['ket_kategori'] ?></td>
            <td>
                <a href="edit-kategori.php?id=<?= $data['id_kategori'] ?>">
                    <button>EDIT</button>
                </a>
                <a href="proses-hapus-kategori.php?id=<?= $data['id_kategori'] ?>" onclick="return confirm('hapus?')">
                    <button>HAPUS</button>
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <div class="kembali">
        <a href="dashboard-admin.php">
            <button>KEMBALI</button>
        </a>
    </div>
</div>

</body>
</html>
