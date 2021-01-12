
  <?php
  /*****************variables for image*************************/
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["file-upload"]["name"]);
  $ImageName = basename($_FILES["file-upload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));



  /* Validation */
  $error_fields = array(); // hold errors
  if (!(isset($_POST['fullname']) && !empty($_POST['fullname']))) {
    $error_fields[] = "fullname";
  }
  if (!(isset($_POST['phonenum']) && !empty($_POST['phonenum']) && strlen($_POST['phonenum']) == 11)) {
    $error_fields[] = "phonenum";
  }
  if (!(isset($_POST['email']) && filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL))) {
    $error_fields[] = "email";
  }
  if (!(isset($_POST['password']) && !empty($_POST['password']) && strlen($_POST['password']) > 5)) {
    $error_fields[] = "password";
  }
  // Check if image file is a actual image or fake image
  if ($ImageName) {
    $check = getimagesize($_FILES["file-upload"]["tmp_name"]);
    if ($check !== false) {
      /***mime return file extension******/
      //echo "File is an image - " . $check["mime"] . ".";
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
    if ($_FILES["file-upload"]["size"] > 5000000) {
      //echo "Sorry, your file is too large.";
      $error_fields[] = "img_size";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif"
    ) {
      //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $error_fields[] = "img_type";
      $uploadOk = 0;
    }
  }
  /************************************************************************/
  if ($error_fields) {
    // redirect to signup.php page and specify the error
    header("location: SignUp.php? error_fields=" . implode(",", $error_fields));
    // stop the script
    exit;
  }
  /******************get input from user********************/
  $fullname = $_POST['fullname'];
  $phonenum = $_POST['phonenum'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $gender = $_POST['gender'];
  $service_provider = $_POST['service_provider'];

  /*$Category = $_POST['Category'];
  $speciality = $_POST['speciality'];*/
  $Profession = $_POST['Profession'];
  $City = $_POST['City'];
  $district = $_POST['district'];
  $story = $_POST['story'];

  $newfilename = $email . "." . $imageFileType;
  $target_file = $target_dir . $newfilename;
  /*************************************************************************/
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["file-upload"]["tmp_name"], $target_file)) {
      //echo "The file " . htmlspecialchars(basename($_FILES["file-upload"]["name"])) . " has been uploaded.";
    } else {
      //echo "Sorry, there was an error uploading your file.";
    }
  }
  /*****************************************************************************/





  /***********check if this user register before or no*******************/
  include("../config.php");
  $sql_query = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($mysqli, $sql_query);
  $result_arr = mysqli_fetch_array($result);
  /*print_r($result_arr);*/
  //echo "string=$result_arr[email]";
  if (isset($result_arr)) {
  if (isset($result_arr['email']) && $result_arr['email'] == $email) {
    echo "<script>
                alert('بريدك الاليكتروني مسجل عندنا');
                window.location.href='SignUp.php';
              </script>";
    exit();
  }
}
  $sql_query = "SELECT * FROM service_provider WHERE email = '$email'";
  $result = mysqli_query($mysqli, $sql_query);
  $result_arr = mysqli_fetch_array($result);
  //print_r($result_arr);
  //echo "string=$result_arr[email]";
  if (isset($result_arr)) {
  if (isset($result_arr['email']) && $result_arr['email'] == $email) {
    echo "<script>
                alert('بريدك الاليكتروني مسجل عندنا');
                window.location.href='SignUp.php';
              </script>";
    exit();
  }
}
  /***if not register before check  if he is service provider or normal user***/

  if ($service_provider == "no") {
    $sql_query = "INSERT INTO users
        (name,phone_num,email,password,gender,service_provider,date_time)
        VALUES('$fullname','$phonenum','$email','$password','$gender','$service_provider',NOW())";
    $result_2 = mysqli_query($mysqli, $sql_query);
    echo "<script>
               window.location.href='../SignIn/SignIn.php';
              </script>";
    exit();
  } else {
    $sql_query = "INSERT INTO service_provider
        (name,phone_num,email,password,gender,service_provider,date_time,profession,city,district,story,image)
        VALUES('$fullname','$phonenum','$email','$password','$gender','$service_provider',NOW(),
        '$Profession','$City','$district','$story','$newfilename')";
    $result_2 = mysqli_query($mysqli, $sql_query);
    echo "<script>
               window.location.href='../SignIn/SignIn.php';
              </script>";
    exit();
  }

  ?>
