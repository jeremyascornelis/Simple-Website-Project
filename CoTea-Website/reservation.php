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
    <link rel="stylesheet" href="css/footer.css">
    <script src="https://kit.fontawesome.com/869f3bb512.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        //Jquery email validation
        $(document).ready(function() {
            $('#submit').click(function() {
                var email = $('#email').val();
                if(email == '') {
                    alert("Please enter your email");
                }
                else if(IsEmail(email) == false) {
                    alert("Invalid Email");
                    return false;
                }
            })
        });
        function IsEmail(email) {
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!regex.test(email)) {
                return false;
            }else{
                return true;
            }
        }
    </script>
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
        <div class="contact-form">
            <div class="form-title">Reservation Form</div>
            <form method="post" action="sent-reserv.php">
                <div class="form-item">Email</div>
                <input type="text" name="email" id="email" required>

                <div class="form-item">Full Name</div>
                <input type="text" name="name" required>

                <div class="form-item">Age</div>
                <select name="age">
                <!-- <option value="pilih" required>Pilih</option> -->
                    <?php 
                        for ($i = 16; $i <= 100; $i++) {
                            echo "<option value='{$i}'>{$i}</option>";
                        } 
                    ?>
                </select>
                <div class="form-item">Phone Number</div>
                <input type="tel" name="phone"  required>
                <div class="form-item">Date</div>
                <input type="date" name="date"  required>
                <div class="form-item">Time</div>
                <input type="time" name="time"  required>
                <div class="form-item">Category</div>
                <?php 
                    $types = array('for birthday party', "for office's meeting", 'for family events', 'etc');
                ?>
                <select name = "category">
                <!-- <option value = "pilih" required>Reason of your reservation</option> -->
                    <?php 
                        foreach($types as $type) {
                            echo "<option value='{$type}'>{$type}</option>";
                        }
                    
                    ?>
                </select>

                <div class="form-item">Description</div>
                <textarea name="body"></textarea>

                <input type="submit" value="Submit" id="submit">
            </form>
        </div>
    </div>
    <br>
    <footer>
        <div class="footer-content">
            <div class="bundle-footer">
                <div class="footer-column">
                    <h1>Office</h1>
                    <br>
                    <h3>PT CoTea Sukses</h3>
                    <h4>Jl. Sukses Selalu No. 99</h4>
                    <h4>Semarang, Indonesia</h4>
                    <h4>(024) 654321</h4>
                    <h4>team@coteasukses.com</h4>
                </div>
                <div class="footer-column">
                    <h1>Social</h1>
                    <br>
                    <h4><a href="https://www.instagram.com/jercor_15/" target="_blank">Instagram</a></h4>
                    <h4><a href="https://web.facebook.com/pocky.poem/" target="_blank">Facebook</a></h4>
                    <h4><a href="https://twitter.com/CPoepcorn" target="_blank">Twitter</a></h4>
                    <h4>TikTok</h4>
                </div>
                <div class="footer-column last">
                    <h1>Content</h1>
                    <br>
                    <h4><a href="index.html">Homepage</a></h4>
                    <h4><a href="menu.html">Menu</a></h4>
                    <h4><a href="blog.html">Blogs</a></h4>
                    <h4><a href="reservation.php">RESERVATION</a></h4>
                </div>
            </div>
            <div class="bundle-footer">
                <div class="footer-column">
                    <h1>Products</h1>
                    <br>
                    <h4>Tips</h4>
                    <h4>Dessert</h4>
                    <h4>Coffee</h4>
                    <h4>Tea</h4>
                </div>
                <div class="footer-column">
                    <h1>Our branch</h1>
                    <br>
                    <h4>Jakarta</h4>
                    <h4>Surabaya</h4>
                    <h4>Bandung</h4>
                    <h4>Yogyakarta</h4>
                    <h4>Bali</h4>
                </div>
            </div>
        </div>
        <br><br><br><br>
        <h2>Copyright© 2021 CoTea</h2>
        <br>
        <h2>All rights reserved.</h2>
    </footer>
</body>
</html>