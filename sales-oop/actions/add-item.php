<?php
    require_once "../classes/Products.php";

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    $products = new Products;
    $products->addProduct($product_name, $product_price);
?>