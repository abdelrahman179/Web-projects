<?php 
session_start();
if (isset($_SESSION['service_provider']) && isset($_SESSION['email'])) {
    if ($_SESSION['service_provider'] == "yes") {
      $table_name = "service_provider";
    } else {
      $table_name = "users";
    }
    include("../config.php");
    $sql_query = "DELETE FROM $table_name WHERE email='".$_SESSION['email']."'";
    mysqli_query($mysqli, $sql_query);
    echo "<script> 
            alert('تم حذف الحساب بنجاح'); 
            window.location.href='../session_distroy.php';
          </script>";
}



?>