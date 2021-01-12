<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
include('database/dbconfig.php');
include('../config.php');

?>


<script type="text/javascript" src="main.js"></script>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Service Provider Profile </h6>
        </div>
        <div class="card-body">
            <?php

            if (isset($_POST['edit_btn'])) {
                $email_pri = $_POST['edit_email_pri'];

                $query = "SELECT * FROM service_provider WHERE email='$email_pri' ";
                $query_run = mysqli_query($mysqli, $query);

                foreach ($query_run as $row) {
            ?>

                    <form action="code.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="email_pri" value="<?php echo $row['email']; ?>">

                        <div class="form-group">
                            <label> User Name </label>
                            <input type="text" name="edit_username" value="<?php echo $row['name']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Phone Number </label>
                            <input type="text" name="edit_phonenum" value="<?php echo $row['phone_num']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="edit_password" value="<?php echo $row['password']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Profession</label>
                            <select name="Profession" id="Profession" class="form-control">
                                <option value="<?php echo $row['profession'];?>"><?php echo $row['profession']; ?></option>
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

                        <div class="form-group">
                            <label>City</label>
                            <select name="City" id="City" class="form-control" onchange="changeCity(this)">
                                <option value="<?php echo $row['city']; ?>"><?php echo $row['city']; ?></option>
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

                        <div class="form-group">
                            <label>District</label>
                            <select name="district" id="district" class="form-control" ondblclick="changeCity()">
                                <option value="<?php echo $row['district']; ?>"><?php echo $row['district']; ?></option>
                                <option value=""> </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Work Experience</label>
                            <input type="text" name="story" class="form-control" value="<?php echo $row['story']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Profile Picture</label><br>
                            <img src='../SignUp/uploads/<?php echo $row['image']; ?>' alt='Portfolio Image' style='height:70px; width:70px; border-radius:30px; margin-bottom: 15px;'>
                            <input type="file" value="image" name="file-upload" id="file-upload" class="form-control" />
                        </div>

                        <a href="service_provider.php" class="btn btn-danger"> CANCEL </a>
                        <button type="submit" name="service_provider_updatebtn" class="btn btn-primary"> Update </button>

                    </form>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>

</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>