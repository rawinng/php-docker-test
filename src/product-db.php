<?php

    class Product {
        public $name;
        public $price;
    }

    class ProductDb {
        private $mysqli;
        private function db_connect() {
            // connect to maindb with (root/password) : database=db_product
            $this->mysqli = new mysqli("maindb", "root", "password", "db_product"); 
        }
        private function db_close() {
            $this->mysqli->close();
        }
        public function insert(Product $data) {
            $this->db_connect();
            $sql = sprintf("INSERT INTO db_product.PRODUCT(name, price) VALUES ('%s', %f)", $data->name, $data->price);
            //printf("INSERT Statement: %s\n", $sql);
            if (!$this->mysqli->query($sql)) {
                printf("Error : %s\n", $this->mysqli->error);
            }
            $this->db_close();
        }
        public function queryAll() {
            $this->db_connect();
            $resultList = array();
            $sql = sprintf("SELECT * FROM db_product.PRODUCT");
            //printf("QUERY Statement: %s\n", $sql);
            if ($result = $this->mysqli->query($sql)) {
                while($obj = $result->fetch_object()) {
                    $resultList[] = $obj;
                }
            } else {
                printf("Error : %s\n", $this->mysqli->error);
            }
            $this->db_close();
            return $resultList;
        }
    }

    function ProductDb_test() {
        $product = new Product;
        $product->name = "TEST";
        $product->price = 92.5;
        $prodDb = new ProductDb;
        $prodDb->insert($product);

        $result = $prodDb->queryAll();
        foreach($result as $record) {
            printf("%s\n", json_encode($record));
        }
    }

    if(getenv('TESTING', true)) {
        ProductDb_test();
    }
?>