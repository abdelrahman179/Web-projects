/******************************************************************************/
/* Author : AbdElrahman Ibrahim Zaki                                          */
/* Desc : Todo List sign up program file                                      */
/******************************************************************************/
  <?php
      /* Validation */
      $error_fields = array(); // hold errors 
      if(! (isset($_POST['username']) && !empty($_POST['username'])))
      {
          $error_fields[] = "username";
      }
      if(! (isset($_POST['password']) && strlen($_POST['password']) > 5 ))
      {
          $error_fields[] = "password";
      }
      if($error_fields)
      {
          // redirect to signup.php page and specify the error
          header("location: signUp.php? error_fields=".implode(",",$error_fields));
          // stop the script
          exit;
      }

      $username = $_POST['username']; 
      $password = $_POST['password'];
      // Check if the user name is already exists in DB
      $sql_Q = "SELECT Username FROM administrator WHERE Username='$username'";
      include("config_login.php");
      $result_1 = mysqli_query($mysqli, $sql_Q);
      $admin_data = mysqli_fetch_array($result_1);
      if(isset($admin_data))
      {
        echo "<script>
              alert('Username is already exists');
              window.location.href='signUp.php';
              </script>";
              exit();
      }


      $sql_query = "INSERT INTO administrator(Username,Password) VALUES('$username','$password')";
      $result_2 = mysqli_query($mysqli, $sql_query);
      if(isset($result_2))
      {
        echo "<script>
              window.location.href='signIn.php';
            </script>";
            exit();
      }else
      {
        echo "<script>
              alert('invalid query');
              window.location.href='signUp.php';
            </script>";
            exit();
      }
        
	?>
