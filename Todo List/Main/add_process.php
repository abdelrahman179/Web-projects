/******************************************************************************/
/* Author : AbdElrahman Ibrahim Zaki                                          */
/* Desc : Todo List add task program file                                     */
/******************************************************************************/

<?php
    session_start();
    $error_fields = array(); // hold errors 
    if(! (isset($_POST['add_task']) && !empty($_POST['add_task'])))
        {
            $error_fields[] = "add_task";
        }
    if($error_fields)
    {
        // redirect to form.php page and specify the error
        header("location: todo.php? error_fields=".implode(",",$error_fields));
        // stop the script
        exit;
    }
    include_once("../signin/config_login.php");
    mysqli_query($mysqli, "INSERT INTO task_list (User_ID, Task_Data, Date) VALUES('".$_SESSION['ID']."', '".$_POST['add_task']."', NOW())");
    header('location: todo.php');

?>
