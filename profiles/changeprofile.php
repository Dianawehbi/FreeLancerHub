<?php
// $image = 'default';
// this come from the change function 
// this method should take the $file and make all updates 
if (!empty($_FILES['profile_pic']['name'])) {
    require_once '../connection.php';
    session_start();

    $ppict = $_FILES['profile_pic']['name'];
    $extension = pathinfo($ppict, flags: PATHINFO_EXTENSION);
    if ($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg') {
        die('please enter an image !!!');
    }

    if ($_FILES['profile_pic']['size'] > 3 * 1024 * 1024) {
        die('image should be less than 3 MB');
    }

    $id_ = $_SESSION['user_id'];
    $query = "SELECT `profilepic` FROM `user` WHERE id = $id_ ";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    if ($row['profilepic'] != 'default.jpg') {
        // remove the old pic 
        $path_oldpic = "../images/" . $row['profilepic'];
        if (file_exists($path_oldpic)) {
            unlink($path_oldpic);
        }
    }

    // check if its default or no 
    move_uploaded_file($_FILES['profile_pic']['tmp_name'], '../images/' . $ppict);
    $query2 = "UPDATE `user` SET `profilepic`='$ppict' WHERE id= $id_";
    $conn->query($query2);

    echo $ppict;
}
