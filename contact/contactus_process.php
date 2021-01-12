
  <?php
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
  if (!(isset($_POST['message']) && !empty($_POST['message']))) {
    $error_fields[] = "message";
  }
  if ($error_fields) {
    // redirect to signup.php page and specify the error
    header("location: contact.php? error_fields=" . implode(",", $error_fields));
    // stop the script
    exit;
  }

  $fullname = $_POST['fullname'];
  $phonenum = $_POST['phonenum'];
  $email = $_POST['email'];
  $msg = $_POST['message'];

  include("../config.php");
  $sql_query = "INSERT INTO Contact_us(name,phone_num,email,message,date_time) VALUES('$fullname','$phonenum','$email','$msg',NOW())";
  $result_2 = mysqli_query($mysqli, $sql_query);

  if (isset ($_POST['send']))
      {
        require_once "Mail.php";
        $username = '5lsana2021@gmail.com';
        $password = '#asdf1234#';
        $smtpHost = 'ssl://smtp.gmail.com';
        $smtpPort ='465';
        $to = '5lsana2021@gmail.com';
        $from = '5lsana2021@gmail.com';

        $fullname = $_POST['fullname']; 
        $phonenum = $_POST['phonenum'];
        $email = $_POST['email'];
        $msg = $_POST['message'];
        $successMessage = 'Message sent successfully!';

        // include("config.php");

       $headers = array(
        'From' => $fullname . " <" . $from . ">",
        'To' => $to,
        'Subject' => $email
         );
       $smtp = Mail::factory('smtp', array(
        'host' => $smtpHost,
        'port' => $smtpPort,
        'auth' => true,
        'username' => $username,
        'password' => $password
        ));

        $mail = $smtp->send($to, $headers, $msg);

        if (PEAR::isError($mail)) {
        echo($mail->getMessage());
        } else {
        //echo ("<div class='success'>". $successMessage."</div>");
        }
      }
      
  if (isset($result_2)) {
    echo "<script>
               alert('تم ارسال الرسالة بنجاح');
               window.location.href='contact.php';
              </script>";
    exit();
  } else {
    echo "<script>
                alert('invalid query');
                window.location.href='contact.php';
              </script>";
    exit();
  }

  ?>