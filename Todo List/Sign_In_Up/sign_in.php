/******************************************************************************/
/* Author : AbdElrahman Ibrahim Zaki                                          */
/* Desc : Todo List sign in program file                                      */
/******************************************************************************/

<?php 
// check for errors
$errors_arr = array();
// check if errors occure from redirect process
if(isset($_GET['error_fields']))
{   // convert errors to an array
    $errors_arr = explode(",", $_GET['error_fields']);
}
?>
<html lang="en">
<head>
    <style>
            @charset "utf-8";
            @import url(http://weloveiconfonts.com/api/?family=fontawesome);

            [class*="fontawesome-"]:before 
            {
                font-family: 'FontAwesome', sans-serif;
            }
            body {
                background: white;
                color: white;
                font: 87.5%/1.5em 'Open Sans', sans-serif;
                margin: 0;
            }
            p {
                line-height: 1.5em;
            }
            after { clear: both; }
            .login {
                margin: 50px auto;
                width: 320px;
            }
            .login form {
                margin: auto;
                padding: 22px 22px 22px 22px;
                width: 100%;
                border-radius: 5px;
                background: -webkit-linear-gradient(left, #4d445f, #806f76);
                /* border-top: 3px solid #d3d3d3;
                border-bottom: 3px solid #fcfcfc; */
            }
            .login form span {
                background-color: #363b41;
                border-radius: 3px 0px 0px 3px;
                border-right: 3px solid #434a52;
                color: #141313;
                display: block;
                float: left;
                line-height: 50px;
                text-align: center;
                width: 50px;
                height: 50px;
            }
            .login form input[type="text"], input[type="password"] {
                background-color: #fff;
                border-radius: 0px 3px 3px 0px; 
                color: #141313;
                margin-bottom: 1em;
                padding: 0 16px;
                width: 100%;
                height: 50px;
            }
            .login form input[type="submit"] {
                background: #6c7986;
                border: 0;
                width: 100%;
                height: 40px;
                border-radius: 3px;
                color: white;
                cursor: pointer;
                transition: background 0.3s ease-in-out;
            }
            #login form input[type="submit"]:hover {
                background: #b3b1bb;
            }
            #signup_btn{
                background: #36282e;    
                border: 0;
                width: 100%;
                height: 40px;
                border-radius: 3px;
                color: white;
                cursor: pointer;
                transition: background 0.3s ease-in-out;
            }
    </style>

</head>
<body>
    <div class="login">
        <form name='form-login' method="post" action="login_process.php">
    
            <h1>SIGN IN</h1>
    
            <label for="userName">Username</label>
            <input type="text" id="userName" name="username" placeholder="Username">
            <?php 
            if(in_array("username" , $errors_arr))  
                {
                    echo "<script>
                    alert('Invalid username.');
                    window.location.href='signIn.php';
                    </script>";
                    exit();
                }
            ?>
    
            <label for="userPw">Password</label>
            <input type="password" id= "userPw" name="password" placeholder="Password">
            <?php 
            if(in_array("password" , $errors_arr)) 
               {
                    echo "<script>
                    alert('Wrong password.');
                    window.location.href='signIn.php';
                    </script>";
                    exit();
               } 
            ?>
            <div id="remember">
                <input type="checkbox" value="lsRememberMe" id="rememberMe"
                       style="display: inline-block;"/>
                <label>Remember me</label>
            </div>
            <input type="submit" name="signin" value="Login"/>
            <input id= "signup_btn" type="submit" name="signup" value="SignUp"/>
        </form>
    </div>
</body>
</html>

