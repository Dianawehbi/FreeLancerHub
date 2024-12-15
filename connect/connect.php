<?php

session_start();

if ($_SESSION['isLoggedin'] == 1) {
    if (isset($_GET['taskid']) && !empty($_GET['taskid'])) {
        require_once '../connection.php';
        $taskid = $_GET['taskid'];
        $freelancerid = $_SESSION['user_id'];

        $query = "INSERT INTO `tasksdone`(`id`, `freelancer_id`, `task_id`, `review`) 
        VALUES (null,$freelancerid,$taskid,2)";
        echo $query;
        if($conn->query($query)){
            header('location:../profiles/logicprofile.php?id=' . $freelancerid);
        }
    }
} else {
    header('location:../index.php');
}
