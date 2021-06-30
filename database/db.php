<?php 

    class Baza {
        public $conn;

        function __construct($baza) {
            $this->conn = new mysqli('localhost', 'root', 'x2vR5ZyAG332saKxc', $baza);

            if ($this->conn->connect_error) {
                die('Error: ' . $this->conn->connect_error);
            } 
        }

        function executeSelect($statement) {
            $data = $this->conn->query($statement);
            if ($data === false) {
                return ['success'=>false, 'message'=>$this->conn->error];
            } else {
                return $data_array = $data->fetch_all(MYSQLI_ASSOC);
            }
        }

        function executeStatement($statement) {
            $response = $this->conn->query($statement);
            if ($response === false) {
                die('Statement was not executed: ' . $this->conn->error);
            } else {
                echo 'Successfuly executed statement!';
            }
        }

        function getProducts() {
            $products = $this->executeSelect('SELECT * FROM products');
            return $products;
        }

        function getProduct($id) {
            $product = $this->executeSelect("SELECT * FROM products WHERE id=$id");
            return $product[0];
        }


    }

    $db = new Baza('footballshop');



?>