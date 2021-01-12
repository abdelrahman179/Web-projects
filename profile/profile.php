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
  $logIn = "True";
}

/* ------------ Jan 7 -------------- */
// >>>>>>>>> get the reviews if exists
include "../config.php";
$QRY_1 = "SELECT * FROM reviews WHERE service_provider_email='" . $_SESSION['email'] . "'";
$result_4 = mysqli_query($mysqli, $QRY_1);

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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
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
    <?php include 'profile.css'; ?><?php include '../css/style_customize.css'; ?>
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
            <div class="flex"><?php echo $result_arr['name']; ?> </div>
          </div>
          <div class="user_data">
            <div class="fixed"><i class="fas fa-phone-square"></i> &nbsp; رقم الموبايل </div>
            <div class="flex"> <?php echo $result_arr['phone_num']; ?> </div>
          </div>
          <div class="user_data">
            <div class="fixed"><i class="fas fa-at"></i> &nbsp; البريد الالكتروني</div>
            <div class="flex"> <?php echo $result_arr['email']; ?></div>
          </div>
          <div class="user_data">
            <div class="fixed"><i class="fas fa-key"></i> &nbsp; كلمة المرور</div>
            <div class="flex"> <?php echo $result_arr['password']; ?> </div>
          </div>
          <!--  ************************* Extended info ************************* -->
          <?php
          if ($table_name == "service_provider") {
            echo "
                              <div class='user_data'>
                                <div class='fixed'><i class='fas fa-user-tie'></i> &nbsp; المهنة</div>
                                <div class='flex'> " . $result_arr['profession'] . " </div>
                              </div>
                              <div class='user_data'>
                                <div class='fixed'><i class='fas fa-thumbtack'></i> &nbsp; المدينة</div>
                                <div class='flex'> " . $result_arr['city'] . " </div>
                              </div>
                              <div class='user_data'>
                                <div class='fixed'><i class='fas fa-street-view'></i> &nbsp; المنطقة</div>
                                <div class='flex'> " . $result_arr['district'] . " </div>
                              </div>
                              <div class='user_data'>
                                <div class='fixed'><i class='fas fa-paragraph'></i> &nbsp; نبذة عن الاعمال</div>
                                <div class='flex'> " . $result_arr['story'] . " </div>
                              </div>
                              ";
            if (mysqli_num_rows($result_4) > 0) {
              echo "<div class='user_data_rev'>
                        <div class='fixed_2'> تقييم عملائك  &nbsp; <i class='far fa-comments'></i></div>";
              while ($review_result = mysqli_fetch_array($result_4)) {
                $reviewer = $review_result['reviewer_name'];
                $review_desc = $review_result['review_desc'];
                echo "<div class='flex_2'> <span class'rev_name' style='font-weight: bold;'> {$reviewer} <i class='fa fa-comments' aria-hidden='true'></i> &nbsp </span>
                                           <span class='rev_desc'> {$review_desc} </span> </div>";
              }
              echo "</div>";
            } else {
              echo "<div class='user_data_rev'>
                      <div class='fixed_2'><i class='far fa-comments'></i> &nbsp; تقييم عملائك</div>
                      <div class='flex_2'> لا يوجد تقييمات سابقة </div>
                    </div>";
            }
          }
          ?>
        </div>
      </div>
      <!--  ******* Extended img ******* -->
      <?php
      if ($table_name == "service_provider") {
        echo "
                                <div class='profile_child_img'>
                                  <div class='profile_image'>
                                    <img src='../SignUp/uploads/" . $result_arr['image'] . "' alt='Portfolio Image'>
                                  </div>
                                </div>
                              ";
      }
      ?>
    </div>
    <div class="buttons">
      <button class="pro_btn" onclick="confirmation()">حذف الحساب</button>
      <button class="pro_btn" onclick="redirect()"> تعديل البيانات</button>
      <button class="pro_btn" onclick="favourite_list()"> قائمة التفضيل</button>
    </div>
    <script type="text/javascript">
      function favourite_list() {
        window.location.href = 'favourite_list.php';
      }

      function redirect() {
        window.location.href = 'profile_edit.php';
      }

      function confirmation() {
        swal({
            title: "هل انت متأكد من حذف حسابك؟",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#00539C",
            confirmButtonText: "تأكيد",
            cancelButtonText: "الرجوع",
            closeOnConfirm: false,
            closeOnCancel: false
          },
          function(isConfirm) {
            if (isConfirm) {
              swal("تم حذف الحساب بنجاح");
              window.location.href = 'delete_acc.php';
            } else {
              window.location.href = 'profile.php';
            }
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