<?php
session_start();
if (isset($_GET['proid']) && !empty($_GET['proid'])) {
    extract($_GET);
    require_once '../connection.php';
    if ($_GET['proid'] == $_SESSION['user_id']) {
        // go to my profile
        if ($_SESSION['role_id'] == 2) {
            //  am a freelacer 
            header('location:freelancer/fminepro.php?proid=' . $_GET['proid']);
        } else {
            // am an orginization
            header('location:orga/minepro.php?proid=' . $_GET['proid']);
        }
    } else {
        // i need to go to others profile
        $query = "Select * from `user` where id = $proid";
        $res = $conn->query($query);
        $row = $res->fetch_assoc();
        if ($row['role'] == 2) {
            // he is a freelancer
            header('location:freelancer/fotherpro.php?proid=' . $_GET['proid']);
        } else {
            // it is an orginization;
            header('location:orga/otherpro.php?proid=' . $_GET['proid']);
        }
    }
} else {
    // header('location:index.php');
}
