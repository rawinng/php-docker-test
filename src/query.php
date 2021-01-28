<?php
    include_once './product-db.php';
    
    // response header
    header("Content-Type: application/json");
    
    $productDB = new ProductDb;
    $result = $productDB->queryAll();
    
    // encode before return
    echo json_encode($result);
?>