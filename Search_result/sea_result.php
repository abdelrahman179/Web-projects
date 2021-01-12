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
    include "../config.php";
    $sql_query = "SELECT * FROM $table_name WHERE email='" . $_SESSION['email'] . "'";
    $result = mysqli_query($mysqli, $sql_query);
    $result_arr = mysqli_fetch_array($result);
    //echo "your name is ".$result_arr['name'];
    $logIn = "True";
}

// check for errors
$errors_arr = array();
// check if errors occure from redirect process
if (isset($_GET['error_fields'])) { // convert errors to an array
    $errors_arr = explode(",", $_GET['error_fields']);
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
        <?php include '../css/style_customize.css';?>
        <?php include 'sea_result.css';?>

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
                    <h2 style="font-size: 40px;">نتائج البحث </h2>
                    <div id="filter"></div>
                </div>
                <div class="box_b">
                    <form class="box_form" name='search_form' method='post' action='../Search_result/sea_result.php#filter'>
                        <div class="control-group">
                            <select name="Profession" id="Profession" class="form-control" required>
                                <option value=""></option>
                                <option value="سباك">سباك</option>
                                <option value="كهربائي">كهربائي</option>
                                <option value="نجار">نجار</option>
                                <option value="حداد">حداد</option>
                                <option value="مبلط سيراميك">مبلط سيراميك</option>
                                <option value="نقاش">نقاش</option>
                                <option value="صنايعي رخام وجرانيت">صنايعي رخام و جرانيت</option>
                                <option value="صنايعي جبس">صنايعي جبس</option>
                                <option value="صنايعي جيبسون بورد">صنايعي جيبسون بورد</option>
                                <option value="صنايعي زجاج">صنايعي زجاج</option>
                                <option value="صنايعي ألوميتال">صنايعي ألوميتال</option>
                                <option value="فني تكييف">فني تكييف</option>
                                <option value="فني دش">فني دش</option>
                                <option value="فني غسالات">فني غسالات</option>
                                <option value="فني ثلاجات">فني ثلاجات</option>
                                <option value="فني سخانات">فني سخانات</option>
                                <option value="فني فلتر مياه">فني فلتر مياه</option>
                                <option value="فني اليكترونيات">فني اليكترونيات</option>
                                <option value="عامل تنظيف">عامل تنظيف</option>
                                <option value="شيال">شيال</option>
                            </select>
                        </div>
                        <div class="control-group">
                            <select name="City" id="City" class="form-control" onchange="changeCity()" required>
                                <option value=""></option>
                                <option value="القاهرة">القاهرة</option>
                                <option value="الجيزة">الجيزة</option>
                                <option value="بورسعيد">بورسعيد</option>
                                <option value="الاسكندرية">الاسكندرية</option>
                                <option value="الشرقية">الشرقية</option>
                                <option value="المنوفية">المنوفية</option>
                                <option value="الفيوم">الفيوم</option>
                                <option value="القليوبية">القليوبية</option>
                                <option value="الغربية">الغربية</option>
                                <option value="البحيرة">البحيرة</option>
                                <option value="دمياط">دمياط</option>
                                <option value="الاقصر">الاقصر</option>
                                <option value="الغردقة">الغردقة</option>
                                <option value="شرم الشيخ">شرم الشيخ</option>
                                <option value="نوبيع">نوبيع</option>
                                <option value="اسيوط">اسيوط</option>
                                <option value="اسوان">اسوان</option>
                                <option value="بني سويف">بني سويف</option>
                            </select>
                        </div>
                        <div class="control-group">
                            <select name="district" id="district" class="form-control" ondblclick="changeCity()">
                                <option value="">المنطقة</option>
                                <option value=""> </option>

                            </select>
                        </div>
                        <div class="control-group">
                            <input name="ser_pro_name" id="ser_pro_name" class="form-control" type="text" placeholder="ابحث باسم الصنايعي">
                        </div>
                        <div class="control-group">
                            <button class="btnn">بحث</button>
                        </div>
                    </form>
                </div>
<!--************************************************************************-->
                <div class="row" id = "big_page"><!--row portfolio-container-->
                    <?php

$Profession = $_POST['Profession'];
/****set selected profession****/
echo "<script>
                    document.getElementById('Profession').value = '$Profession';
                    </script>";

$city = $_POST['City'];
/****set selected city****/
echo "<script>
                    document.getElementById('City').value = '$city';
                    </script>";

$dist = "";
$s_p_name = "";
if (isset($_POST['district'])) {
    $dist = $_POST['district'];
    /****set selected district****/
    echo "<script>function changfn(){
                            changeCity();
                            document.getElementById('district').value = '$dist';
                        }</script>";
    echo "<BODY onLoad='changfn()'>";
}

if (isset($_POST['ser_pro_name'])) {
    $s_p_name = $_POST['ser_pro_name'];
    /****set selected district****/
    echo "<script>
                        document.getElementById('ser_pro_name').value = '$s_p_name';
                        </script>";
}

$query_count = "SELECT COUNT(*) AS count FROM service_provider WHERE profession = '$Profession' AND city = '$city' ";
$query = "SELECT * FROM service_provider WHERE profession = '$Profession' AND city = '$city' ";
if (!($dist === "")) {
    $query .= " AND district = '$dist'";
    $query_count .= " AND district = '$dist'";
}
if (!($s_p_name === "")) {
    $query .= " AND name LIKE '%$s_p_name%'";
    $query_count .= " AND name LIKE '%$s_p_name%'";
}
/*echo "$query";
exit;*/
/*******************************load more***************************************/
/********get total number of rows of this query*******/
include_once "../config.php";
$result = mysqli_query($mysqli, $query_count);
if (isset($result)) {
    $result_arr = mysqli_fetch_assoc($result);
    $count = $result_arr['count'];
} else {
    $count = 0;
}

/*****************************************************/
/************set number of show at once***************/
$show_SP = 5;
/*****************************************************/
/***set value of stop variable which control load more button***/
if (isset($_POST['stop'])) {
    $stop = $_POST['stop'];
} else {
    $stop = $show_SP;
}

/*****************************************************/

$show_arr = array(); //show array that transports shown data

if (isset($_POST['loadmore'])) { //if press load more
    $stop += $show_SP; //make stop increase by $show_SP
    $email_array = array(); //to save shown emails to prevent duplicated data
    $show_arr = unserialize(base64_decode($_POST["searcharr"])); //receive previous shown data
    /*******************print previous data*****************************/
    foreach ($show_arr as $arr => $arr_ind_val) {
        if ($logIn == "True") {
            echo "
                                    <div class='portfolio-item' id ='small_elem'>
                                        <div class='portfolio-wrap'>
                                            <figure>
                                                <img src='../SignUp/uploads/" . $arr_ind_val['image'] . "' alt='Portfolio Image'>
                                                <a class='portfolio-title' href='../profile/profile_search.php?acc=" . $arr_ind_val['email'] . "'>
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
        $email_array[] = $arr_ind_val['email']; //save email of previous shown data
    }
    /*******change array to string *******/
    $email_string = implode("','", $email_array);
    $email_string = "'" . $email_string . "'";
    //add this to the query to prevent duplicated data
    $query .= " AND email NOT IN ($email_string)";
}

$query .= " ORDER BY RAND()"; //to make data shown random
$query .= " LIMIT $show_SP"; //to show only $show_SP at once

/**********************************************************************/

/* Check Connection */
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
/* Search by specific name, speciality and category */
$result = mysqli_query($mysqli, $query);
$resultset = array();
// Associative array
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $resultset[] = $row;
        $show_arr[] = $row;
    }
}
/* check if there is data in DB or not */
if (isset($resultset) && !empty($resultset)) {
    foreach ($resultset as $arr => $arr_ind_val) {
        if ($logIn == "True") {
            echo "
                                <div class='portfolio-item' id ='small_elem'>
                                    <div class='portfolio-wrap'>
                                        <figure>
                                            <img src='../SignUp/uploads/" . $arr_ind_val['image'] . "' alt='Portfolio Image'>
                                            <a class='portfolio-title' href='../profile/profile_search.php?acc=" . $arr_ind_val['email'] . "'>
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
    ?>
                        <!--**************load more******************-->
                        <div id="gotowhenloadmore"></div> <!-- to reload at this div -->
                        <!--***********************************************-->
                    <?php
} else {
    echo "
                            <div class='no_result_container'>
                                <div class='no_result'>
                                        <span style='font-size:20px;'> لا يوجد نتائج للبحث</span><br><br>
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
        <script>
            function alertfunc() {
                swal("برجاء تسجيل الدخول اولا");
            }
        </script>
        <!-- Portfolio End -->
        <!--**********************load more*****************************************/-->
        <!--************************inputs send when press load more*********/*******-->
        <div class="more" id="more">
            <form class="" action="../Search_result/sea_result.php#gotowhenloadmore" method="post">
                <input type="hidden" name="Profession" value="<?php echo "$Profession"; ?>">
                <input type="hidden" name="City" value="<?php echo "$city"; ?>">
                <input type="hidden" name="district" value="<?php echo "$dist"; ?>">
                <input type="hidden" name="ser_pro_name" value="<?php echo "$s_p_name"; ?>">
                <input type="hidden" name="stop" value="<?php echo "$stop"; ?>">
                <input type="hidden" name="searcharr" value="<?=base64_encode(serialize($show_arr));?>">
                <input type="submit" class="btnn" name="loadmore" value="حمل المزيد">
            </form>
            <?php
/*******make loadmore button disappear when load all***************/
if ($stop >= $count) {
    echo "<script> document.getElementById('more').style.display = 'none'; </script>";
}

/******************************************************************/
?>
        </div>

        <!--**************************End of search**************************-->


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