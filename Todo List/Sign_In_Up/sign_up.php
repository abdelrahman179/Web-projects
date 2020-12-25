/******************************************************************************/
/* Author : AbdElrahman Ibrahim Zaki                                          */
/* Desc : Todo List sign up UI                                                */
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
        .sign_up {
            margin: 50px auto;
            width: 320px;
        }
        .sign_up form {
            margin: auto;
            padding: 22px 22px 22px 22px;
            width: 100%;
            border-radius: 5px;
            background: -webkit-linear-gradient(left, #4d445f, #806f76);
            /* border-top: 3px solid #d3d3d3;
            border-bottom: 3px solid #fcfcfc; */
        }
        .sign_up form span {
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
        .sign_up form input[type="text"], input[type="password"] {
            background-color: #fff;
            border-radius: 0px 3px 3px 0px; 
            color: #141313;
            margin-bottom: 1em;
            padding: 0 16px;
            width: 100%;
            height: 50px;
        }
        .sign_up form input[type="submit"] {
            background: #207d8a;
            border: 0;
            width: 100%;
            height: 40px;
            border-radius: 3px;
            color: black;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }
        #rgstr_btn{
            background: #9e9fa0;    
            padding: 2px;
        }
    </style>
</head>
<body>
    <div class="sign_up">
        <form name='form-signup' method="post" action="signup_process.php">
    
            <h1>REGISTER</h1>
    
            <label for="name">Username</label>
            <input type="text" id="name" name="username" placeholder="Username">
            <?php 
            if(in_array("username" , $errors_arr))  
                {
                    echo "<script>
                        alert('Invalid username.');
                        window.location.href='signUp.php';
                        </script>";
                        exit();
                }
            ?>
    
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password">
            <?php 
            if(in_array("password" , $errors_arr)) 
               {
                    echo "<script>
                        alert('Please enter a password not less than 6 characters.');
                        window.location.href='signUp.php';
                        </script>";
                        exit();
               } 
            ?>
            <input id="rgstr_btn" type="submit" value="Register">
        </form>
    </div>
</body>
</html>
