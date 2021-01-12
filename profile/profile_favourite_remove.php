<?php 

session_start();
$acc_preview = $_GET['acc'];
include("../config.php");


$QRY = "DELETE FROM favourite 
WHERE user_email = '" . $_SESSION['email'] . "' AND service_provider_email = '" . $acc_preview . "'";

$result_3 = mysqli_query($mysqli, $QRY);

header("location: favourite_list.php");

?>

