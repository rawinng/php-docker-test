<?php
    include_once './product-db.php';
    include_once './error.php';

    function post() {
        // response header
        header("Content-Type: application/json");
        
        // read input from POST
        $json_str = file_get_contents("php://input");
        
        // decode
        $json = json_decode($json_str);

        // create product object
        $p = new Product;
        $p->name = $json->name;
        $p->price = $json->price;

        $productDB = new ProductDb;
        $productDB->insert($p);
        
        // encode before return
        echo json_encode($json);
    }

    
    switch($_SERVER['REQUEST_METHOD']) {
        case "POST": 
            post();
            break;
        default:
            error();
    }


?>