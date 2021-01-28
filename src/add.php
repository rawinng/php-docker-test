<?php
    include_once './product-db.php';
    
    // response header
    header("Content-Type: application/json");
    
    // read input from POST
    $json_str = file_get_contents("php://input");
    
    // decode
    $json = json_decode($json_str);

    $productDB = new ProductDb;
    $productDB->insert($json);
    
    // encode before return
    echo json_encode($json);
?>