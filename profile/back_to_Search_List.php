
<?php 

session_start();
$Profession = $_GET['Profession'];
$city = $_GET['City'];
?>

<form name="myform" class="myform" action="../Search_result/sea_result.php" method="post">
    <input type="hidden" name="Profession" value="<?php echo "$Profession"; ?>">
    <input type="hidden" name="City" value="<?php echo "$city"; ?>">
    <button type="submit"></button>
</form>


<script type="text/javascript">document.myform.submit();</script>