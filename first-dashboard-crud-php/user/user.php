<?php

    session_start();
    if(!isset($_SESSION["login"])) {
        header("Location: index.php");
        exit;
    }

    require '../functions.php';

    $pengguna = query("SELECT * FROM user");

    if(isset($_POST["cari"])) {
        $pengguna = cariPengguna($_POST["keyword"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        a.btn-logout:hover {
            color: #fff !important;
            background-color: #DC3545;
        }
        tr th {
            background-color: #6C79E1 !important;
            color: white;
            font-size: 1.1em;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <h1><a class="navbar-brand mb-0 h1 px-5" style="font-size: 30px" href="../index.php"><b>Kembali ke Dashboard</b></a></h1>
            <button class="btn me-5"><a href="../logout.php" class="btn-logout" style="color: #333; font-size: 16px; text-decoration:none; border: 1px solid red; padding: 10px 15px; border-radius: 8px;">Logout</a></button>
        </div>
    </nav>
    <br>
    <h1 class="text-center" style="color: #21313C;">Daftar Admin</h1>
    <br><br>
    <!--Data-->
    <div class="container">
    <div class="d-flex">
        <button class="btn me-5"><a href="tambahUser.php" class="btn-add" style="color: #fff; font-size: 1.1em; text-decoration:none; background-color: #56A656; padding: 15px 18px; border-radius: 8px;"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;&nbsp;Tambahkan Data Baru</a></button>
        <form action="" method="POST">
            <div class="input-group">
                <input type="search" name="keyword" class="form-control rounded" placeholder="Cari Pengguna" aria-label="Search" aria-describedby="search-addon" autocomplete="off"/>
                <button type="submit" name="cari" class="btn btn-outline-primary">Cari</button>
            </div>
        </form>
    </div>
    <br>
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No Telp</th>
            <th>Peran</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($pengguna as $row): ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row["nama"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["telp"]; ?></td>
            <td><?php echo $row["peran"]; ?></td>
            <td>
                <a href="ubahUser.php?id=<?php echo $row["kode_user"]; ?>"><button type="button" class="btn btn-warning">Edit</button></a> &nbsp; 
                <a href="hapusUser.php?id=<?php echo $row["kode_user"]; ?>" onclick="return confirm('Apakah yakin ingin menghapus data?');"><button type="button" class="btn btn-danger">Hapus</button></a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    </div>
</body>
</html>