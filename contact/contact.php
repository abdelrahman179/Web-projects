<?php

session_start();
$logIn = "False";
if (isset($_SESSION['service_provider']) && isset($_SESSION['email'])) {
    //echo "service_provider = '".$_SESSION['service_provider']."'<br>";
    //echo "user_email = '".$_SESSION['email']."'<br>";
    if ($_SESSION['service_provider'] == "yes") {
        $table_name = "service_provider";
    } else {
        $table_name = "users";
    }
    include("../config.php");
    $sql_query = "SELECT * FROM $table_name WHERE email='" . $_SESSION['email'] . "'";
    $result = mysqli_query($mysqli, $sql_query);
    $result_arr = mysqli_fetch_array($result);
    //echo "your name is ".$result_arr['name'];
    $logIn = "True";
}

// check for errors
$errors_arr = array();
// check if errors occure from redirect process
if (isset($_GET['error_fields'])) {   // convert errors to an array
    $errors_arr = explode(",", $_GET['error_fields']);
}
?>

<html lang="ar">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="../img/lOGO-1.png" type="image/png">
    <title>تواصل معنا - خلصانة </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Khalsana Company Website Template" name="keywords">
    <meta content="Khalsana Company Website Template" name="description">

    <!-- Sweet alert -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- run the css file in the .php file -->
    <style>
        <?php include 'cont_style.css'; ?><?php include '../css/style_customize.css'; ?>
    </style>

</head>

<body>
    <div class="wrapper">
        <!-- Header Start -->
        <div class="header home">
            <div class="container-fluid">
                <div class="header-top row align-items-center">
                    <div class="col-lg-3">
                        <div class="brand">
                            <a href="../home/home.php">
                                <img src="../img/lOGO-1.png" alt="Logo" style="width:100%; height:100px;">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="topbar">
                            <div class="topbar-col">
                                <a href="mailto:info@example.com"><i class="fa fa-envelope"></i>5lsana2021@gmail.com</a>
                            </div>
                            <div class="topbar-col">
                                <div class="topbar-social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="navbar">
                            <?php
                            if ($logIn == "True") {
                                echo "<a href='../profile/profile.php' class='btn'>" . $result_arr['name'] . "</a>";
                                echo "<a href='../session_distroy.php' class='btn'>الخروج </a>";
                            } else {
                                echo "<a href='../SignUp/SignUp.php' class='btn'>انضم الآن</a>";
                                echo "<a href='../SignIn/SignIn.php' class='btn'>الدخول</a>";
                            }
                            ?>
                            <a href="../contact/contact.php" class="btn"> تواصل معنا </a>
                            <a href="../about/about.php" class="btn">من نحن</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="section-header">
                        <h2>نحن سعداء لتلقي استفساراتكم واقتراحاتكم</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        <!-- Contact Start -->
            <div class="container_form">
                <div class="contact_image">
                    <img src='../img/contactus.png'>
                </div>
                <div class="contact-form">
                    <form name='form-signup' method="post" action="contactus_process.php">
                        <div class="form-group">
                            <input type="text" class="form-control" name="fullname" placeholder="الاسم بالكامل" required="required" />
                            <?php
                            if (in_array("fullname", $errors_arr)) {
                                /* -------------- Jan 7th ------------- */
                                echo "<script> swal('*ادخل اسمك'); </script>
                                      <span class='error'> *ادخل اسمك </span>";
                                //exit();
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <input type="text" name="phonenum" class="form-control" placeholder="رقم الموبايل" required="required" />
                            <?php
                            if (in_array("phonenum", $errors_arr)) {
                                /* -------------- Jan 7th ------------- */
                                echo "<script> swal('*ادخل رقم موبايل صحيح'); </script>
                                      <span class='error'> *ادخل رقم موبايل صحيح </span>";
                                //exit();
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="example@domain.com" required="required" />
                            <?php
                            if (in_array("email", $errors_arr)) {
                                /* -------------- Jan 7th ------------- */
                                echo "<script> swal('*ادخل بريد الكتروني صحيح'); </script>
                                      <span class='error'> *ادخل بريد الكتروني صحيح </span>";
                                //exit();
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="6" placeholder="الرسالة" required="required"></textarea>
                            <?php
                            if (in_array("message", $errors_arr)) {
                                /* -------------- Jan 7th ------------- */
                                echo "<script> swal('*ادخل رسالتك'); </script>
                                      <span class='error'> *ادخل رسالتك </span>";
                                //exit();
                            }
                            ?>
                        </div>
                        <div><button class="btn" type="submit" name="send">ارسال</button></div>
                    </form>
                </div>
            </div>
        <!-- Contact End -->


        <!-- Footer Start -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="footer-contact">
                            <h2>سوشيال ميديا</h2>
                            <p>5lsana2021@gmail.com <i class="fa fa-envelope"></i></p>
                            <div class="footer-social">
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="footer-link">
                            <h2>تحتاج للمساعدة؟</h2>
                            <a href="../contact/contact.php">اتصل بنا</a>
                            <a href="../conditions of use/conditions of use.php">شروط الاستخدام</a>
                            <a href="../privacy/privacy.php">اتفاقية الخصوصية</a>
                            <a href="../service providers privacy/service providers privacy.php">اتفاقية الخصوصية لمقدمي الخدمات</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="footer-link">
                            <h2> اتعرف علينا</h2>
                            <a href="../about/about.php">من نحن</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="footer-form">
                            <div class="brand">
                                <a href="../home/home.php">
                                    <img src="../img/lOGO-1.png" alt="Logo" style="width:700px;height:100px;">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container copyright">
                <div class="row">
                    <div class="col-md-6">
                        <p>&copy;.All Right Reserved</p>
                    </div>
                    <div class="col-md-6">
                        <p> Designed By "The iTi SDF A-Team" <br>
                            AbdElrahman I.Zaki - Ahmed Zaytoun <br>
                            Marina Adel - Nesreen
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/isotope/isotope.pkgd.min.js"></script>
    <script src="../lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/mainn.js"></script>
</body>

</html>