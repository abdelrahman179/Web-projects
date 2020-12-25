/******************************************************************************/
/* Author : AbdElrahman Ibrahim Zaki                                          */
/* Desc : Todo List get status program file                                   */
/******************************************************************************/


<?php
    session_start();
    $task_id = $_GET['ct'];

    include_once("../signin/config_login.php");
    $query_select = "SELECT task_status FROM task_list WHERE Task_ID=$task_id";
    $result_sel = mysqli_query($mysqli,  $query_select);
    $current_status = mysqli_fetch_array($result_sel);

    //echo $current_status['task_status'];
    if($current_status['task_status'] == 'Not_Completed')
    {
        mysqli_query($mysqli, "UPDATE task_list SET task_status='Completed' WHERE Task_ID=".$task_id."");
    }else{
        mysqli_query($mysqli, "UPDATE task_list SET task_status='Not_Completed' WHERE Task_ID=".$task_id."");
    }

    
    echo "<script> window.location.href='todo.php' </script>"


?>
