<?php
include('security.php');
include('database/dbconfig.php');
include('../config.php');

$output = '';


if (isset($_POST['export_admin_excel'])) {
    $sql = "SELECT * FROM register ORDER BY id DESC";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
        $output .= '
            <table class="table" bordered="1">
                <tr>    
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
        ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
                <tr>
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['username'] . '</td>
                    <td>' . $row['email'] . '</td>
                </tr>
            ';
        }
        $output .= '</table>';
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=admins.xls");
        echo $output;
    }
}



if (isset($_POST['export_RegUsers_excel'])) {
    $sql = "SELECT * FROM users";
    $result = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) > 0) {
        $output .= '
            <table class="table" bordered="1">
                <tr>    
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Registeration Date/Time</th>
                    <th>Last Profile Update Date/Time</th>                  
                </tr>
        ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
            <tr>
                <td>' . $row['name'] . '</td>
                <td>' . $row['phone_num'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['gender'] . '</td>
                <td>' . $row['register_date_time'] . '</td>
                <td>' . $row['update_date_time'] . '</td>
            </tr>
            ';
        }
        $output .= '</table>';
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=Reg_users.xls");


        echo $output;
    }
}




if (isset($_POST['export_SP_excel'])) {
    $sql = "SELECT * FROM service_provider";
    $result = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) > 0) {
        $output .= '
            <table class="table" bordered="1">
                <tr>    
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Profession</th>
                    <th>City</th>
                    <th>District</th>
                    <th>Experience</th>
                    <th>Registeration Date/Time</th>
                    <th>Last Profile Update Date/Time</th>
                </tr>
        ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
                <tr>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['phone_num'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['gender'] . '</td>
                    <td>' . $row['profession'] . '</td>
                    <td>' . $row['city'] . '</td>
                    <td>' . $row['district'] . '</td>
                    <td>' . $row['story'] . '</td>
                    <td>' . $row['register_date_time'] . '</td>
                    <td>' . $row['update_date_time'] . '</td>
                </tr>
            ';
        }
        $output .= '</table>';
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=Service_Providers.xls");
        echo $output;
    }
}




if (isset($_POST['export_reviews_excel'])) {
    $sql = "SELECT * FROM reviews";
    $result = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) > 0) {
        $output .= '
            <table class="table" bordered="1">
                <tr>    
                    <th>ID</th>
                    <th>Reviewer Name</th>
                    <th>Reviewer Email</th>
                    <th>Service Provider Email</th>
                    <th>Review</th>
                    <th>Date/Time</th>
                </tr>
        ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
                <tr>
                    <td>' . $row['review_id'] . '</td>
                    <td>' . $row['reviewer_name'] . '</td>
                    <td>' . $row['reviewer_email'] . '</td>
                    <td>' . $row['service_provider_email'] . '</td>
                    <td>' . $row['review_desc'] . '</td>
                    <td>' . $row['date_time'] . '</td>
                </tr>
            ';
        }
        $output .= '</table>';
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=Reviews.xls");
        echo $output;
    }
}




if (isset($_POST['export_messages_excel'])) {
    $sql = "SELECT * FROM contact_us";
    $result = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) > 0) {
        $output .= '
            <table class="table" bordered="1">
                <tr>    
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Message Status</th>
                    <th>Date/Time</th>                  
                </tr>
        ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
                <tr>
                    <td>' . $row['inquiry_id'] . '</td>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['phone_num'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['message'] . '</td>
                    <td>' . $row['inquiry_status'] . '</td>
                    <td>' . $row['date_time'] . '</td>
                </tr>
            ';
        }
        $output .= '</table>';
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=Messages.xls");
        echo $output;
    }
}
