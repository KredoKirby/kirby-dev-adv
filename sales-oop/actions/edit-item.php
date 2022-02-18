<?php
    require_once "../classes/Products.php";

    $products = new Products;
    
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    $products->updateProduct($product_id, $product_name, $product_price);
?>