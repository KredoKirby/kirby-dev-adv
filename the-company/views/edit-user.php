<?php
    session_start();

    require_once "../classes/User.php";
    
    $user = new User;
    $user_details = $user->getSpecificUser($_GET['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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
        <div class="card w-25 my-auto mx-auto">
            <div class="card-header bg-white border-0">
                <h1 class="display-6">Edit User</h1>
            </div>
            <div class="card-body">
                <form action="../actions/edit-user.php" method="post">
                    <input type="hidden" name="user_id" value="<?= $_GET['user_id']?>">

                    <div class="row mb-3">
                        <div class="col">
                            <label for="first-name" class="form-label">First Name</label>
                            <input type="text" name="first_name" id="first-name" class="form-control" value="<?= $user_details['first_name']?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="last-name" class="form-label">Last Name</label>
                            <input type="text" name="last_name" id="last-name" class="form-control" value="<?= $user_details['last_name']?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control"
                            value="<?= $user_details['username']?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-success form-control">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>