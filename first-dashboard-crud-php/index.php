<?php
    session_start();
    require 'functions.php';

    //cek cookie
    if(isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];

        $result = mysqli_query($conn, "SELECT email FROM user WHERE id = $id");
        $row = mysqli_fetch_assoc($result);

        if($key === hash('sha256', $row['email'])) {
            $_SESSION['login'] = true;
        }

    }

    //Bila pengguna udah login
    if(isset($_SESSION["login"])) {
        header("Location: dashboard.php");
        exit;
    }

    if(isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

        if(mysqli_num_rows($result) === 1) {
            //cek password
            $row = mysqli_fetch_assoc($result);
            
            if(password_verify($password, $row["password"])) {
                //set session
                //agar bisa dicek di setiap halaman bahwa pengguna sudah login
                $_SESSION["login"] = true;

                //cek remember me
                if(isset($_POST['remember'])) {
                    //set 2 cookie
                    setcookie('id', $row['id'], time()+60);
                    setcookie('key', hash('sha256', $row['email']), time()+60); //mengacak key
                }

                header("Location: dashboard.php");
                exit;
            }

        }
        $error = true;

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #fff;
	background: #EEEEEE;
	font-family: 'Roboto', sans-serif;
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
.signup-form {
	width: 400px;
	margin: 0 auto;
	padding: 30px 0;		
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #fff;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form h2 {
	color: #333;
	font-weight: bold;
	margin-top: 0;
}
.signup-form hr {
	margin: 0 -30px 20px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form label {
	font-weight: normal;
	font-size: 15px;
}
.signup-form .form-control {
	min-height: 38px;
	box-shadow: none !important;
}	
.signup-form .input-group-addon {
	max-width: 42px;
	text-align: center;
}	
.signup-form .btn, .signup-form .btn:active {        
	font-size: 16px;
	font-weight: bold;
	background: #0C56D0 !important;
	border: none;
	min-width: 140px;
}
.signup-form .btn:hover, .signup-form .btn:focus {
	background: #1257C9 !important;
}
.signup-form a {
	color: #fff;	
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #19aa8d;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}
.signup-form .fa {
	font-size: 21px;
}
.signup-form .fa-paper-plane {
	font-size: 18px;
}
.signup-form .fa-check {
	color: #fff;
	left: 17px;
	top: 18px;
	font-size: 7px;
	position: absolute;
}
</style>
</head>
<body>
<div class="signup-form">
    <form action="" method="POST">
		<h2>Login</h2>
		<p>Silahkan isi form ini untuk masuk!</p>
        <?php if(isset($error)): ?>
            <p style="color: red; font-style: italic">Email atau Password salah</p>
        <?php endif; ?>
		<hr>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-user"></span>
					</span>                    
				</div>
				<input type="email" class="form-control" name="email" placeholder="Email" required="required">
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
					</span>                    
				</div>
				<input type="password" class="form-control" name="password" placeholder="Password" required="required">
			</div>
        </div>
        <div class="form-group">
			<label class="form-check-label"><input type="checkbox" name="remember"> Remember Me</label>
		</div>
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg" name="login">Masuk</button>
        </div>
    </form>
	<div class="text-center" style="color: #21313C;">Belum punya akun? <a href="register.php" style="color: #21313C;">Registrasi</a></div>
</div>
</body>
</html>