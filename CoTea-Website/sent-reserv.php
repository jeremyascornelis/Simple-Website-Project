<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoTea</title>
    <link rel="shortcut icon" href="assets/images/coTea-icon.png">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/reservation.css">
    <link rel="stylesheet" href="css/sent-reserv.css">
    <script src="https://kit.fontawesome.com/869f3bb512.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fa fa-bars"></i>
        </label>
        <img src="assets/images/iconLogo.png"class="logo">
        <ul>
            <li><a href="index.html">Home</a></li>
            <!-- <li><a href="about.html">About</a></li> -->
            <li><a href="menu.html">Menu</a></li>
            <li><a href="order.html">Order</a></li>
            <li><a href="blog.html">Blogs</a></li>
            <li><a href="reservation.php" class="res-link">RESERVATION</a></li>
        </ul>
    </nav>

    <div class="main">
        <div class="thanks-message">Thankyou for your reservation!</div>
        <div class="display-contact">
            <div class="form-title"><h2>We will contact you soon!</h2></div>

            <div class="form-item">■ Email</div>
            <div class="text"><?php echo $_POST['email']; ?></div>

            <div class="form-item">■ Full Name</div>
            <div class="text"><?php echo $_POST['name']; ?></div>

            <div class="form-item">■ Your Age</div>
            <div class="text"><?php echo $_POST['age']; ?></div>

            <div class="form-item">■ Your Phone Number</div>
            <div class="text"><?php echo $_POST['phone']; ?></div>

            <div class="form-item">■ Date</div>
            <div class="text"><?php echo $_POST['date']; ?></div>

            <div class="form-item">■ Time</div>
            <div class="text"><?php echo $_POST['time']; ?></div>

            <div class="form-item">■ Category</div>
            <div class="text"><?php echo $_POST['category']; ?></div>

            <div class="form-item">■ Description</div>
            <div class="text"><?php echo $_POST['body']; ?></div>
        </div>
    </div>
</body>
</html>