<?php

session_start();
$acc_preview = $_GET['acc'];

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
    $logIn = "True";
}

/* Get the service provider data */
include "../config.php";
$Query = "SELECT * FROM service_provider WHERE email='$acc_preview'";
$result_2 = mysqli_query($mysqli, $Query);
$service_pro = mysqli_fetch_array($result_2);

/* ------------ Jan 7 -------------- */
// >>>>>>>>> get the reviews if exists
include "../config.php";
$QRY_1 = "SELECT * FROM reviews WHERE service_provider_email='$acc_preview'";
$result_4 = mysqli_query($mysqli, $QRY_1);
//$review_result = mysqli_fetch_array($result_4);
include("../config.php");

/************check if its add to favourite before *********/
include "../config.php";
$query_f = "SELECT * FROM favourite 
WHERE user_email='" . $_SESSION['email'] . "' AND service_provider_email= '$acc_preview'";
$result_5 = mysqli_query($mysqli, $query_f);
if($result_5)
{
    $favourite_email_arr = mysqli_fetch_array($result_5);
}

$favourite_exist= "false";
if (isset($favourite_email_arr)) $favourite_exist= "true";
/***********************************************************/
?>

<html lang="ar-EG">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="../img/lOGO-1.png" type="image/png">
    <title> البروفايل - خلصانة </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Khalsana Company Website Template" name="keywords">
    <meta content="Khalsana Company Website Template" name="description">

    <!-- Sweet alert -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
    <?php include 'profile_search.css';
    ?><?php include '../css/style_customize.css';
    ?>
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
        <!-- profile Start -->
        <div class="profile">
            <div class="profile_child_info">
                <div class="info">
                    <div class="user_data">
                        <div class="fixed"><i class="fas fa-file-signature"></i> &nbsp; الاسم </div>
                        <div class="flex"><?php echo $service_pro['name']; ?> </div>
                    </div>
                    <div class="user_data">
                        <div class="fixed"><i class="fas fa-phone-square"></i> &nbsp; رقم الموبايل </div>
                        <div class="flex"> <?php echo $service_pro['phone_num']; ?> </div>
                    </div>
                    <div class="user_data">
                        <div class="fixed"><i class="fas fa-at"></i> &nbsp; البريد الالكتروني </div>
                        <div class="flex"> <?php echo $service_pro['email']; ?></div>
                    </div>
                    <div class='user_data'>
                        <div class='fixed'><i class="fas fa-user-tie"></i> &nbsp; المهنة</div>
                        <div class='flex'> <?php echo $service_pro['profession']; ?></div>
                    </div>
                    <div class='user_data'>
                        <div class='fixed'><i class="fas fa-thumbtack"></i> &nbsp; المدينة</div>
                        <div class='flex'> <?php echo $service_pro['city']; ?></div>
                    </div>
                    <div class='user_data'>
                        <div class='fixed'><i class='fas fa-street-view'></i> &nbsp; المنطقة </div>
                        <div class='flex'> <?php echo $service_pro['district']; ?></div>
                    </div>
                    <div class='user_data'>
                        <div class='fixed'><i class="fas fa-paragraph"></i> &nbsp; نبذة عن الاعمال </div>
                        <div class='flex'> <?php echo $service_pro['story']; ?> </div>
                    </div>
                    <?php
/**************come from favourite div********************/
echo"<div id ='come_from_favourite'></div>";
/* check if there any data in DB or not */
if (mysqli_num_rows($result_4) > 0) {
    echo "<div class='user_data_rev'>
            <div class='fixed_2'> <i class='far fa-comments'></i> &nbsp; تقييم العملاء السابقين </div>";
    while ($review_result = mysqli_fetch_array($result_4)) {
        $reviewer = $review_result['reviewer_name'];
        $review_desc = $review_result['review_desc'];
        echo "<div class='flex_2'>
                <span class'rev_name' style='font-weight: bold;'> " . $reviewer . " <i class='fa fa-comments' aria-hidden='true'></i> &nbsp </span>
                <span class='rev_desc'> " . $review_desc . " </span>
            </div>";
    }
echo"</div>";
// Free result set
    mysqli_free_result($result_4);
} else {
    echo "<div class='user_data_rev'>
                  <div class='fixed_2'> <i class='far fa-comments'></i> &nbsp; تقييم العملاء السابقين </div>
                  <div class='flex_2'> لا يوجد تقييمات سابقة </div>
        </div>";
}
?>
                </div>
            </div>
            <div class='profile_child_img'>
                <div class='profile_image'>
                    <img src='../SignUp/uploads/<?php echo $service_pro['image']; ?>' alt='Portfolio Image'>
                </div>
            </div>
        </div>
        <!-- ****************** Jan 7th ******************* -->
        <div class='div_back' id='sweet_btns'>
            <button class='pro_btn' id='rate_btn' onclick="review()">قيم الفني</button>
            <button class='pro_btn' id='favourite_btn' onclick="add_favourite()">إضافة إلى قائمة التفضيل</button>
            <button class='pro_btn' id='remove_btn' onclick="remove_favourite()">إزالة من قائمة التفضيل</button>
        </div>
        <div class='div_back' id='sweet_btns'>
            <button class='pro_btn' id='return_btn' onclick="go_to_search_list()">الرجوع لقائمة البحث</button>
            <button class='pro_btn' id='home_btn' onclick="go_to_home()">الرجوع للرئيسية</button>
        </div>
        <!--*********************solve bug***********************-->
        <?php
    if ($_SESSION['email'] == $acc_preview) 
      echo "<script>document.getElementById('sweet_btns').style.display = 'none';</script>";
    ?>
        <!--******************check favourite****************-->
        <?php
    if ($favourite_exist === 'true') {
      echo"<script>
      document.getElementById('favourite_btn').style.display = 'none';
      document.getElementById('remove_btn').style.display = 'flex';
      </script>";
    } 
    if ($favourite_exist === 'false') {
      echo"<script>
      document.getElementById('remove_btn').style.display = 'none';
      document.getElementById('favourite_btn').style.display = 'flex';
      </script>";
    } 
    ?>
        <!-- ****************** Jan 7th ******************* -->
        <script type="text/javascript">
        function review() {
            let rev = null;
            var account = "<?php echo $acc_preview; ?>";
            swal({
                    title: "تقييم الفني",
                    text: "اكتب رأيك فى الخدمة",
                    type: "input",
                    textAlign: "right",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    confirmButtonText: 'إرسال',
                    cancelButtonText: "إلغاء",
                    animation: "slide-from-top",
                },
                function(inputValue) {
                    if (inputValue === false) return false;

                    if (inputValue === "") {
                        swal.showInputError("برجاء ادخال تقييمك");
                        return false
                    }
                    swal({
                            title: "شكرا",
                            text: "تم تسجيل تقييمك بنجاح ",
                            type: "success",
                            confirmButtonText: 'حسناً',
                            allowEscapeKey: false,
                            allowOutsideClick: false
                        },
                        function() {
                            rev = inputValue;
                            window.location.href = "review.php?acc=" + account + "&rev=" + rev;
                        });
                });
        }
        /**********favourite***********/
        function add_favourite() {
            swal({
                    title: "تمت الإضافة إلى قائمتك المفضلة",
                    confirmButtonText: 'حسناً',
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    type: "success"
                },
                function() {
                    var account = "<?php echo $acc_preview; ?>";
                    window.location.href = "favourite_add.php?acc=" + account;
                });
        }
        function remove_favourite() {
            swal({
                    title: "تمت الإزالة من قائمتك المفضلة",
                    confirmButtonText: 'حسناً',
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    type: "success"
                },
                function() {
                    var account = "<?php echo $acc_preview; ?>";
                    window.location.href = "favourite_remove.php?acc=" + account;
                });
        }
        function go_to_search_list() {
          window.location.href = 
          "back_to_Search_List.php?Profession=<?php echo $service_pro['profession'];?>&City=<?php echo $service_pro['city'];?>";
        }
        function go_to_home() {
          window.location.href = "../home/home.php";
        }

        function testswal() {

            <?php
         /*if (isset($_SESSION['service_provider']) && isset($_SESSION['email'])) {
           */ if ($_SESSION['service_provider'] == "yes") {
              $table_name = "service_provider";
            } else {
              $table_name = "users";
            }
            //$table_name = "users";
            include("../config.php");
            $sql_query = "SELECT email FROM $table_name WHERE email='" . $_SESSION['email'] . "'";
            $result = mysqli_query($mysqli, $sql_query);
            $favourite_email_arr = mysqli_fetch_array($result);
            
            //ptint_r($favourite_email_arr);
            //exit();
          //}
        ?>
            /* var are = "<?php// echo "$favourite_email_arr"; ?>";
             console.log("are = ", are);*/

            swal({
                title: "test swal",
                type: "success"
            });
        }
        </script>
        <!-- profile End -->

        <!-- Footer Start -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="footer-contact">
                            <h2>سوشيال ميديا</h2>
                            <p>5lsana2021@gmail.com <i class="fa fa-envelope"></i></p>
                            <div class="footer-social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
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
                            <a href="">من نحن</a>
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
                        <p>&copy; .All Right Reserved</p>
                    </div>
                    <div class="col-md-6">
                        <p> Designed By "The iTi SDF A-Team" <br>
                            AbdElrahman I.Zaki - Ahmed Zaytoon <br>
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