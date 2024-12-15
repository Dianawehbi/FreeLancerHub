<?php
$db_host ='localhost';
$db_username ='root';
$db_pass = '';
$db_name ='freelancerhub';
$conn = new mysqli($db_host, $db_username, $db_pass, $db_name);

if ($conn-> connect_error){
    die('Unable to connect :' . $conn->connect_error);
}