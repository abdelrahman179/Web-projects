<?php
include('security.php');
include('database/dbconfig.php');
include('../config.php');
include('includes/header.php');
include('includes/navbar.php');

?>


<!-- <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <label> Name </label>
                        <input type="text" name="name" class="form-control" placeholder="Enter User Name" required="required">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phonenum" class="form-control" placeholder="Enter Phone Number" required="required">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email" required="required">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password" required="required">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <label>Gender:&nbsp; </label>
                        <input type="radio" id="male" name="gender" value="Male" required="required">
                        <span>Male &nbsp;</span>
                        <input type="radio" id="female" name="gender" value="Female" required="required">
                        <span>Female</span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="add_user_btn" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>-->


<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3" style="text-align:center;">
            <?php
            $query = "SELECT * FROM contact_us";
            $query_run = mysqli_query($mysqli, $query);
            $num = mysqli_num_rows($query_run);
            ?>
            <h3 class="m-0 font-weight-bold text-primary"><?php echo $num ?> &nbsp; Contact Us Messages</h3>
        </div>

        <div class="card-body">
            <?php
            if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
                echo '<h2 class="bg-primary text-white"> ' . $_SESSION['success'] . ' </h2>';
                unset($_SESSION['success']);
            }

            if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                echo '<h2 class="bg-danger text-white"> ' . $_SESSION['status'] . ' </h2>';
                unset($_SESSION['status']);
            }
            ?>
            <div class="table-responsive" style="height: 400px;">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align:center; font-size: medium;">
                            <th style="vertical-align: middle;">ID</th>
                            <th style="vertical-align: middle;">User Name</th>
                            <th style="vertical-align: middle;">Phone Number</th>
                            <th style="vertical-align: middle;">Email </th>
                            <th style="vertical-align: middle;">Message</th>
                            <th style="vertical-align: middle;">Date & Time</th>
                            <th style="vertical-align: middle;">Status</th>
                            <th style="vertical-align: middle;">Delete </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                                <tr style="font-size: small; text-align:center; padding: 5px 5px 5px 5px;">
                                    <td style="vertical-align: middle;"><?php echo $row['inquiry_id']; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['name']; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['phone_num']; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['email']; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['message']; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['date_time']; ?></td>
                                    <td style="vertical-align: middle;">
                                        <form action="code.php" method="post">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['inquiry_id']; ?>">
                                            <?php if ($row['inquiry_status'] == 'READ') {
                                            ?>
                                                <button type="submit" name="messages_edit_btn" class="btn btn-success"><i class="far fa-envelope-open"></i></button>
                                            <?php } else {
                                            ?>
                                                <button type="submit" name="messages_edit_btn" class="btn btn-warning"><i class="far fa-envelope"></i></button>
                                            <?php
                                            }
                                            ?>
                                        </form>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <form action="code.php" method="post">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['inquiry_id']; ?>">
                                            <button type="submit" name="messages_delete_btn" class="btn btn-danger"> DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "No Record Found";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <form action="excel.php" method="post" style="text-align:center;">
                <input type="submit" name="export_messages_excel" class="btn btn-primary" value="Export to Excel" />
            </form>
        </div>
    </div>

</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>