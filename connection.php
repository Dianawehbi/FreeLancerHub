<?php
$db_host ='localhost';
$db_username ='root';
$db_pass = '';
$db_name ='freelancerhub';
$conn = new mysqli($db_host, $db_username, $db_pass, $db_name);

if ($conn-> connect_error){
    die('Unable to connect :' . $conn->connect_error);
}

// <?php
// $db_host ='sql309.infinityfree.com';
// $db_username ='if0_37916710';
// $db_pass = '';
// $db_name ='if0_37916710_dbfreehublancer';
// $conn = new mysqli($db_host, $db_username, $db_pass, $db_name);

// if ($conn-> connect_error){
//     die('Unable to connect :' . $conn->connect_error);
// }