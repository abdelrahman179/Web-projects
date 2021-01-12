
<?php
    session_start();

    /* Validation */
    $error_fields = array(); // hold errors

  /*************************************************************************/

    /******************get input from user********************/
    $email_sess = $_SESSION['email'];
    $email_img = $_SESSION['email'];





    /****************** Check whether the user is a regular one or a service provider ********************/
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
    }


    /* Validation */
    $error_fields = array(); // hold errors
    // if the user is a service provider
    if ($_SESSION['service_provider'] == "yes")
    {
        if(isset($_POST['name']) && !empty($_POST['name']))
        {
            $fullname = $_POST['name'];
            $sql_query_name = "UPDATE $table_name SET name='$fullname', update_date_time=NOW() WHERE email='$email_sess'";
            $result_2 = mysqli_query($mysqli, $sql_query_name);
        }
        if(isset($_POST['phone_num']) && !empty($_POST['phone_num']))
        {
            if (!(strlen($_POST['phone_num']) == 11)) {
                $error_fields[] = "phonenum";
              }else{
                $phonenum = $_POST['phone_num'];
                $sql_query_ph_no = "UPDATE $table_name SET phone_num='$phonenum', update_date_time=NOW() WHERE email='$email_sess'";
                $result_3 = mysqli_query($mysqli, $sql_query_ph_no);
              }
        }
        if(isset($_POST['password']) && !empty($_POST['password']))
        {
            if (strlen($_POST['password']) < 5) {
                $error_fields[] = "password";
              }else{
                $password = $_POST['password'];
                $sql_query_pass = "UPDATE $table_name SET password='$password', update_date_time=NOW() WHERE email='$email_sess'";
                $result_5 = mysqli_query($mysqli, $sql_query_pass);
              }
        }
        if(isset($_POST['Profession']) && !empty($_POST['Profession']))
        {
            $Profession = $_POST['Profession'];
            $sql_query_Prof = "UPDATE $table_name SET profession='$Profession', update_date_time=NOW() WHERE email='$email_sess'";
            $result_6 = mysqli_query($mysqli, $sql_query_Prof);
        }
        if(isset($_POST['category']) && !empty($_POST['category']))
        {
            $Category = $_POST['category'];
            $sql_query_cat = "UPDATE $table_name SET category='$Category', update_date_time=NOW() WHERE email='$email_sess'";
            $result_6 = mysqli_query($mysqli, $sql_query_cat);
        }
        /*if(isset($_POST['speciality']) && !empty($_POST['speciality']))
        {
            $speciality = $_POST['speciality'];
            $sql_query_spec = "UPDATE $table_name SET speciality='$speciality', date_time=NOW() WHERE email='$email_sess'";
            $result_7 = mysqli_query($mysqli, $sql_query_spec);
        }
        if(isset($_POST['city']) && !empty($_POST['city']))
        {
            $City = $_POST['city'];
            $sql_query_city = "UPDATE $table_name SET city='$City', date_time=NOW() WHERE email='$email_sess'";
            $result_8 = mysqli_query($mysqli, $sql_query_city);
        }*/
        if(isset($_POST['district']) && !empty($_POST['district']))
        {
            $district = $_POST['district'];
            $sql_query_dis = "UPDATE $table_name SET district='$district', update_date_time=NOW() WHERE email='$email_sess'";
            $result_9 = mysqli_query($mysqli, $sql_query_dis);
        }
        if(isset($_POST['story']) && !empty($_POST['story']))
        {
            $story = $_POST['story'];
            $sql_query_story = "UPDATE $table_name SET story='$story', update_date_time=NOW() WHERE email='$email_sess'";
            $result_10 = mysqli_query($mysqli, $sql_query_story);
        }
        // Check if image file is a actual image or fake image
        if(is_uploaded_file($_FILES['file_upload']['tmp_name']))
        {
            $target_dir = "../SignUp/uploads/";
            $target_file = $target_dir . basename($_FILES["file_upload"]["name"]);
            $ImageName = basename($_FILES["file_upload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if ($ImageName)
            {
                $check = getimagesize($_FILES["file_upload"]["tmp_name"]);
                if ($check !== false) {
                /***mime return file extension******/
                //echo "File is an image - ".$check["mime"].".";
                $uploadOk = 1;
                } else {
                //echo "File is not an image.";
                $error_fields[] = "img_type";
                $uploadOk = 0;
                }

                // Check if file already exists
                if (file_exists($target_file)) {
                //echo "Sorry, file already exists.";
                $error_fields[] = "img_exist";
                $uploadOk = 0;
                }

                // Check file size
                if ($_FILES["file_upload"]["size"] > 5000000) {
                //echo "<script> alert('Sorry, your file is too large.'); </sript>";
                $error_fields[] = "img_size";
                $uploadOk = 0;
                }

                // Allow certain file formats
                if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
                ) {
                //echo "<script> alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.'); </sript>";
                $error_fields[] = "img_type";
                $uploadOk = 0;
                }
                if ($error_fields)
                {
                    // redirect to signup.php page and specify the error
                    header("location: profile_edit.php? error_fields=" . implode(",", $error_fields));
                    // stop the script
                    exit();
                }
            }
            /*************tazbeet edit image********************/
            $update_date =  date('m-d-Y-h-i-sa');
            //"_" . $update_date .
            $newfilename = $email_img.$update_date .  "." . $imageFileType;
            /*echo "$newfilename";
            exit();*/
            $target_file = $target_dir . $newfilename;
            if ($uploadOk == 0)
            {
                //echo "<script> alert('Sorry, your file was not uploaded.'); </sript>";
                // if everything is ok, try to upload file
            } else
            {
                if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file))
                {
                    echo "The file " . htmlspecialchars(basename($_FILES["file_upload"]["name"])) . " has been uploaded.";
                    $sql_query_story = "UPDATE $table_name SET image='$newfilename', update_date_time=NOW() WHERE email='$email_sess'";
                    $result_11 = mysqli_query($mysqli, $sql_query_story);
                } else
                {
                    echo "<script> alert('Sorry, there was an error uploading your file.'); </sript>";
                    //exit();
                }
            }
        }
    }

    //****************************************  if regular user
    else
    {
        if(isset($_POST['name']) && !empty($_POST['name']))
        {
            $fullname = $_POST['name'];
            $sql_query_name = "UPDATE $table_name SET name='$fullname', update_date_time=NOW() WHERE email='$email_sess'";
            $result_2 = mysqli_query($mysqli, $sql_query_name);
        }
        if(isset($_POST['phone_num']) && !empty($_POST['phone_num']))
        {
            if (!(strlen($_POST['phone_num']) == 11)) {
                $error_fields[] = "phonenum";
              }else{
                $phonenum = $_POST['phone_num'];
                $sql_query_ph_no = "UPDATE $table_name SET phone_num='$phonenum', update_date_time=NOW() WHERE email='$email_sess'";
                $result_3 = mysqli_query($mysqli, $sql_query_ph_no);
              }
        }
        if(isset($_POST['password']) && !empty($_POST['password']))
        {
            if (strlen($_POST['password']) < 5) {
                $error_fields[] = "password";
              }else{
                $password = $_POST['password'];
                $sql_query_pass = "UPDATE $table_name SET password='$password', update_date_time=NOW() WHERE email='$email_sess'";
                $result_5 = mysqli_query($mysqli, $sql_query_pass);
              }
        }
    }


    header("location: profile.php");


  ?>
