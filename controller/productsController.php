<?php

require_once dirname(__FILE__) . "/../model/ProductsLogic.php";
require_once dirname(__FILE__) . "/../model/OutputData.php";

class productsController {
    private $ProductsLogic;
    private $OutputData;

    function __construct() {
        $this->ProductsLogic = new ProductsLogic();
        $this->OutputData = new OutputData();
    }

    public function Handler() {
        $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";

        switch($action) {
            // CRUD cases
            case "create":
                $this->CollectCreateProduct();
                break;
            case "read":
                $this->CollectReadProducts();
                break;
            case "update":
                $this->CollectUpdateProduct();
                break;
            case "delete":
                $this->CollectDeleteProduct();
                break;

            // Search case
            case "search":
                $this->CollectSearchProduct();
                break;

            // Form cases
            case "createform":
                $this->CollectCreateProductForm();
                break;
            case "updateform":
                $this->CollectUpdateProductForm();
                break;

            // Default case
            default:
                $this->CollectIndexProducts();
                break;
        }
    }

    private function CollectCreateProduct() {
        if(!isset($_REQUEST["product_type_code"])) throw new Exception();
        if(!isset($_REQUEST["supplier_id"])) throw new Exception();
        if(!isset($_REQUEST["product_name"])) throw new Exception();
        if(!isset($_REQUEST["product_price"])) throw new Exception();
        if(!isset($_REQUEST["other_product_details"])) throw new Exception();

        $this->ProductsLogic->CreateProduct($_REQUEST["product_type_code"], $_REQUEST["supplier_id"], $_REQUEST["product_name"], $_REQUEST["product_price"], $_REQUEST["other_product_details"]);
        $this->CollectReadProducts();
    }

    // Default function with other include so you wont get double meta data
    private function CollectIndexProducts() {
        $products = $this->ProductsLogic->ReadProducts();
        $table = $this->OutputData->CreateTable($products);
        include "view/reads.php";
    }

    private function CollectReadProducts() {
        $products = $this->ProductsLogic->ReadProducts();
        $table = $this->OutputData->CreateTable($products);
        include "view/read.php";
    }

    private function CollectUpdateProduct() {
        if(!isset($_REQUEST["product_type_code"])) throw new Exception();
        if(!isset($_REQUEST["supplier_id"])) throw new Exception();
        if(!isset($_REQUEST["product_name"])) throw new Exception();
        if(!isset($_REQUEST["product_price"])) throw new Exception();
        if(!isset($_REQUEST["other_product_details"])) throw new Exception();
        if(!isset($_REQUEST["product_id"])) throw new Exception();

        $this->ProductsLogic->UpdateProduct($_REQUEST["product_type_code"], $_REQUEST["supplier_id"], $_REQUEST["product_name"], $_REQUEST["product_price"], $_REQUEST["other_product_details"], $_REQUEST["product_id"]);
        $this->CollectReadProducts();
    }

    private function CollectDeleteProduct() {
        // if(!isset($_REQUEST["product_id"])) throw new Exception();

        if(!$this->ProductsLogic->DeleteProduct($_REQUEST["id"])) {
            throw new Exception("No such product.");
        }

        $this->CollectReadProducts();
    }

    private function CollectSearchProduct() {
        // if(!isset($_REQUEST["term"])) throw new Exception();

        $products = $this->ProductsLogic->SearchProducts($_REQUEST["term"]);
        $table = $this->OutputData->CreateTable($products);
        include "view/read.php";
    }

    private function CollectCreateProductForm() {
        include "view/create.php";
    }

    private function CollectUpdateProductForm() {
        if(!isset($_REQUEST["id"])) throw new Exception();

        global $product;
        $product = $this->ProductsLogic->ReadProduct($_REQUEST["id"]);

        include "view/update.php";
    }

}

?>