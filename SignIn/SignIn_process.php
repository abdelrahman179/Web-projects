<?php
session_start();
/* Validation */
$error_fields = array(); // hold errors
if (!(isset($_POST['email']) && !empty($_POST['email']))) {
  $error_fields[] = "email";
}
if (!(isset($_POST['password']) && strlen($_POST['password']) > 5)) {
  $error_fields[] = "password";
}
if ($error_fields) {
  // redirect to login.php page and specify the error
  header("location: signIn.php? error_fields=" . implode(",", $error_fields));
  // stop the script
  exit;
}
$email = $_POST['email'];
$password = $_POST['password'];
include("../config.php");
$sql_query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($mysqli, $sql_query);
$result_arr = mysqli_fetch_array($result);
//print_r($result_arr);
if (isset($result_arr)) {
  if (($email == $result_arr['email']) && ($password == $result_arr['password'])) {
    // keep id
    $_SESSION['service_provider'] = $result_arr['service_provider'];
    $_SESSION['email'] = $result_arr['email'];
    echo "<script>
                    window.location.href='../home/home.php';
                    </script>";
    exit();
  } else {
    echo "<script>
                    alert('Invalid email or password');
                    window.location.href='SignIn.php';
                  </script>";
    exit();
  }
} else {
  $sql_query = "SELECT * FROM service_provider WHERE email='$email'";
  $result = mysqli_query($mysqli, $sql_query);
  $result_arr = mysqli_fetch_array($result);
  if (isset($result_arr)) {
    if (($email == $result_arr['email']) && ($password == $result_arr['password'])) {
      // keep id
      $_SESSION['service_provider'] = $result_arr['service_provider'];
      $_SESSION['email'] = $result_arr['email'];
      echo "<script>
                          window.location.href='../home/home.php';
                          </script>";
      exit();
    } else {
      echo "<script>
                            alert('Invalid email or password');
                            window.location.href='SignIn.php';
                          </script>";
      exit();
    }
  } else {
    echo "<script>
          alert('Invalid email or password');
                  window.location.href='SignIn.php';
                </script>";
    exit();
  }
}
