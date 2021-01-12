<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
include('database/dbconfig.php');
include('../config.php');


$user_type = null;
if ($_GET['acc']) {
    $search_str = $_GET['acc'];

    $email_1_query = "SELECT * FROM service_provider WHERE email='$search_str' ";
    $email_SP_query_run = mysqli_query($mysqli, $email_1_query);

    $email_2_query = "SELECT * FROM users WHERE email='$search_str'";
    $email_reg_query_run = mysqli_query($mysqli, $email_2_query);

    $email_3_query = "SELECT * FROM register WHERE email='$search_str' ";
    $email_admin_query_run = mysqli_query($connection, $email_3_query);

    if (mysqli_num_rows($email_SP_query_run) > 0) {
        $user_type = 'Service Provider';
        $SP_row = mysqli_fetch_assoc($email_SP_query_run);
    } elseif (mysqli_num_rows($email_reg_query_run) > 0) {
        $user_type = 'Regular User';
        $Reg_row = mysqli_fetch_assoc($email_reg_query_run);
    } elseif (mysqli_num_rows($email_admin_query_run) > 0) {
        $user_type = 'Administrator';
        $admin_row = mysqli_fetch_assoc($email_admin_query_run);
    } else {
        $user_type = 'No Result';
    }
}



?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?php if ($user_type == 'Regular User') {
                echo "    
                <h6 class='m-0 font-weight-bold text-primary'> " . $Reg_row['name'] . " Profile </h6>
        </div>
        <div class='card-body'>
       
            <form action='code.php' method='POST'>

                <input type='hidden' name='edit_id' value='" . $Reg_row['email'] . "'>

                <div class='form-group'>
                    <label> Username </label>
                    <input type='text' name='edit_username' value='" . $Reg_row['name'] . "' class='form-control'>
                </div>
                <div class='form-group'>
                    <label> Phone Number </label>
                    <input type='text' name='edit_phonenum' value='" . $Reg_row['phone_num'] . "' class='form-control'>
                </div>
                <div class='form-group'>
                    <label>Email</label>
                    <input type='email' name='edit_email' value='" . $Reg_row['email'] . "' class='form-control'>
                </div>
                <div class='form-group'>
                    <label>Password</label>
                    <input type='password' name='edit_password' value='" . $Reg_row['password'] . "' class='form-control'>
                </div>

                <a href='regular_users.php' class='btn btn-danger'> CANCEL </a>
                <button type='submit' name='regular_user_updatebtn' class='btn btn-primary'> Update </button>

            </form>";

            } elseif ($user_type == 'Service Provider') {
                echo "    
                <h6 class='m-0 font-weight-bold text-primary'> " . $SP_row['name'] . " Profile </h6>
        </div>
        <div class='card-body'>
   
            <form action='code.php' method='POST'>

                <input type='hidden' name='edit_id' value='" . $SP_row['email'] . "'>

                <div class='form-group'>
                    <label> Username </label>
                    <input type='text' name='edit_username' value='" . $SP_row['name'] . "' class='form-control'>
                </div>
                <div class='form-group'>
                    <label> Phone Number </label>
                    <input type='text' name='edit_phonenum' value='" . $SP_row['phone_num'] . "' class='form-control'>
                </div>
                <div class='form-group'>
                    <label>Email</label>
                    <input type='email' name='edit_email' value='" . $SP_row['email'] . "' class='form-control'>
                </div>
                <div class='form-group'>
                    <label>Password</label>
                    <input type='password' name='edit_password' value='" . $SP_row['password'] . "' class='form-control'>
                </div>
                <div class='form-group'>
                    <label>Profession</label>
                    <select name='Profession' id='Profession' class='form-control' required>
                        <option value=''>" . $SP_row['profession'] . "</option>
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

                <div class='form-group'>
                    <label>City</label>
                    <select name='City' id='City' class='form-control' onchange='changeCity()' required>
                        <option selected>" . $SP_row['city'] . "</option>
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

                <div class='form-group'>
                    <label>District</label>
                    <select name='district' id='district' class='form-control' ondblclick='changeCity()'>
                        <option value=''>" . $SP_row['district'] . "</option>
                        <option value=''> </option>
                    </select>
                </div>

                <div class='form-group'>
                    <label>Work Experience</label>
                    <input type='text' name='story' class='form-control' value='" . $SP_row['story'] . "'>
                </div>

                <div class='form-group'>
                    <label>Profile Picture</label><br>
                    <img src='../SignUp/uploads/" . $SP_row['image'] . "' alt='Portfolio Image' style='height:70px; width:70px; border-radius:30px; margin-bottom: 15px;'>
                    <input type='file' value='image' name='file-upload' id='file-upload' class='form-control' />
                </div>

                <a href='service_provider.php' class='btn btn-danger'> CANCEL </a>
                <button type='submit' name='service_provider_updatebtn' class='btn btn-primary'> Update </button>

            </form>";

            } else {
                echo " 
                
                <h6 class='m-0 font-weight-bold text-primary'> " . $admin_row['username'] . " Profile </h6>
        </div>
        <div class='card-body'>
           
            <form action='code.php' method='POST'>
         
                <input type='hidden' name='edit_id' value='" . $admin_row['email'] . "'>

                <div class='form-group'>
                    <label> Username </label>
                    <input type='text' name='edit_username' value='" . $admin_row['username'] . "' class='form-control'>
                </div>
                <div class='form-group'>
                    <label>Email</label>
                    <input type='email' name='edit_email' value='" . $admin_row['email'] . "' class='form-control'>
                </div>
                <div class='form-group'>
                    <label>Password</label>
                    <input type='password' name='edit_password' value='" . $admin_row['password'] . "' class='form-control'>
                </div>

                <a href='register.php' class='btn btn-danger'> CANCEL </a>
                <button type='submit' name='updatebtn' class='btn btn-primary'> Update </button>

                </form>";
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