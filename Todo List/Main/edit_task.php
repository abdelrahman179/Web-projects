
/******************************************************************************/
/* Author : AbdElrahman Ibrahim Zaki                                          */
/* Desc : Todo List edit task program file                                    */
/******************************************************************************/

<?php
    session_start();
    $task_id = $_GET['et'];
    include_once("../signin/config_login.php");
    $query_select = "SELECT Task_Data FROM task_list WHERE Task_ID=$task_id";
    $result_sel = mysqli_query($mysqli,  $query_select);
    $current_task = mysqli_fetch_array($result_sel);

    //prompt function
    function prompt($prompt_msg)
    {
        echo("<script type='text/javascript'> var answer = prompt('".$prompt_msg."'); </script>");
        $answer = "<script type='text/javascript'> document.write(answer); </script>";
        return($answer);
    }

    $prompt_msg = "Update your task:"." ( ".$current_task['Task_Data'].")";
    // call the input prompt function that return the user answer
    $new_task = prompt($prompt_msg);
    echo $new_task;
    
    echo $task_id;
    $query = "UPDATE task_list SET Task_Data ='$new_task' WHERE Task_ID = $task_id";


    mysqli_query($mysqli, $query);
    echo "<script> window.location.href='todo.php' </script>";

?>
