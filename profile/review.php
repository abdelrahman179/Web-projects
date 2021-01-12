<?php 

session_start();
$acc_preview = $_GET['acc'];
$review = $_GET['rev'];


if (isset($_SESSION['service_provider']) && isset($_SESSION['email'])) {
  if ($_SESSION['service_provider'] == "yes") {
    $table_name = "service_provider";
  } else {
    $table_name = "users";
  }
  include("../config.php");
  $sql_query = "SELECT * FROM $table_name WHERE email='" . $_SESSION['email'] . "'";
  $result = mysqli_query($mysqli, $sql_query);
  $result_arr = mysqli_fetch_array($result);
}

include("../config.php");
$QRY = "INSERT INTO reviews (reviewer_name, reviewer_email, service_provider_email, review_desc, date_time)
        VALUES('" . $result_arr['name'] . "','" . $result_arr['email'] . "', '$acc_preview' , '$review' , NOW())";
$result_3 = mysqli_query($mysqli, $QRY);

header("location: profile_search.php?acc=$acc_preview");


?>
