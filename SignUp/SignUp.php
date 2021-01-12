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
  <title> انضم الان - خلصانة </title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Khalsana Company Website Template" name="keywords">
  <meta content="Khalsana Company Website Template" name="description">

  <!-- Sweet alert -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

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
    <?php include 'SignUp.css'; ?><?php include '../css/style_customize.css'; ?>
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
    <!-- Page Header End -->
    <!-- Sign Up Start -->
    <div class="SU">
      <div class="container">
        <div class="section-header">
          <h2 style="font-size:40px;">انضم إلينا الآن</h2>
        </div>
        <div class="SignUp-form">
          <form name='form-signup' method="post" action="SignUp_process.php" enctype="multipart/form-data">
            <div class="form-group">
              <div class="col-25">
                <span class="span_style"><span class="red_star">*</span>الاسم</span>
              </div>
              <div class="col-75">
                <input type="text" class="form-control" name="fullname" placeholder="الاسم بالكامل" required="required" />
              </div>
              <?php
              if (in_array("fullname", $errors_arr)) {
                /* -------------- Jan 7th ------------- */
                echo "<script> swal('*ادخل اسم صحيح');</script>
                        <span class='error'> *ادخل اسم صحيح </span>";
                //exit();
              }
              ?>
            </div>
            <div class="form-group">
              <div class="col-25">
                <span class="span_style"><span class="red_star">*</span>رقم الموبايل</span>
              </div>
              <div class="col-75">
                <input type="text" name="phonenum" class="form-control" placeholder="رقم الموبايل" required="required" />
              </div>
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
              <div class="col-25">
                <span class="span_style"><span class="red_star">*</span>البريد الالكتروني</span>
              </div>
              <div class="col-75">
                <input type="email" name="email" class="form-control" placeholder="example@domain.com" required="required" />
              </div>
              <?php
              if (in_array("email", $errors_arr)) {
                /* -------------- Jan 7th ------------- */
                echo "<script> swal('*ادخل بريد اليكتروني صحيح'); </script>
                        <span class='error'> *ادخل بريد اليكتروني صحيح </span>";
                //exit();
              }
              ?>
            </div>
            <div class="form-group">
              <div class="col-25">
                <span class="span_style"><span class="red_star">*</span>النوع</span>
              </div>
              <div class="col-75">
                <div class="col-30">
                  <input type="radio" id="female" name="gender" value="Female" required="required">
                  <span class="fm_style">أنثى</span>
                </div>
                <div class="col-30">
                  <input type="radio" id="male" name="gender" value="Male" required="required">
                  <span class="fm_style">ذكر</span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-25">
                <span class="span_style"><span class="red_star">*</span>كلمة المرور</span>
              </div>
              <div class="col-75">
                <input type="password" name="password" class="form-control" placeholder="أكثر من 5" required="required" />
              </div>
              <?php
              if (in_array("password", $errors_arr)) {
                /* -------------- Jan 7th ------------- */
                echo "<script> swal('*ادخل كلمة مرور صحيحة') </script>
                      <span class='error'> *ادخل كلمة مرور صحيحة </span>";
                //exit();
              }
              ?>
            </div>
            <div class="form-group">
              <div class="col-25">
                <span class="span_style"><span class="red_star">*</span>مقدم خدمات</span>
              </div>
              <div class="col-75">
                <div class="col-30">
                  <input type="radio" id="yes" name="service_provider" value="yes" required="required" onclick="ExtendForm()">

                  <span class="fm_style">نعم</span>
                </div>
                <div class="col-30">
                  <input type="radio" id="no" name="service_provider" value="no" required="required" onclick="Remove_ExtendForm()">
                  <span class="fm_style">لا</span>
                </div>
              </div>
            </div>
            <!--*******************************************************************************************-->
            <div id="extend_form" style="display:none">
              <div class="form-group">
                <div class="col-25">
                  <span class="span_style"><span class="red_star">*</span>المهنة</span>
                </div>
                <div class="col-75">
                  <!--<select name="Category" id="Category" class="form-control" onchange="changeCat(this)">
                      <option value="">اختر الخدمة</option>
                      <option value="صيانة">صيانة</option>
                      <option value="تركيبات">تركيبات</option>
                      <option value="تشطيبات">تشطيبات</option>
                      <option value="تنظيف">تنظيف</option>
                  </select>-->
                  <select name="Profession" id="Profession" class="form-control">
                    <option value="">اختر المهنة</option>
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
              </div>

              <!--<div class="form-group">
                <div class="col-25">
                  <span  class="span_style"><span class="red_star">*</span>التخصص</span>
                </div>
                <div class="col-75">
                  <select name="speciality" id="speciality" class="form-control">
                      <option value="">تخصص الفني</option>
                      <option value=""></option>
                  </select>
                </div>
              </div>-->

              <div class="form-group">
                <div class="col-25">
                  <span class="span_style"><span class="red_star">*</span>المدينة</span>
                </div>
                <div class="col-75">
                  <select name="City" id="City" class="form-control" onchange="changeCity()">
                    <option value="">اختر مدينتك</option>
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
              </div>

              <div class="form-group">
                <div class="col-25">
                  <span class="span_style"><span class="red_star">*</span>المنطقة</span>
                </div>
                <div class="col-75">
                  <select name="district" id="district" class="form-control" ondblclick="changeCity()">
                    <option value="">المنطقة</option>
                    <option value=""> </option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <div class="col-25">
                  <span class="span_style">نبذة عن الأعمال</span>
                </div>
                <div class="col-75">
                  <textarea class="form-control" name="story"></textarea>
                  <!--  <input type="text" class="form-control" name="address" />-->
                </div>
              </div>

              <div class="form-group">
                <div class="col-25">
                  <span class="span_style"><span class="red_star">*</span>صورة شخصية</span>
                </div>
                <div class="col-75">
                  <!--<label for="file-upload" class="custom-file-upload">
                                                   أضف صورة شخصية
                                              </label>-->
                  <input type="file" value="image" name="file-upload" id="file-upload" class="form-control" />
                </div>
                <?php
                if (in_array("img_type", $errors_arr)) {
                  /* -------------- Jan 7th ------------- */
                  echo "<script> swal('*ادخل صورة صحيحة') </script>
                        <span class='error'> *ادخل صورة صحيحة </span>";
                  //exit();
                }
                if (in_array("img_exist", $errors_arr)) {
                  echo "<script> swal('*ادخل صورة اخرى'); </script>
                        <span class='error'> *ادخل صورة اخرى </span>";
                  //exit();
                }
                if (in_array("img_size", $errors_arr)) {
                  echo "<script> swal('*ادخل صورة اصغر'); </script>
                        <span class='error'> *ادخل صورة اصغر </span>";
                  //exit();
                }
                ?>
              </div>
            </div>
            <!-- end of extend form-->
            <div class="submit_btn"><button class="btnn" type="submit">اشترك الآن</button></div>
          </form>
        </div>
      </div>
    </div>
    <!-- Sign Up End -->
    <script>
      function ExtendForm() {
        document.getElementById("extend_form").style.display = 'block';
        /*document.getElementById("Category").required = true;*/
        document.getElementById("Profession").required = true;
        /*document.getElementById("speciality").required = true;*/
        document.getElementById("City").required = true;
        document.getElementById("district").required = true;
        document.getElementById("file-upload").required = true;
        console.log("add_extend");
        }

    function Remove_ExtendForm() {
        document.getElementById("extend_form").style.display = 'none';
        /*document.getElementById("Category").required = true;*/
        document.getElementById("Profession").required = false;
        /*document.getElementById("speciality").required = true;*/
        document.getElementById("City").required = false;
        document.getElementById("district").required = false;
        document.getElementById("file-upload").required = false;
        console.log("remove_extend");
    }


    function myFunction() {
        var x = document.getElementById("file-uploade").value;
        document.getElementById("tt").innerHTML = x;
    }</script>

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