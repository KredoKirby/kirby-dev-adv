<?php
    require_once "Database.php";

    class Products extends Database{
        public function addProduct($product_name, $product_price){
            $sql = "INSERT INTO products (product_name, product_price) VALUES ('$product_name', '$product_price')";

            if($this->conn->query($sql)){
                header("location: ../views/dashboard.php");
                exit;
            }else{
                die("Error in adding a product: ".$this->conn->error);
            }
        }

        public function getProducts(){
            $sql = "SELECT * FROM products";
            $result = $this->conn->query($sql);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $products[] = $row;
                }
                return $products;
            }else{
                // die("Cannot retrieve products ".$this->conn->error);
                return false;
            }
        }

        public function getSpecificProduct($product_id){
            $sql = "SELECT * FROM products WHERE product_id = '$product_id'";

            if($result = $this->conn->query($sql)){
                return $result->fetch_assoc();
                exit;
            }else{
                die("Error in retrieving specific product ".$this->conn->error);
            }
        }

        public function updateProduct($product_id, $product_name, $product_price){
            $sql = "UPDATE products
                    SET product_name = '$product_name', product_price = '$product_price'
                    WHERE product_id = '$product_id';
                    ";
            if($this->conn->query($sql)){
                header("location: ../views/dashboard.php");
                exit;
            }else{
                die("Error in updating a product: ".$this->conn->error);
            }
        }

        public function deleteProduct($product_id){
            $sql = "DELETE FROM products WHERE product_id = '$product_id'";

            if($this->conn->query($sql)){
                header("location: ../views/dashboard.php");
                exit;
            }else{
                die("Error in deleting a product: ".$this->conn->error);
            }
        }
    }
?>