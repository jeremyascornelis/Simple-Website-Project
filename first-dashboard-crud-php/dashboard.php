<?php
    session_start();
    if(!isset($_SESSION["login"])) {
        header("Location: index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        img {
            width: 80px;
        }
        .card {
            border: 2px solid #B29E7F;
        }
        .card:hover{
            -webkit-box-shadow: -1px 0px 45px 8px rgba(181,177,181,0.67);
            -moz-box-shadow: -1px 0px 45px 8px rgba(181,177,181,0.67);
            box-shadow: -1px 0px 45px 8px rgba(181,177,181,0.67);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <h1><a class="navbar-brand mb-0 h1 px-5" style="font-size: 30px"><b>Dashboard</b></a></h1>
            <button class="btn btn-danger me-5"><a href="logout.php" style="color: #fff; font-size: 16px; text-decoration:none;">Logout</a></button>
        </div>
    </nav>
    <br>
    <h1 class="text-center" style="color: #21313C;">Selamat Datang, Admin!</h1>
    <br><br><br>
    <div class="d-flex container justify-content-around">
        <div class="card ms-3 me-4" style="width: 18rem;">
            <a href="barang/barang.php" style="text-decoration:none;">
                <img src="img/barang.png" class="card-img-top" alt="barang-card">
                <div class="card-body">
                    <h3 class="card-text text-center" style="color: #FE6B3D; font-weight: 600;">Barang</h3>
                </div>
            </a>
        </div>
        <div class="card ms-3 me-4" style="width: 18rem;">
            <a href="user/user.php" style="text-decoration:none;">
                <img src="img/pelanggan.png" class="card-img-top" alt="pelanggan-card">
                <div class="card-body">
                    <h3 class="card-text text-center" style="color: #FE6B3D; font-weight: 600;">User</h3>
                </div>
            </a>
        </div>
    </div>
</body>
</html>