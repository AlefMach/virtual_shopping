<?php

include './model/ProductTypeModel.php';

class ProductTypeController
{
    public function create()
    {
        include './views/product_type/create.php';
    }

    public function save()
    {
        // Logic for processing product type saving
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Gets form data
            $name = $_POST['name'];
            $taxRate = $_POST['tax_rate'];

            // Basic validation (can be more robust depending on your needs)
            if (empty($name) || empty($taxRate)) {
                header('Location: /product-type/create');
                exit();
            }

            $product_type = new ProductTypeModel([
                'name'=> $name,
                'tax_rate' => $taxRate,
            ]);

            $product_type->save();
            
            // Redirect to the product type registration page
            header('Location: /product-type/create?success=true');
            exit();
        } else {
            // If the request is not of type POST, Redirect to the product type registration page
            header('Location: /product-type/create');
            exit();
        }
    }
}