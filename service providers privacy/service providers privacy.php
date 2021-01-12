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
    <title>Service providers- 5alsana </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Khalsana Company Website Template" name="keywords">
    <meta content="Khalsana Company Website Template" name="description">

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
        <?php include '../css/style_customize.css'; ?><?php include 'service providers.css'; ?>
    </style>
    <!-- run the css file in the .php file -->
    <link href="service providers.css" rel="stylesheet">

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
        <!--Start-->
        <div class="container_form">
                <div class="contact_image">
                    <img src="../img/agreement.png">
                </div>
                <div class="contact-form">

                    <h2 class="privacy_h2" style="font-size:25px;"><b>اتفاقية الخصوصية لمقدمى خدمة خلصانة</b></h2>

                    <ul dir="rtl" class="privacy_ul">
                        <li> موقع خلصانة ما هو الا حلقة وصل بينك وبين العميل اللي محتاج خدمتك, فى حالة وجود شكوى اتجاه عميل يمكنك التواصل معنا وستم اتخاذ الاجراء اللازم
                        <li> يجب عليك الحرص على تقديم الخدمة على أكمل وجه حتى تكسب سمعة طيبة لدى عملاءنا 
                        <li> اذا طلبت عرض خدمتك والتوريج اليها لدينا فسيتم عرض البيانات المسجلة ليدنا فقط او المتفق عليها
                        <li> احرص على تقديم الخدمة بمقابل مادي مناسب حتى يتم اختيارك وتسهيل المقارنة مع فنى اخر
                        <li> احرص على سرد بيان مفصل للعميل بمتطلبات الخدمة واستخدام قطع غيار مناسبة لمقدرة العميل المادية
                    </ul>
                </div>
        </div>>
        <!--End-->



        <!-- Footer Start -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="footer-contact">
                            <h2>سوشيال ميديا</h2>
                            <p>5lsana2021@gmail.com  <i class="fa fa-envelope"></i></p>
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
