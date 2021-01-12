<?php
include('security.php');
include('database/dbconfig.php');
include('../config.php');
include('includes/header.php');
include('includes/navbar.php');

?>

<script type="text/javascript" src="main.js"></script>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Service Provider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST" enctype="multipart/form-data">

                <div class="modal-body">

                    <div class="form-group">
                        <label> Name </label>
                        <input type="text" name="name" class="form-control" placeholder="Enter User Name" required="required">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phonenum" class="form-control" placeholder="Enter Phone Number" required="required">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email" required="required">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password" required="required">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <label>Gender:&nbsp; </label>
                        <input type="radio" id="male" name="gender" value="Male" required="required">
                        <span>Male &nbsp;</span>
                        <input type="radio" id="female" name="gender" value="Female" required="required">
                        <span>Female</span>
                    </div>
                    <div class="form-group">
                        <label>Profession</label>
                        <select name="Profession" id="Profession" class="form-control" required>
                            <option value="">Select Profession</option>
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
                        <select name="City" id="City" class="form-control" onchange="changeCity(this)" required>
                            <option value="">Select City</option>
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

                    <!-- Error select not working -->
                    <div class="form-group">
                        <label>District</label>
                        <select name="district" id="district" class="form-control" ondblclick="changeCity()">
                            <option value="">Select District</option>
                            <option value=""> </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Work Experience</label>
                        <input type="text" name="story" class="form-control" placeholder="Work Experience">
                    </div>

                    <div class="form-group">
                        <label>Profile Picture</label>
                        <input type="file" value="image" name="file-upload" id="file-upload" class="form-control" />
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="add_SP_btn" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>


<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
                <?php
                $query = "SELECT * FROM service_provider";
                $query_run = mysqli_query($mysqli, $query);
                $num = mysqli_num_rows($query_run);
                ?>
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $num ?> &nbsp; Service Providers &nbsp;
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                    Add Service Provider Profile
                </button>
            </h6>
        </div>

        <div class="card-body">
            <?php
            if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
                echo '<h2 class="bg-primary text-white"> ' . $_SESSION['success'] . ' </h2>';
                unset($_SESSION['success']);
            }

            if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                echo '<h2 class="bg-danger text-white"> ' . $_SESSION['status'] . ' </h2>';
                unset($_SESSION['status']);
            }
            ?>
            <div class="table-responsive" style="height: 400px;">
               

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align:center; font-size: medium;">
                            <th style="vertical-align: middle;">Delete </th>
                            <th style="vertical-align: middle;">Edit </th>
                            <th style="vertical-align: middle;">Image</th>
                            <th style="vertical-align: middle;">SP Name </th>
                            <th style="vertical-align: middle;">Phone Number </th>
                            <th style="vertical-align: middle;">Email </th>
                            <th style="vertical-align: middle;">Password</th>
                            <th style="vertical-align: middle;">Gender</th>
                            <th style="vertical-align: middle;">Profession</th>
                            <th style="vertical-align: middle;">City</th>
                            <th style="vertical-align: middle;">District</th>
                            <th style="vertical-align: middle;">SP Story</th>
                            <th style="vertical-align: middle;">Registeration Time</th>
                            <th style="vertical-align: middle;">Last Update Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                                <tr style="font-size: small; text-align:center">
                                    <td style="vertical-align: middle;">
                                        <form action="code.php" method="post">
                                            <input type="hidden" name="delete_email_pri" value="<?php echo $row['email']; ?>">
                                            <button type="submit" name="service_provider_delete_btn" class="btn btn-danger"> DELETE</button>
                                        </form>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <form action="service_provider_edit.php" method="post">
                                            <input type="hidden" name="edit_email_pri" value="<?php echo $row['email']; ?>">
                                            <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                        </form>
                                    </td>
                                    <td style="vertical-align: middle;"><?php echo "<img src='../SignUp/uploads/" . $row['image'] . "' alt='Portfolio Image' style='height:70px; width:70px; border-radius:30px;'>"; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['name']; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['phone_num']; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['email']; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['password']; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['gender']; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['profession']; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['city']; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['district']; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['story']; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['register_date_time']; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['update_date_time']; ?></td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "No Record Found";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <br>
            <form action="excel.php" method="post" style="text-align:center;">
                <input type="submit" name="export_SP_excel" class="btn btn-primary" value="Export to Excel" />
            </form>
        </div>
    </div>

</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>