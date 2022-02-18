<?php
    require "../classes/Products.php";

    $products = new Products;
    $product_list = $products->getProducts();
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
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">   
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a href="add-item.php" class="nav-link"><i class="fa-solid fa-square-plus fa-2x text-success"></i></a>
            </li>
        </ul>
    </nav>
    <div class="container mt-5">
        <table class="table w-50 mx-auto table-hover">
            <thead class="table-dark">
                <th>ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                    if(empty($product_list)){
                ?>
                    <tr>
                        <td colspan="4" class="text-danger fw-bold text-center">NO RECORDS FOUND</td>
                    </tr>
                <?php
                    }else{

                        foreach($product_list as $product){
                ?>
                        <tr>
                            <td><?= $product['product_id']?></td>
                            <td><?= $product['product_name']?></td>
                            <td><?= $product['product_price']?></td>
                            <td>
                                <a href="edit-item.php?product_id=<?= $product['product_id']?>" class="btn btn-outline-warning"><i class="fas fa-pencil-alt"></i></a>
                                <a href="../actions/delete-item.php?product_id=<?= $product['product_id']?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>