<?php
    session_start();

    require_once "../classes/User.php";

    $user = new User;

    $user_list = $user->getUsers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    <div class="container mt-5">
        <table class="table table-hover">
            <thead class="table-dark">
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                    foreach($user_list as $user){
                ?>
                    <tr>
                        <td><?= $user['id']?></td>
                        <td><?= $user['first_name']?></td>
                        <td><?= $user['last_name']?></td>
                        <td><?= $user['username']?></td>
                        <td>
                            <a href="edit-user.php?user_id=<?= $user['id']?>" class="btn btn-outline-warning"><i class="fas fa-pencil-alt"></i></a>
                            <a href="../actions/delete-user.php?user_id=<?= $user['id']?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>