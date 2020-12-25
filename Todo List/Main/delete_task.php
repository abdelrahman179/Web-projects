/******************************************************************************/
/* Author : AbdElrahman Ibrahim Zaki                                          */
/* Desc : Todo List delete task delete program file                           */
/******************************************************************************/

<?php
    session_start();
    include_once("../signin/config_login.php");
    $task_id = $_GET['dt'];
    mysqli_query($mysqli, "DELETE FROM task_list WHERE Task_ID= '".$task_id."'");

    header('location: todo.php');

?>
