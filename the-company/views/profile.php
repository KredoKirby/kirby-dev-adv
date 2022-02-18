<?php
    session_start();

    require_once "../classes/User.php";

    $user = new User;

    $user_details = $user->getSpecificUser($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="dashboard.php" class="navbar-brand">
            <h3>The Company</h3>
        </a>
        <div class="ms-auto">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="profile.php" class="nav-link"><?= $_SESSION['username']?></a></li>
                <li class="nav-item"><a href="../actions/logout.php" class="nav-link text-danger">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid mt-5">
        <div class="card w-25 mx-auto my-auto">
            <img src="../assets/images/<?= $user_details['photo']?>" alt="Profile Picture" class="card-img-top">

            <div class="card-body">
                <form action="../actions/upload-photo.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="image" id="image" class="form-control mb-2" required>
                    <button type="submit" class="btn btn-secondary form-control">Upload</button>
                </form>
            </div>

            <div class="card-footer">
                <h1 class="display-5 fw-bold"><?= $user_details['username']?></h1>
                <h1 class="display-6 text-capitalize"><?= $user_details['first_name']." ".$user_details['last_name']?></h1>
            </div>
        </div>
    </div>
</body>
</html>