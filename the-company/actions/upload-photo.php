<?php
    session_start();

    require_once "../classes/User.php";

    $user_id = $_SESSION['user_id'];
    $image_name = $_FILES['image']['name']; // photo.jpg
    $tmp_name = $_FILES['image']['tmp_name']; // C:\xampp\tmp\php123.tmp

    $user = new User;
    $user->uploadPhoto($user_id, $image_name, $tmp_name);
?>