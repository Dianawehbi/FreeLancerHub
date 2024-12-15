<?php
session_start();
if (isset($_GET['id']) && !empty($_GET['id'])) {
    extract($_GET);
    require_once '../connection.php';
    if ($_GET['id'] == $_SESSION['user_id']) {
        // go to my profile
        if ($_SESSION['role_id'] == 2) {
            //  am a freelacer 
            header('location:freelancer/fminepro.php?id=' . $_GET['id']);
        } else {
            // am an orginization
            header('location:orga/minepro.php?id=' . $_GET['id']);
        }
    } else {
        // i need to go to others profile
        $query = "Select * from `user` where id = $id";
        $res = $conn->query($query);
        $row = $res->fetch_assoc();
        if ($row['role'] == 2) {
            // he is a freelancer
            header('location:freelancer/fotherpro.php?id=' . $_GET['id']);
        } else {
            // it is an orginization;
            header('location:orga/otherpro.php?id=' . $_GET['id']);
        }
    }
} else {
    header('location:index.php');
}
