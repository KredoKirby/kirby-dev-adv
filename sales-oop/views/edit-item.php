<?php
    require_once "../classes/Products.php";
    
    $products = new Products;
    $product_details = $products->getSpecificProduct($_GET['product_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT ITEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="dashboard.php" class="nav-link"><i class="fas fa-store fa-2x text-primary"></i></a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid mt-5">
        <div class="card w-25 mx-auto">
            <div class="card-header bg-white border-0">
                <h1 class="display-6 text-center text-uppercase">Edit Item</h1>
            </div>
            <div class="card-body">
                <form action="../actions/edit-item.php" method="post">
                    <input type="hidden" name="product_id" value="<?= $_GET['product_id']?>">

                    <div class="row mb-3">
                        <div class="col">
                            <label for="product-name" class="form-label">Product Name</label>
                            <input type="text" name="product_name" id="product-name" class="form-control" value="<?= $product_details['product_name']?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="product-price" class="form-label">Product Price</label>
                            <input type="text" name="product_price" id="product-price" class="form-control" value="<?= $product_details['product_price']?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-warning form-control">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>