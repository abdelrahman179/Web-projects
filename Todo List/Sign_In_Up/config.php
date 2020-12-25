/******************************************************************************/
/* Author : AbdElrahman Ibrahim Zaki                                          */
/* Desc : Todo List database connection configuration                         */
/******************************************************************************/

<?php 

$db_Host = 'localhost';
$db_Name = 'admin';
$db_userName = 'root';
$db_password = '';

/* Connect to database */
$mysqli = mysqli_connect($db_Host, $db_userName, $db_password, $db_Name);




?> 
