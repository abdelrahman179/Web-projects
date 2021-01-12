<?php
include('security.php');
include('database/dbconfig.php');
include('../config.php');


/* -------------------------- Admin Registeration -----------------------  */
if (isset($_POST['registerbtn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    $email_query = "SELECT * FROM register WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if (mysqli_num_rows($email_query_run) > 0) {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');
    } else {
        if ($password === $cpassword) {
            $query = "INSERT INTO register (username,email,password) VALUES ('$username','$email','$password')";
            $query_run = mysqli_query($connection, $query);

            if ($query_run) {
                // echo "Saved";
                $_SESSION['success'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');
            } else {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');
            }
        } else {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');
        }
    }
}






/* -------------------------- Admin Profile Update -----------------------  */
if (isset($_POST['updatebtn'])) {
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];

    $query = "UPDATE register SET username='$username', email='$email', password='$password' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Admin Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: register.php');
    } else {
        $_SESSION['status'] = "Admin Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');
    }
}




/* -------------------------- Admin Delete Profile -----------------------  */
if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM register WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: register.php');
    } else {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');
    }
}



/* -------------------------- Admin Panel Login -----------------------  */
if (isset($_POST['login_btn'])) {
    $email_login = $_POST['emaill'];
    $password_login = $_POST['passwordd'];

    $query = "SELECT * FROM register WHERE email='$email_login' AND password='$password_login' LIMIT 1";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_fetch_array($query_run)) {
        $_SESSION['username'] = $email_login;
        header('Location: index.php');
    } else {
        $_SESSION['status'] = "Email / Password is Invalid";
        header('Location: login.php');
    }
}


/* -------------------------- Admin Panel Logout -----------------------  */
if (isset($_POST['logout_btn'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('Location: login.php');
}



/* -------------------------- Add Regular User -----------------------  */

if (isset($_POST['add_user_btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phonenum = $_POST['phonenum'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $gender = $_POST['gender'];

    $email_query = "SELECT * FROM users WHERE email='$email' ";
    $email_query_run = mysqli_query($mysqli, $email_query);

    if (mysqli_num_rows($email_query_run) > 0) {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: regular_users.php');
    } else {
        if ($password === $cpassword) {
            $query = "INSERT INTO users (name,phone_num,email,password,gender,service_provider,register_date_time) 
                    VALUES ('$name','$phonenum','$email','$password','$gender','no',NOW())";
            $query_run = mysqli_query($mysqli, $query);

            if ($query_run) {
                // echo "Saved";
                $_SESSION['success'] = "User Profile is Added";
                $_SESSION['status_code'] = "success";
                header('Location: regular_users.php');
            } else {
                $_SESSION['status'] = "User Profile is Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: regular_users.php');
            }
        } else {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: regular_users.php');
        }
    }
}


/* -------------------------- Regular User Edit Profile -----------------------  */
if (isset($_POST['regular_user_updatebtn'])) {
    $email_pri = $_POST['edit_email_pri'];
    $username = $_POST['edit_username'];
    $phonenum = $_POST['edit_phonenum'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];

    $query = "UPDATE users SET name='$username', phone_num='$phonenum', password='$password', update_date_time=NOW() WHERE email='$email_pri' ";
    $query_run = mysqli_query($mysqli, $query);

    if ($query_run) {
        $_SESSION['success'] = "User Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: regular_users.php');
    } else {
        $_SESSION['status'] = "User Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: regular_users.php');
    }
}


/* -------------------------- Regular User Delete Profile -----------------------  */
if (isset($_POST['reg_user_delete_btn'])) {
    $email_pri = $_POST['delete_email_pri'];

    $query = "DELETE FROM users WHERE email='$email_pri' ";
    $query_run = mysqli_query($mysqli, $query);

    if ($query_run) {
        $_SESSION['success'] = "User Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: regular_users.php');
    } else {
        $_SESSION['status'] = "User Data is NOT Deleted";
        $_SESSION['status_code'] = "error";
        header('Location: regular_users.php');
    }
}



/* -------------------------- Add Service Provider -----------------------  */

if (isset($_POST['add_SP_btn'])) {

    $target_dir = "../SignUp/uploads/";
    $target_file = $target_dir . basename($_FILES["file-upload"]["name"]);
    $ImageName = basename($_FILES["file-upload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phonenum = $_POST['phonenum'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $gender = $_POST['gender'];
    $profession = $_POST['Profession'];
    $city = $_POST['City'];
    $district = $_POST['district'];
    $story = $_POST['story'];

    $newfilename = $email . "." . $imageFileType;
    $target_file = $target_dir . $newfilename;


    if (move_uploaded_file($_FILES["file-upload"]["tmp_name"], $target_file)) {
        echo "File is valid, and was successfully uploaded.\n";
    } else {
        echo "Upload failed";
    }


    $email_query = "SELECT * FROM service_provider WHERE email='$email' ";
    $email_query_run = mysqli_query($mysqli, $email_query);

    if (mysqli_num_rows($email_query_run) > 0) {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: service_provider.php');
    } else {
        if ($password === $cpassword) {
            $query = "INSERT INTO service_provider
        (name,phone_num,email,password,gender,service_provider,register_date_time,profession,city,district,story,image)
        VALUES('$name','$phonenum','$email','$password','$gender','yes',NOW(),
        '$profession','$city','$district','$story','$newfilename')";

            $query_run = mysqli_query($mysqli, $query);

            if ($query_run) {
                $_SESSION['success'] = "Service Provider Profile is Added";
                $_SESSION['status_code'] = "success";
                header('Location: service_provider.php');
            } else {
                $_SESSION['status'] = "Service Provider Profile is Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: service_provider.php');
            }
        } else {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: service_provider.php');
        }
    }
}


/* -------------------------- Edit Service Provider -----------------------  */

if (isset($_POST['service_provider_updatebtn'])) {

    $email = $_POST['email_pri'];
    $name = $_POST['edit_username'];
    $phonenum = $_POST['edit_phonenum'];
    $password = $_POST['edit_password'];
    $profession = $_POST['Profession'];
    $city = $_POST['City'];
    $district = $_POST['district'];
    $story = $_POST['story'];

    if (is_uploaded_file($_FILES['file-upload']['tmp_name'])) {
        $target_dir = "../SignUp/uploads/";
        $target_file = $target_dir . basename($_FILES["file-upload"]["name"]);
        $ImageName = basename($_FILES["file-upload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        /*************tazbeet edit image********************/
        $update_date =  date('m-d-Y-h-i-sa');
        //"_" . $update_date .
        $newfilename = $email . $update_date .  "." . $imageFileType;
        /*echo "$newfilename";
            exit();*/
        $target_file = $target_dir . $newfilename;

        if (move_uploaded_file($_FILES["file-upload"]["tmp_name"], $target_file)) {
            $sql_query_story = "UPDATE service_provider SET image='$newfilename', update_date_time=NOW() WHERE email='$email'";
            $result_11 = mysqli_query($mysqli, $sql_query_story);
        } else {
            echo "Upload failed";
        }
    }

    $query = "UPDATE service_provider SET name='$name', phone_num='$phonenum', password='$password',
            story='$story', profession='$profession', city='$city', district='$district', update_date_time=now() 
             WHERE email='$email'";

    $query_run = mysqli_query($mysqli, $query);

    if ($query_run) {
        $_SESSION['success'] = "Service Provider Profile is Updated Successfully";
        $_SESSION['status_code'] = "success";
        header('Location: service_provider.php');
    } else {
        $_SESSION['status'] = "Service Provider Profile Profile is Not Updated";
        $_SESSION['status_code'] = "error";
        header('Location: service_provider.php');
    }
}






/* -------------------------- Service Provider Delete Profile -----------------------  */
if (isset($_POST['service_provider_delete_btn'])) {
    $email_pri = $_POST['delete_email_pri'];

    $query = "DELETE FROM service_provider WHERE email='$email_pri' ";
    $query_run = mysqli_query($mysqli, $query);

    if ($query_run) {
        $_SESSION['success'] = "Service Provider Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: service_provider.php');
    } else {
        $_SESSION['status'] = "Service Provider Data is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: service_provider.php');
    }
}






/* -------------------------- Delete Contact Us Messages -----------------------  */
if (isset($_POST['messages_delete_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM contact_us WHERE inquiry_id='$id' ";
    $query_run = mysqli_query($mysqli, $query);


    if ($query_run) {
        $_SESSION['success'] = "Message is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: messages.php');
    } else {
        $_SESSION['status'] = "Message is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: messages.php');
    }
}


/* -------------------------- edit Contact Us Messages status -----------------------  */
if (isset($_POST['messages_edit_btn'])) {
    $id = $_POST['edit_id'];

    $qry = "SELECT * FROM contact_us WHERE inquiry_id='$id'";
    $qry_run = mysqli_query($mysqli, $qry);
    $result = mysqli_fetch_array($qry_run);

    if ($result['inquiry_status'] == 'READ') {
        $query = "UPDATE contact_us SET inquiry_status='UNREAD' WHERE inquiry_id='$id'";
        $query_run = mysqli_query($mysqli, $query);
    } else {
        $query = "UPDATE contact_us SET inquiry_status='READ' WHERE inquiry_id='$id'";
        $query_run = mysqli_query($mysqli, $query);
    }


    if ($query_run) {
        $_SESSION['success'] = "Message Status is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: messages.php');
    } else {
        $_SESSION['status'] = "Message Status is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: messages.php');
    }
}


/* -------------------------- Reviews -----------------------  */
if (isset($_POST['reviews_delete_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM reviews WHERE review_id='$id' ";
    $query_run = mysqli_query($mysqli, $query);

    if ($query_run) {
        $_SESSION['success'] = "Review is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: reviews.php');
    } else {
        $_SESSION['status'] = "Review is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: reviews.php');
    }
}
