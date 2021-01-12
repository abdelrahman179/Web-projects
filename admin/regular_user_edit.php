<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
include('database/dbconfig.php');
include('../config.php');

?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Edit User Profile </h6>
        </div>
        <div class="card-body">
            <?php

            if (isset($_POST['edit_btn'])) {
                $email = $_POST['edit_email_pri'];

                $query = "SELECT * FROM users WHERE email='$email' ";
                $query_run = mysqli_query($mysqli, $query);

                foreach ($query_run as $row) {
            ?>

                    <form action="code.php" method="POST">

                        <input type="hidden" name="edit_email_pri" value="<?php echo $row['email']; ?>">

                        <div class="form-group">
                            <label> User Name </label>
                            <input type="text" name="edit_username" value="<?php echo $row['name']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Phone Number </label>
                            <input type="text" name="edit_phonenum" value="<?php echo $row['phone_num']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="edit_password" value="<?php echo $row['password']; ?>" class="form-control">
                        </div>

                        <a href="regular_users.php" class="btn btn-danger"> CANCEL </a>
                        <button type="submit" name="regular_user_updatebtn" class="btn btn-primary"> Update </button>

                    </form>
            <?php
                }
            } 
            ?>
        </div>
    </div>
</div>

</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>