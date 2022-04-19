<?php

    session_start();
    require '../functions.php';

    if(!isset($_SESSION["login"])) {
        header("Location: index.php");
        exit;
    }

    $id = $_GET["id"];
    $brg = query("SELECT * FROM barang WHERE kode_barang = $id")[0];

    if(isset($_POST["submit"])) {

        // var_dump($_POST);
        // var_dump($_FILES); die;
        
        if(ubahProduk($_POST) > 0) {
            echo "
                <script>
                    alert('Data Berhasil Ditambahkan!');
                    document.location.href = 'barang.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Tidak ada data yang diubah!');
                    document.location.href = 'barang.php';
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
    <title>Ubah Data Produk</title>
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
            <h2>Ubah Data Produk</h2>
            <p>Silahkan isi form ini untuk mengubah data!</p>
            <hr>
            <input type="hidden" name="id" value="<?= $brg["kode_barang"]; ?>">
            <input type="hidden" name="gambarLama" value="<?= $brg["gambar"]; ?>">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" name="nama_produk" required="required" value="<?= $brg["nama"]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah Produk: </label>
                <div class="input-group">
                    <input type="number" class="form-control" name="jumlah" required="required" min="1" id="jumlah" value="<?= $brg["jml_stok"]; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="number" class="form-control" name="harga" required="required" value="<?= $brg["harga"]; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="gambar_produk">Gambar: </label> 
                <img src="./imgBarang/<?= $brg["gambar"];?>" width="80px">
                <div class="input-group" style="margin-top: 15px;">
                    <input type="file" class="form-control" name="gambar_produk" id="gambar">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg" name="submit">Update</button>
            </div>
        </form>
    </div>
</body>
</html>