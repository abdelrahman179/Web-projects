<?php
include('security.php');
include('database/dbconfig.php');
include('../config.php');
include('includes/header.php');
include('includes/navbar.php');



$user_type = null;
if (isset($_POST['search_btn'])) {
    $search_str = $_POST['search_profile'];

    $email_1_query = "SELECT * FROM service_provider WHERE email='$search_str' ";
    $email_SP_query_run = mysqli_query($mysqli, $email_1_query);

    $email_2_query = "SELECT * FROM users WHERE email='$search_str' ";
    $email_reg_query_run = mysqli_query($mysqli, $email_2_query);

    $email_3_query = "SELECT * FROM register WHERE email='$search_str' ";
    $email_admin_query_run = mysqli_query($connection, $email_3_query);

    if (mysqli_num_rows($email_SP_query_run) > 0) {
        $user_type = 'Service Provider';
        $SP_row = mysqli_fetch_assoc($email_SP_query_run);
    } elseif (mysqli_num_rows($email_reg_query_run) > 0) {
        $user_type = 'Regular User';
        $Reg_row = mysqli_fetch_assoc($email_reg_query_run);
    } elseif (mysqli_num_rows($email_admin_query_run) > 0) {
        $user_type = 'Administrator';
        $admin_row = mysqli_fetch_assoc($email_admin_query_run);
    } else {
        $user_type = 'No Result';
    }
}

?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $user_type; ?> &nbsp;
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align:center; font-size: medium;">
                            <?php if ($user_type == 'Service Provider') {
                                echo "       
                                <th style='vertical-align: middle;'>Edit </th>
                                <th style='vertical-align: middle;'>Delete </th>
                                <th style='vertical-align: middle;'>Image</th>
                                <th style='vertical-align: middle;'>SP Name </th>
                                <th style='vertical-align: middle;'>Phone Number </th>
                                <th style='vertical-align: middle;'>Email </th>
                                <th style='vertical-align: middle;'>Password</th>
                                <th style='vertical-align: middle;'>Gender</th>
                                <th style='vertical-align: middle;'>Profession</th>
                                <th style='vertical-align: middle;'>City</th>
                                <th style='vertical-align: middle;'>District</th>
                                <th style='vertical-align: middle;'>SP Story</th>
                                <th style='vertical-align: middle;'>Registeration Time</th>
                                <th style='vertical-align: middle;'>Last Update Time</th>
                                        ";
                            } elseif ($user_type == 'Regular User') {
                                echo "
                                <th style='vertical-align: middle;'>Username </th>
                                <th style='vertical-align: middle;'>Phone Number </th>
                                <th style='vertical-align: middle;'>Email </th>
                                <th style='vertical-align: middle;'>Password</th>
                                <th style='vertical-align: middle;'>Gender</th>
                                <th style='vertical-align: middle;'>Registeration Time</th>
                                <th style='vertical-align: middle;'>Last Update Time</th>
                                <th style='vertical-align: middle;'>Edit </th>
                                <th style='vertical-align: middle;'>Delete </th>
                                ";
                            } elseif ($user_type == 'Administrator') {
                                echo "
                                <th style='vertical-align: middle;'> ID </th>
                                <th style='vertical-align: middle;'> Username </th>
                                <th style='vertical-align: middle;'>Email </th>
                                <th style='vertical-align: middle;'>Password</th>
                                <th style='vertical-align: middle;'>Edit </th>
                                <th style='vertical-align: middle;'>Delete </th>
                                ";
                            } else {
                                echo "<th style='text-align: center; font-weight: bold; '> <h2> Search Result </h2> </th>";
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="font-size: small; text-align:center">
                            <?php if ($user_type == 'Regular User') {
                                echo "       
                                <td style='vertical-align: middle;'>" . $Reg_row['name'] . "</td>
                                <td style='vertical-align: middle;'>" . $Reg_row['phone_num'] . " </td>
                                <td style='vertical-align: middle;'>" . $Reg_row['email'] . " </td>
                                <td style='vertical-align: middle;'>" . $Reg_row['password'] . "</td>
                                <td style='vertical-align: middle;'>" . $Reg_row['gender'] . "</td>
                                <td style='vertical-align: middle;'>" . $Reg_row['register_date_time'] . "</td>
                                <td style='vertical-align: middle;'>" . $Reg_row['update_date_time'] . " </td>
                                <td style='vertical-align: middle;'>
                                    <form action='regular_user_edit.php' method='post'>
                                        <input type='hidden' name='edit_email_pri' value='" . $Reg_row['email'] . "'>
                                        <button type='submit' name='edit_btn' class='btn btn-success'> EDIT</button>
                                    </form>
                                </td>
                                <td style='vertical-align: middle;'>
                                    <form action='code.php' method='post'>
                                        <input type='hidden' name='delete_email_pri' value='" . $Reg_row['email'] . "'>
                                        <button type='submit' name='reg_user_delete_btn' class='btn btn-danger'> DELETE</button>
                                    </form>
                                </td>
                                        ";
                            } elseif ($user_type == 'Administrator') {
                                echo "       
                                <td style='vertical-align: middle;'>" . $admin_row['id'] . "</td>
                                <td style='vertical-align: middle;'>" . $admin_row['username'] . "</td>
                                <td style='vertical-align: middle;'>" . $admin_row['email'] . " </td>
                                <td style='vertical-align: middle;'>" . $admin_row['password'] . "</td>
                                <td style='vertical-align: middle;'>
                                    <form action='user_edit.php' method='post'>
                                        <input type='hidden' name='edit_id' value='" . $admin_row['id'] . "'>
                                        <button type='submit' name='edit_btn' class='btn btn-success'> EDIT</button>
                                    </form>
                                </td>
                                <td style='vertical-align: middle;'>
                                    <form action='code.php' method='post'>
                                        <input type='hidden' name='delete_id' value='" . $admin_row['id'] . "'>
                                        <button type='submit' name='delete_btn' class='btn btn-danger'> DELETE</button>
                                    </form>
                                </td>
                                        ";
                            }elseif ($user_type == 'Service Provider') {
                                echo "
                                <td style='vertical-align: middle;'>
                                    <form action='service_provider_edit.php' method='post'>
                                        <input type='hidden' name='edit_email_pri' value='" . $SP_row['email'] . "'>
                                        <button type='submit' name='edit_btn' class='btn btn-success'> EDIT</button>
                                    </form>
                                </td>
                                <td style='vertical-align: middle;'>
                                    <form action='code.php' method='post'>
                                        <input type='hidden' name='delete_email_pri' value='" . $SP_row['email'] . "'>
                                        <button type='submit' name='service_provider_delete_btn' class='btn btn-danger'> DELETE</button>
                                    </form>
                                </td>
                                <td style='vertical-align: middle;'><img src='../SignUp/uploads/" . $SP_row['image'] . "' alt='Portfolio Image' style='height:70px; width:70px; border-radius:30px;'></td>
                                <td style='vertical-align: middle;'>" . $SP_row['name'] . "</td>
                                <td style='vertical-align: middle;'>" . $SP_row['phone_num'] . " </td>
                                <td style='vertical-align: middle;'>" . $SP_row['email'] . " </td>
                                <td style='vertical-align: middle;'>" . $SP_row['password'] . "</td>
                                <td style='vertical-align: middle;'>" . $SP_row['gender'] . "</td>
                                <td style='vertical-align: middle;'>" . $SP_row['profession'] . "</td>
                                <td style='vertical-align: middle;'>" . $SP_row['city'] . "</td>
                                <td style='vertical-align: middle;'>" . $SP_row['district'] . "</td>
                                <td style='vertical-align: middle;'>" . $SP_row['story'] . "</td>
                                <td style='vertical-align: middle;'>" . $SP_row['register_date_time'] . "</td>
                                <td style='vertical-align: middle;'>" . $SP_row['update_date_time'] . "</td>
                                ";
                            } else {
                                echo "<td style='text-align: center; color:red;'> <h4> No Result </h4> </td>";
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>