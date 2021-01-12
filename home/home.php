<?php

session_start();
$table_name = "users";
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


?>

<html lang="ar">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="../img/lOGO-1.png" type="image/png">
    <title>الرئيسية - خلصانة </title>
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

    <style>
        <?php include '../css/style_customize.css'; ?><?php include 'home_style.css'; ?>
    </style>

    <!-- Template Stylesheet
        <link href="css/style.css" rel="stylesheet">-->
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
                                echo "<a href='home_session_distroy.php' class='btn'>الخروج </a>";
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

                <div class="hero row align-items-center" dir="rtl">
                    <div class="col-md-7">
                        <h2>ابحث عن الصنايعي</h2>
                        <h2><span>اللي محتاجه فى ثواني  </span></h2><br>
                        <p> أسهل طريقة للوصول لصنايعي - ابحث بالمنطقة, المهنة, أو اسم الصنايعي مباشرة</p>
                    </div>
                    <div class="col-md-5">
                        <div class="form">
                            <h3>ابحث عن صنايعي </h3>
                            <form name='search_form' method='post' action='../Search_result/sea_result.php'>

                                <div class="control-group">
                                      <select name="Profession" id="Profession" class="form-control" required>
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
                                <div class="control-group">
                                    <select name="City" id="City" class="form-control" onchange="changeCity()" required>
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
                                <div class="control-group">
                                    <select name="district" id="district" class="form-control" ondblclick = "changeCity()">
                                        <option value="">المنطقة</option>
                                        <option value=""> </option>

                                    </select>
                                </div>
                                <input name="ser_pro_name" class="form-control" type="text" placeholder="ابحث باسم الصنايعي">
                                <button class="btn btn-block">بحث</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Service Start -->
        <div class="service">
            <div class="container">
                <div class="section-header">
                    <?php
                    if ($table_name == "service_provider") {
                        echo "<h2 style='font-size:35px ;'>ازاي تسوق لخدمتك صح؟</h2>";
                    } else {
                        echo "<h2 style='font-size:35px ;'>ازاي تلاقي صنايعي كويس على خلصانة؟</h2>";
                    }
                    ?>
                </div>
                <div class="row">
                    <?php if ($table_name == "service_provider") {
                        echo "  <div class='col-lg-3 col-md-6'>
                                            <div class='service-item'>
                                                <img src='../img/home_ads.gif' alt='Service'>
                                                <h3> تقدر تخلي بروفايلك دايما على الصفحة الرئيسية </h3>
                                                <p>
                                                    لو عايز رقمك دايما ظاهر على الصفحة الرئيسية, ابعتلنا رسالة وهنتواصل معاك
                                                </p>
                                            </div>
                                        </div>
                                        <div class='col-lg-3 col-md-6'>
                                            <div class='service-item'>
                                                <img src='../img/high_rate.gif' alt='Service'>
                                                <h3> احرص على انك تقدم خدمة كويسة </h3>
                                                <p>
                                                    لو اتبعتلنا كلام كويس عنك وعن خدمتك, ليك اسبوع ببلاش على الصفحة الرئيسية 
                                                </p>
                                            </div>
                                        </div>
                                        <div class='col-lg-3 col-md-6'>
                                            <div class='service-item'>
                                                <img src='../img/business_phone.gif' alt='Service'>
                                                <h3> اكتب رقم تليفون الخاص بالشغل </h3>
                                                <p>
                                                    اتاكد ان الرقم اللي سجلته معانا هو الخاص بالشغل وانه متاح اوقات العمل
                                                </p>
                                            </div>
                                        </div>
                                        <div class='col-lg-3 col-md-6'>
                                            <div class='service-item'>
                                                <img src='../img/writing.gif' alt='Service'>
                                                <h3> اكتب عن نفسك وعن خبراتك </h3>
                                                <p>
                                                    وانت بتشترك معانا, عرف نفسك كويس واكتب عن شغلك وخبراتك
                                                </p>
                                            </div>
                                        </div>
                                    ";
                    } else {
                            echo "  <div class='col-lg-3 col-md-6'>
                                        <div class='service-item'>
                                            <img src='../img/complaint.gif' alt='Service'>
                                            <h3>فى حالة وجود شكوى</h3>
                                            <p>
                                                فى حالة وجود شكوى من الصنايعي برجاء التواصل معنا فورا
                                            </p>
                                        </div>
                                    </div>
                                    <div class='col-lg-3 col-md-6'>
                                        <div class='service-item'>
                                            <img src='../img/thinking.gif' alt='Service'>
                                            <h3>قارن واختار</h3>
                                            <p>
                                                 قارن تكلفة خدمة الصنايعية الأقرب ليك واختار الأنسب حسب أراء العملاء السابقين 
                                            </p>
                                        </div>
                                    </div>
                                    <div class='col-lg-3 col-md-6'>
                                        <div class='service-item'>
                                            <img src='../img/contactgif.gif' alt='Service'>
                                            <h3>تواصل مع الصنايعي</h3>
                                            <p>
                                                ادخل على بيانات الصنايعي المناسب ليك وتواصل معه
                                            </p>
                                        </div>
                                    </div>
                                    <div class='col-lg-3 col-md-6'>
                                        <div class='service-item'>
                                            <img src='../img/search.gif' alt='Service'>
                                            <h3>دور على صنايعي</h3>
                                            <p>
                                                اعمل بحث بالتخصص, المنطقة, او بالأسم
                                            </p>
                                        </div>
                                    </div> ";
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- Service End -->

        <!-- Testimonial Start -->
        <div class="testimonial">
            <div class="container">
                <div class="section-header">
                    <h2 style="font-size: 35px;"> الاعلانات </h2>
                </div>
                <div class="owl-carousel testimonials-carousel">
                    <div class="testimonial-item">
                        <div class="testimonial-img">
                            <img src="../users/hanafy@gmail.com01-06-2021-02-26-35pm.jpg" alt="">
                        </div>
                        <div class="testimonial-content">
                            <p>
                                خبرة اكثر من خمس سنين في مجال الرخام والجرانيت, بيع, تركيب, ديكور
                            </p>
                            <h3>سراج الدين <i class='far fa-address-book'></i></h3>
                            <h3>القاهرة -  العبور <i class='fas fa-street-view'></i></h3>
                            <h3>01004269012 <i class='fas fa-phone-square'></i></h3>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-img">
                            <img src="../users/hamada@gmail.com01-04-2021-08-33-02pm.jpg" alt="">
                        </div>
                        <div class="testimonial-content">
                            <p>
                                خبرة 10 سنوات فى مجالى السباكة, حمامات, مطابخ, تشطيب, صيانة
                            </p>
                            <h3>معتز عبدالحميد <i class='far fa-address-book'></i></h3>
                            <h3>الشرقية -  بلبيس <i class='fas fa-street-view'></i></h3>
                            <h3>01004269012 <i class='fas fa-phone-square'></i></h3>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-img">
                            <img src="../users/basememad@gmail.com.jpg" alt="">
                        </div>
                        <div class="testimonial-content">
                            <p>
                                خبرة فى مجال التكييف اكثر من 5 سنوات, شركات, افراد, تركيب, صيانة
                            </p>
                            <h3>احمد الجندي <i class='far fa-address-book'></i></h3>
                            <h3>الجيزة -  اكتوبر <i class='fas fa-street-view'></i></h3>
                            <h3>01038399012 <i class='fas fa-phone-square'></i></h3>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-img">
                            <img src="../users/fofo@gmail.com01-05-2021-06-31-29am.jpg" alt="">
                        </div>
                        <div class="testimonial-content">
                            <p>
                                تعمل فى مجال تنظيف المنازل والشركات لأكثر من 5 سنوات
                            </p>
                            <h3>منى عبدالسلام <i class='far fa-address-book'></i></h3>
                            <h3>الاسكندرية - سيدي بشر <i class='fas fa-street-view'></i></h3>
                            <h3>01112334904 <i class='fas fa-phone-square'></i></h3>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-img">
                            <img src="../users/ahmedkhamis@gmail.com.jpg" alt="">
                        </div>
                        <div class="testimonial-content">
                            <p>
                                خبرة 6 سنوات فى مجال الكهربائيات, تشطيب, صيانة, اجهزة
                            </p>
                            <h3>ابراهيم ابو العلا <i class='far fa-address-book'></i></h3>
                            <h3>القاهرة - مدينة نصر <i class='fas fa-street-view'></i></h3>
                            <h3>01224567875 <i class='fas fa-phone-square'></i></h3>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-img">
                            <img src="../users/ahmedadel@gmail.com.jpg" alt="">
                        </div>
                        <div class="testimonial-content">
                            <p>
                                خبرة 6 سنوات فى مجال النقاشة, تشطيب, ديكور, 
                            </p>
                            <h3>محمد عبدالسلام <i class='far fa-address-book'></i></h3>
                            <h3>القاهرة - شبرا <i class='fas fa-street-view'></i></h3>
                            <h3>01112334904 <i class='fas fa-phone-square'></i></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->

        


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
