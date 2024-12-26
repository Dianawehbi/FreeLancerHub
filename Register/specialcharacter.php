<?php

if (isset($_GET["value"]) && !empty($_GET['value'])) {
    $data = $_GET['value'];
    function  CleanStringInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    echo  CleanStringInput( $data);
}
