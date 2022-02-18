<?php
    include "../classes/User.php";

    // DATA-COLLECTION
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // OBJECT
    $user = new User;

    // METHOD CALL
    $user->createUser($first_name, $last_name, $username, $password);
?>