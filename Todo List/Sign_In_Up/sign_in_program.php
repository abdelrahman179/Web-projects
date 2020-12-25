/******************************************************************************/
/* Author : AbdElrahman Ibrahim Zaki                                          */
/* Desc : Todo List sign in program file                                      */
/******************************************************************************/

<?php
      session_start();
      if(isset($_POST['signup']))
      {
        echo "<script>
                window.location.href='signUp.php';
              </script>";
              exit();
      }
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
          // redirect to login.php page and specify the error
          header("location: signIn.php? error_fields=".implode(",",$error_fields));
          // stop the script
          exit;
      }
      $username = $_POST['username']; 
      $password = $_POST['password'];
      $sql_query = "SELECT * FROM administrator WHERE Username='$username'";
      include_once("config_login.php");
      $result = mysqli_query($mysqli, $sql_query);
      $admin_data = mysqli_fetch_array($result);
      if(($username == $admin_data['Username']) && ($password == $admin_data['Password']))
      {
        // keep id 
        $_SESSION['ID'] = $admin_data['id'];
        echo "<script>
              alert('Welcome $username.');
              window.location.href='../todo/todo.php';
              </script>";
              exit();
      }else
      {
        echo "<script>
              alert('Invalid username or password');
              window.location.href='signIn.php';
              </script>";
              exit();
      }
	?>
