/******************************************************************************/
/* Author : AbdElrahman Ibrahim Zaki                                          */
/* Desc : Todo List main file                                                 */
/******************************************************************************/
<?php
    session_start();
    //get username from signIn page and get its id
    include_once("../signin/config_login.php");
    $query = "SELECT Username FROM administrator WHERE id = '".$_SESSION['ID']."'";
    $result = mysqli_query($mysqli, $query);
    $admin_data = mysqli_fetch_array($result);
    $username = $admin_data['Username'];
    echo "<div class=greetings>
            <a href='../signin/signIn.php' class=logout>logout</a> 
            Welcome: $username </div> ";
    $errors_arr = array();
    // check if errors occure from redirect process
    if(isset($_GET['error_fields']))
    {   // convert errors to an array
        $errors_arr = explode(",", $_GET['error_fields']);
    }

 ?>
<html>
<head>  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <style>
            body {
            margin: 0;
            min-width: 250px;
            }

            /* Include the padding and border in an element's total width and height */
            * {
            box-sizing: border-box;
            }

            /* Remove margins and padding from the list */
            ul {
            margin: auto;
            padding: 0;
            width: 70%;
            }

            /* Style the list items */
            ul li {
            /*cursor: pointer;*/
            position: relative;
            padding: 12px 8px 12px 40px;
            list-style-type: none;
            background: #eee;
            font-size: 20px;
            font-family:'Calibri';
            transition: 0.2s;
            
            /* make the list items unselectable */
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            }

            /* Set all odd list items to a different color (zebra-stripes) */
            ul li:nth-child(odd) {
            background: #F5F5DC;
            }

            .date_time{
                text-align: right;
                font-size: 15px;
                font-weight: bold;
                font-family:'Calibri';
            }

            /* Darker background-color on hover */
            ul li:hover {
            background: #ddd;
            }

            /* When clicked on, add a background color and strike out text */
            .task_data{
                color: black;
                text-decoration: line-through;
            }

            .dropbtn {
                background-color: #E91E63;
                color: white;
                padding: 10px;
                font-size: 15px;
                font-family:'Calibri';
                border: none;
                border-radius: 4px;
            }

            .dropdown {
                position: relative;
                left:0;
                display: inline-block;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #E6E6FA;
                font-size: 15px;
                font-family:'Calibri';
                min-width: 120px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
            }

            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            .dropdown-content a:hover {background-color: #f1f1f1}

            .dropdown:hover .dropdown-content {
                display: block;
            }

            .dropdown:hover .dropbtn {
                background-color: #FA8072;
            }
            

            .greetings{
                background-color: #806f76;
                padding: 20px 40px;
                color: white;
                text-align: center;
                width: 30%;
                border-radius: 4px;
                margin:auto;
                font-size: 20px;
                font-family:'Calibri';
            }   
            .logout{
                margin: auto;
                padding: 12px 16px 12px 16px;
                background-color: #E91E63;
                color: white;
                font-size: 15px;
                font-family:'Calibri';
                font-weight: bold;
                border-radius: 4px;
                cursor: pointer;
            }
            .logout:hover {background-color: #FFB6C1;}
            
            /* Style the header */
            .header {
            background-color: #4d445f;
            padding: 10px 40px;
            color: white;
            text-align: center;
            width: 70%;
            border-radius: 4px;
            margin:auto;
            }
            /* Clear floats after the header */
            .header:after {
            content: "";
            display: table;
            clear: both;
            }

            .task_header{
                margin:2px;
                font-size: 30px;
                font-family:'Calibri';
            }
            /* Style the input */
            input {
            margin: 0;
            border: none;
            border-radius: 0;
            width: 75%;
            padding: 10px;
            float: left;
            border-radius: 4px;
            font-size: 16px;
            }

            /* Style the "Add" button */
            .addBtn {
            padding: 10px;
            width: 25%;
            background: #E91E63;
            color: white;
            float: left;
            text-align: center;
            font-size: 15px;
            font-family:'Calibri';
            cursor: pointer;

            border-radius: 4px;
            }

            .addBtn:hover {
            background-color: #FFB6C1;
            }

    </style>
</head>
<body>
    
    <div id="myDIV" class="header">
        <h2 class="task_header">To Do List</h2>
        <form method='post' action='add_process.php' >
            <input type="text" id="myInput" name="add_task" placeholder="Add new task...">
            <?php if(in_array("add_task" , $errors_arr)) echo "<script> alert('Enter a task')</script>"?>
            <!-- document holds all page forms in a type of an array, [0] since we have one form -->
            <span onclick="document.forms[0].submit()" class="addBtn">Add</span>
        </form>
    </div>
        <ul id="myUL">
        
    <?php
        $query = "SELECT * FROM task_list WHERE User_ID='".$_SESSION['ID']."'";
        $result = mysqli_query($mysqli, $query);
        while($tasks = mysqli_fetch_array($result))
        {
            if($tasks['task_status'] == 'Not_Completed')
            {
             date_default_timezone_set("Africa/Cairo");
             echo "<li>
             <div class=dropdown>
                    <button class=dropbtn><i class='fas fa-align-justify'></i></button>
                    <div class=dropdown-content>
                    
                    <a href='status.php?ct=".$tasks['Task_ID']."'><i class='far fa-envelope-open' style='font-size:12px'></i>  Completed</a>
                    
                    <a href='edit1.php?et=".$tasks['Task_ID']."'><i class='fas fa-pencil-alt' style='font-size:12px'></i>  Edit</a>
                    
                    <a href='delete.php?dt=".$tasks['Task_ID']."'><i class='far fa-trash-alt' style='font-size:12px'></i>  Delete</a> 
            </div></div>  
            ".$tasks['Task_Data']." <div class=date_time>".$tasks['Date']." </div></li>  ";
            }else{
                echo "<li>
             <div class=dropdown>
                    <button class=dropbtn><i class='fas fa-align-justify'></i></button>
                    <div class=dropdown-content>
                    
                    <a href='status.php?ct=".$tasks['Task_ID']."'><i class='far fa-envelope-open' style='font-size:12px'></i>  Completed</a>
                    
                    <a href='edit.php?et=".$tasks['Task_ID']."'><i class='fas fa-pencil-alt' style='font-size:12px'></i>  Edit</a>
                    
                    <a href='delete.php?dt=".$tasks['Task_ID']."'><i class='far fa-trash-alt' style='font-size:12px'></i>  Delete</a> 
            </div></div>  
            <span class=task_data>".$tasks['Task_Data']." </span><div class=date_time>".date("Y.m.d")." - ".date("h:i:sa")." </div></li>";
            }
            
        }
    ?>
        </ul>
</body>
</html>
