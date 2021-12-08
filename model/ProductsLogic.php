<?php

require_once dirname(__FILE__) . "./DataHandler.php";

class ProductsLogic {
    private $DataHandler;

    function __construct() {
        $this->DataHandler = new DataHandler("dunk");
    }

    public function CreateProduct($product_type_code, $supplier_id, $product_name, $product_price, $other_product_details) {
        $sql = "INSERT INTO products (product_type_code, supplier_id, product_name, product_price, other_product_details) VALUES (?, ?, ?, ?, ?)";
        $result = $this->DataHandler->CreateData($sql, [$product_type_code, $supplier_id, $product_name, $product_price, $other_product_details]);
        return $result;
    }

    public function ReadProduct($product_id) {
        $sql = "SELECT * FROM products WHERE product_id = ?";
        $result = $this->DataHandler->ReadData($sql, [$product_id]);
        if(!$result) throw new Exception("No such product.");
        return $result[0];
    }

    public function ReadProducts() {
        $sql = "SELECT * FROM products";
        $result = $this->DataHandler->ReadData($sql, []);
        return $result;
    }

    public function UpdateProduct($product_type_code, $supplier_id, $product_name, $product_price, $other_product_details, $product_id) {
        $sql = "UPDATE products SET product_type_code = ?, supplier_id = ?, product_name = ?, product_price = ?, other_product_details = ? WHERE product_id = ?";
        $result = $this->DataHandler->UpdateData($sql, [$product_type_code, $supplier_id, $product_name, $product_price, $other_product_details, $product_id]);
        return $result;
    }

    public function DeleteProduct($product_id) {
        $sql = "DELETE FROM products WHERE product_id = ?";
        $result = $this->DataHandler->DeleteData($sql, [$product_id]);
        return $result;
    }

    public function SearchProducts($term) {
        $sql = "SELECT * FROM products WHERE product_name LIKE '%' ? '%'";
        $result = $this->DataHandler->ReadData($sql, [$term]);
        return $result;
    }
}