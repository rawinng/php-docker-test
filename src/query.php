<?php
    include_once './product-db.php';
    include_once './error.php';
    
    // response header
    header("Content-Type: application/json");
    
    function get() {
        $productDB = new ProductDb;
        $result = $productDB->queryAll();
        // encode before return
        echo json_encode($result);
    }

    // run get
    switch($_SERVER['REQUEST_METHOD']) {
        case "GET": 
            get();
            break;
        default:
            error();
    }

?>