<?php

    session_start();
    require '../functions.php';

    if(!isset($_SESSION["login"])) {
        header("Location: index.php");
        exit;
    }

    if(isset($_POST["submit"])) {
        
        if(tambahProduk($_POST) > 0) {
            echo "
                <script>
                    alert('Data Berhasil Ditambahkan!');
                    document.location.href = 'barang.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data Gagal Ditambahkan!');
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
    <title>Tambah Data Produk</title>
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
        .addProduk-form {
            width: 400px;
            margin: 0 auto;
            padding: 30px 0;		
        }
        .addProduk-form form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #fff;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .addProduk-form h2 {
            color: #333;
            font-weight: bold;
            margin-top: 0;
        }
        .addProduk-form hr {
            margin: 0 -30px 20px;
        }
        .addProduk-form .form-group {
            margin-bottom: 20px;
        }
        .addProduk-form label {
            font-weight: normal;
            font-size: 15px;
        }
        .addProduk-form .form-control {
            min-height: 38px;
            box-shadow: none !important;
        }	
        .addProduk-form .input-group-addon {
            max-width: 42px;
            text-align: center;
        }	
        .addProduk-form .btn, .addProduk-form .btn:active {        
            font-size: 16px;
            font-weight: bold;
            background: #0C56D0 !important;
            border: none;
            min-width: 140px;
        }
        .addProduk-form .btn:hover, .addProduk-form .btn:focus {
            background: #1257C9 !important;
        }
        .addProduk-form a {
            color: #fff;	
            text-decoration: underline;
        }
        .addProduk-form a:hover {
            text-decoration: none;
        }
        .addProduk-form form a {
            color: #19aa8d;
            text-decoration: none;
        }	
        .addProduk-form form a:hover {
            text-decoration: underline;
        }
        .addProduk-form .fa {
            font-size: 21px;
        }
        .addProduk-form .fa-paper-plane {
            font-size: 18px;
        }
        .addProduk-form .fa-check {
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
            <h1><a class="navbar-brand mb-0 h1 px-5" style="font-size: 30px" href="produk.php"><b>Kembali</b></a></h1>
            <button class="btn me-5"><a href="../logout.php" class="btn-logout" style="color: #333; font-size: 16px; text-decoration:none; border: 1px solid red; padding: 10px 15px; border-radius: 8px;">Logout</a></button>
        </div>
    </nav>

    <div class="container addProduk-form">
        <form action="" method="POST" enctype="multipart/form-data">
            <h2>Tambah Data Produk</h2>
            <p>Silahkan isi form ini untuk menambah data!</p>
            <hr>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" name="nama_produk" placeholder="Masukkan Nama Produk" required="required">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah">Masukkan Jumlah Produk: </label>
                <div class="input-group">
                    <input type="number" class="form-control" name="jml_stok" required="required" min="1" id="jumlah">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="number" class="form-control" name="harga" placeholder="Masukkan Harga (misal: 120000)" required="required">
                </div>
            </div>
            <div class="form-group">
                <label for="gambar_produk">Masukkan Gambar: </label> 
                <div class="input-group">
                    <input type="file" class="form-control" name="gambar_produk" required="required" id="gambar">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg" name="submit">Tambah</button>
            </div>
        </form>
    </div>
</body>
</html>