<?php

session_start();
$logIn = "False";
if (isset($_SESSION['service_provider']) && isset($_SESSION['email'])) {
    if ($_SESSION['service_provider'] == "yes") {
        $table_name = "service_provider";
    } else {
        $table_name = "users";
    }
    include "../config.php";
    $sql_query = "SELECT * FROM $table_name WHERE email='" . $_SESSION['email'] . "'";
    $result = mysqli_query($mysqli, $sql_query);
    $result_arr = mysqli_fetch_array($result);

    $sql_query = "SELECT service_provider_email FROM favourite WHERE user_email='" . $_SESSION['email'] . "'";
    $result = mysqli_query($mysqli, $sql_query);
    //$result_arr = mysqli_fetch_array($result);

    $resultset = array();
    // Associative array
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $resultset[] = $row['service_provider_email'];
        }
    }
    //print_r ($resultset);
    $query = "SELECT * FROM service_provider ";
    /*******change array to string *******/
    $email_string = implode("','", $resultset);
    $email_string = "'" . $email_string . "'";
    //add this to the query to prevent duplicated data
    $query .= "WHERE email IN ($email_string)";
    //echo "query is ".$query;
    $logIn = "True";

}

?>

<html lang="ar">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="../img/lOGO-1.png" type="image/png">
    <title>البحث - خلصانة</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Khalsana Company Website Template" name="keywords">
    <meta content="Khalsana Company Website Template" name="description">

    <!-- Sweet alert -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- run the css file in the .php file -->
    <style>
        <?php include '../Search_result/sea_result.css';?>
        <?php include '../css/style_customize.css';?>
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
        <!-- Portfolio Start -->
        <div class="portfolio">
            <div class="container">
                <div class="section-header">
                    <h2 style="font-size: 40px;">قائمة التفضيل </h2>
                    <div id="filter"></div>
                </div>

                <div class="row" id = "big_page">
                <?php ?>


<!--</div>-->

<?php

$result = mysqli_query($mysqli, $query);
//echo "$query";
$resultset_show = array();
// Associative array
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $resultset_show[] = $row;
    }
}
/* check if there is data in DB or not */
if (isset($resultset_show) && !empty($resultset_show)) {
    foreach ($resultset_show as $arr => $arr_ind_val) {
        if ($logIn == "True") {
            echo "
                                <div class='portfolio-item' id ='small_elem' >
                                    <div class='portfolio-wrap'>
                                        <figure>
                                            <img src='../SignUp/uploads/" . $arr_ind_val['image'] . "' alt='Portfolio Image'>
                                            <a class='portfolio-title' href='../profile/profile_favourite.php?acc=" . $arr_ind_val['email'] . "'>
                                            <b> الاسم : </b>    " . $arr_ind_val['name'] . " <br>  <b> المهنة : </b> " . $arr_ind_val['profession'] . "
                                              <br>  <b> المحافظة: </b> " . $arr_ind_val['city'] . "  <br>  <b> المنطقة : </b> " . $arr_ind_val['district'] . "
                                            </a>
                                        </figure>
                                    </div>
                                </div>";
        } else {
            echo "
                                <div class='portfolio-item' id ='small_elem'>
                                    <div class='portfolio-wrap'>
                                        <figure>
                                            <img src='../SignUp/uploads/" . $arr_ind_val['image'] . "' alt='Portfolio Image'>
                                            <a class='portfolio-title'  onclick='alertfunc()'>
                                              <b> الاسم : </b>     " . $arr_ind_val['name'] . " <br>  <b> المهنة : </b> " . $arr_ind_val['profession'] . "
                                              <br> <b> المحافظة : </b> " . $arr_ind_val['city'] . "  <br>  <b> المنطقة : </b> " . $arr_ind_val['district'] . "
                                            </a>
                                        </figure>
                                    </div>
                                </div>";
        }
    }
    // Free result set
    mysqli_free_result($result);
    
     
                    
} else {
    echo "
                            <div class='no_result_container'>
                                <div class='no_result'>
                                        <span style='font-size:20px;'>قائمة التفضيل فارغة</span><br><br>
                                        <div class='div_back'>
                                        <a class='btn' href='../home/home.php'>الرجوع للرئيسية</a><br>
                                        </div>
                                </div>
                            </div>";
}
?>
                </div>
            </div>
        </div>
        
        <!-- Portfolio End -->
 
       


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
                            <a href="../service providers privacy/service providers privacy.php">اتفاقية الخصوصية لمقدمي
                                الخدمات</a>
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