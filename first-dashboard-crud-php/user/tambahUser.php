<?php

    session_start();

    if(!isset($_SESSION["login"])) {
        header("Location: index.php");
        exit;
    }

    require '../functions.php';

    if(isset($_POST["submit"])) {
        if(tambahPengguna($_POST) > 0) {
            echo "
                <script>
                    alert('Data Berhasil Ditambahkan!');
                    document.location.href = 'user.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data Gagal Ditambahkan!');
                    document.location.href = 'user.php';
                </script>
            ";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        a.btn-logout:hover {
            color: #fff !important;
            background-color: #DC3545;
        }
        .form-control {
            font-size: 15px;
        }
        .form-control, .form-control:focus, .input-group-text {
            border-color: #e1e1e1;
        }
        .form-control, .btn {        
            border-radius: 3px;
        }
        .addUser-form {
            width: 400px;
            margin: 0 auto;
            padding: 30px 0;		
        }
        .addUser-form form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #fff;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .addUser-form h2 {
            color: #333;
            font-weight: bold;
            margin-top: 0;
        }
        .addUser-form hr {
            margin: 0 -30px 20px;
        }
        .addUser-form .form-group {
            margin-bottom: 20px;
        }
        .addUser-form label {
            font-weight: normal;
            font-size: 15px;
        }
        .addUser-form .form-control {
            min-height: 38px;
            box-shadow: none !important;
        }	
        .addUser-form .input-group-addon {
            max-width: 42px;
            text-align: center;
        }	
        .addUser-form .btn, .addUser-form .btn:active {        
            font-size: 16px;
            font-weight: bold;
            background: #0C56D0 !important;
            border: none;
            min-width: 140px;
        }
        .addUser-form .btn:hover, .addUser-form .btn:focus {
            background: #1257C9 !important;
        }
        .addUser-form a {
            color: #fff;	
            text-decoration: underline;
        }
        .addUser-form a:hover {
            text-decoration: none;
        }
        .addUser-form form a {
            color: #19aa8d;
            text-decoration: none;
        }	
        .addUser-form form a:hover {
            text-decoration: underline;
        }
        .addUser-form .fa {
            font-size: 21px;
        }
        .addUser-form .fa-paper-plane {
            font-size: 18px;
        }
        .addUser-form .fa-check {
            color: #fff;
            left: 17px;
            top: 18px;
            font-size: 7px;
            position: absolute;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <h1><a class="navbar-brand mb-0 h1 px-5" style="font-size: 30px" href="user.php"><b>Kembali</b></a></h1>
            <button class="btn me-5"><a href="../logout.php" class="btn-logout" style="color: #333; font-size: 16px; text-decoration:none; border: 1px solid red; padding: 10px 15px; border-radius: 8px;">Logout</a></button>
        </div>
    </nav>

    <div class="container addUser-form">
        <form action="" method="POST">
            <h2>Tambah Data User</h2>
            <p>Silahkan isi form ini untuk menambah data!</p>
            <hr>
            <?php if(isset($error)): ?>
                <p style="color: red; font-style: italic">Password salah</p>
            <?php endif; ?>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="email" class="form-control" name="email" placeholder="Masukkan Email" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" name="telp" placeholder="Masukkan No Telp" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="password" class="form-control" name="password2" placeholder="Konfirmasi Password" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" name="peran" placeholder="Masukkan Peran" required="required">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg" name="submit">Tambah</button>
            </div>
        </form>
    </div>
</body>
</html>