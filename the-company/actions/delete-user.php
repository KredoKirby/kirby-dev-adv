<?php

    require_once "../classes/User.php";

    $user = new User;

    $user->deleteUser($_GET['user_id']);

?>