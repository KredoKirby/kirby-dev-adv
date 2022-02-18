<?php
    require_once "../classes/Products.php";
    
    $products = new Products;

    $products->deleteProduct($_GET['product_id']);
?>