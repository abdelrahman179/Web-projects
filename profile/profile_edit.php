<?php

session_start();
$logIn = "False";
if (isset($_SESSION['service_provider']) && isset($_SESSION['email'])) {
  if ($_SESSION['service_provider'] == "yes") {
    $table_name = "service_provider";
  } else {
    $table_name = "users";
  }
  include("../config.php");
  $sql_query = "SELECT * FROM $table_name WHERE email='" . $_SESSION['email'] . "'";
  $result = mysqli_query($mysqli, $sql_query);
  $result_arr = mysqli_fetch_array($result);
  $logIn = "True";
}

// check for errors
$errors_arr = array();
// check if errors occure from redirect process
if (isset($_GET['error_fields'])) {   // convert errors to an array
  $errors_arr = explode(",", $_GET['error_fields']);
}


?>
<html lang="ar-EG">

<head>
  <meta charset="utf-8">
  <link rel="icon" href="../img/lOGO-1.png" type="image/png">
  <title> البروفايل - خلصانة </title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Khalsana Company Website Template" name="keywords">
  <meta content="Khalsana Company Website Template" name="description">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Sweet alert -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400&display=swap" rel="stylesheet">

  <!-- CSS Libraries -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- run the css file in the .php file -->
  <style>
    <?php include 'profile_edit.css'; ?><?php include '../css/style_customize.css'; ?>
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
    <form class="profile" id="profile_edit" method="post" action="edit_process.php" enctype="multipart/form-data">
      <div class="profile_child_info">
        <div class="info">
          <div class="user_data">
            <div class="fixed"><i class="fas fa-file-signature"></i> &nbsp; الاسم</div>
            <input type="text" class="flex" name="name" value="<?php echo $result_arr['name']; ?>">
          </div>
          <div class="user_data">
            <div class="fixed"><i class="fas fa-phone-square"></i> &nbsp; رقم الموبايل</div>
            <input type="text" class="flex" name="phone_num" value="<?php echo $result_arr['phone_num']; ?>">
          </div>
          <?php
          if (in_array("phonenum", $errors_arr)) {
            echo "*ادخل رقم صحيح";
            //exit();
          }
          ?>
          <div class="user_data">
            <div class="fixed"><i class="fas fa-key"></i> &nbsp; كلمة المرور </div>
            <input type="text" class="flex" name="password" value="<?php echo $result_arr['password']; ?>">
          </div>
          <?php
          if (in_array("password", $errors_arr)) {
            echo "*ادخل كلمة مرور صحيحة";
            //exit();
          }
          ?>
          <?php
          if ($table_name == "service_provider") {
            echo "
                              <div class='user_data'>
                                <div class='fixed'><i class='fas fa-user-tie'></i> &nbsp; المهنة</div>
                                <select name='Profession' id='Profession' class='flex'>
                                    <option value='" . $result_arr['profession'] . "'>" . $result_arr['profession'] . "</option>
                                    <option value='سباك'>سباك</option>
                                    <option value='كهربائي'>كهربائي</option>
                                    <option value='نجار'>نجار</option>
                                    <option value='حداد'>حداد</option>
                                    <option value='مبلط سيراميك'>مبلط سيراميك</option>
                                    <option value='نقاش'>نقاش</option>
                                    <option value='صنايعي رخام وجرانيت'>صنايعي رخام و جرانيت</option>
                                    <option value='صنايعي جبس'>صنايعي جبس</option>
                                    <option value='صنايعي جيبسون بورد'>صنايعي جيبسون بورد</option>
                                    <option value='صنايعي زجاج'>صنايعي زجاج</option>
                                    <option value='صنايعي ألوميتال'>صنايعي ألوميتال</option>
                                    <option value='فني تكييف'>فني تكييف</option>
                                    <option value='فني دش'>فني دش</option>
                                    <option value='فني غسالات''>فني غسالات</option>
                                    <option value='فني ثلاجات'>فني ثلاجات</option>
                                    <option value='فني سخانات'>فني سخانات</option>
                                    <option value='فني فلتر مياه'>فني فلتر مياه</option>
                                    <option value='فني اليكترونيات'>فني اليكترونيات</option>
                                    <option value='عامل تنظيف'>عامل تنظيف</option>
                                    <option value='شيال'>شيال</option>
                                </select>
                              </div>

                              <div class='user_data'>
                                <div class='fixed'><i class='fas fa-thumbtack'></i> &nbsp; المدينة</div>
                                <select name='City' id='City' class='flex' onchange='changeCity()'>
                                        <option value='" . $result_arr['city'] . "'>" . $result_arr['city'] . "</option>
                                        <option value='القاهرة'>القاهرة</option>
                                        <option value='الجيزة'>الجيزة</option>
                                        <option value='بورسعيد'>بورسعيد</option>
                                        <option value='الاسكندرية'>الاسكندرية</option>
                                        <option value='الشرقية'>الشرقية</option>
                                        <option value='المنوفية'>المنوفية</option>
                                        <option value='الفيوم'>الفيوم</option>
                                        <option value='القليوبية'>القليوبية</option>
                                        <option value='الغربية'>الغربية</option>
                                        <option value='البحيرة'>البحيرة</option>
                                        <option value='دمياط'>دمياط</option>
                                        <option value='الاقصر'>الاقصر</option>
                                        <option value='الغردقة'>الغردقة</option>
                                        <option value='شرم الشيخ'>شرم الشيخ</option>
                                        <option value='نوبيع'>نوبيع</option>
                                        <option value='اسيوط'>اسيوط</option>
                                        <option value='اسوان'>اسوان</option>
                                        <option value='بني سويف'>بني سويف</option>
                                    </select>
                              </div>
                              <div class='user_data'>
                                <div class='fixed'><i class='fas fa-street-view'></i> &nbsp; المنطقة</div>
                                  <select name='district' id='district'  class='flex' ondblclick='changeCity()'>
                                        <option value='" . $result_arr['district'] . "'>" . $result_arr['district'] . "</option>
                                        <option value=''> </option>
                                  </select>
                              </div>
                              <div class='user_data'>
                                <div class='fixed'><i class='fas fa-paragraph'></i> &nbsp; نبذة عن الاعمال</div>
                                <input type='text' class='flex' name='story' value='" . $result_arr['story'] . "'>
                              </div>
                              ";
          }
          ?>
        </div>
      </div>
      <!--  ******* Extended img ******* -->
      <?php
      if ($table_name == "service_provider") {
        if (in_array('img_type', $errors_arr)) {
          echo "
                                <div class='profile_child_img'>
                                  <div class='profile_image'>
                                    <img src='../SignUp/uploads/" . $result_arr['image'] . "' alt='Profile Image'>
                                      <div class='img_error'>*ادخل صورة صحيحة</div>
                                      <input type='file' value='image' name='file_upload' id='file_upload'>
                                  </div>
                                </div>";
        } elseif (in_array('img_exist', $errors_arr)) {
          echo "
                                <div class='profile_child_img'>
                                  <div class='profile_image'>
                                    <img src='../SignUp/uploads/" . $result_arr['image'] . "' alt='Profile Image'>
                                      <div class='img_error'>*ادخل صورة اخرى</div>
                                      <input type='file' value='image' name='file_upload' id='file_upload'>
                                  </div>
                                </div>";
        } elseif (in_array('img_size', $errors_arr)) {
          echo "
                                <div class='profile_child_img'>
                                  <div class='profile_image'>
                                    <img src='../SignUp/uploads/" . $result_arr['image'] . "' alt='Profile Image'>
                                      <div class='img_error'>*ادخل صورة اصغر حجما</div>
                                      <input type='file' value='image' name='file_upload' id='file_upload'>
                                  </div>
                                </div>";
        } else {
          echo "                <div class='profile_child_img'>
                                    <div class='profile_image'>
                                      <img src='../SignUp/uploads/" . $result_arr['image'] . "' alt='Profile Image'>
                                      <input type='file' value='image' name='file_upload' id='file_upload'>
                                  </div>
                                </div>";
        }
      }
      ?>
    </form>
    <div class="buttons">
      <button type="submit" form="profile_edit" value="Submit" class="pro_btn"> حفظ </button>
    </div>

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
              <a href="">شروط الاستخدام</a>
              <a href="">اتفاقية الخصوصية</a>
              <a href="">اتفاقية الخصوصية لمقدمي الخدمات</a>
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
</div>
