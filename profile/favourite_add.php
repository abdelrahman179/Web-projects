<?php 

session_start();
$acc_preview = $_GET['acc'];
include("../config.php");

$QRY = "INSERT INTO favourite (user_email, service_provider_email, date_time)
        VALUES('" . $_SESSION['email'] . "', '$acc_preview' , NOW())";
$result_3 = mysqli_query($mysqli, $QRY);

header("location: profile_search.php?acc=$acc_preview#come_from_favourite");

?>
