<?php

/**
 * Class ProductTypeController
 *
 * Controller responsible for handling requests related to product type management.
 */
class ProductTypeController
{
    /**
     * Displays the form for creating a new product type.
     *
     * This method includes the HTML view file for the product type creation form.
     */
    public function create()
    {
        include './views/product_type/create.php';
    }

    /**
     * Handles the saving of a new product type.
     *
     * This method processes the form submission for creating a new product type,
     * performs basic validation, creates a new ProductTypeModel instance, and saves
     * it to the database.
     */
    public function save()
    {
        // Logic for processing product type saving
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Gets form data
            $name = $_POST['name'];
            $taxRate = $_POST['tax_rate'];

            // Basic validation (can be more robust depending on your needs)
            if (empty($name) || empty($taxRate)) {
                // Redirect back to the product type creation page if data is incomplete
                header('Location: /product-type/create');
                exit();
            }

            // Create a new instance of ProductTypeModel using Eloquent
            $productType = new ProductTypeModel([
                'name'=> $name,
                'tax_rate' => $taxRate,
            ]);

            // Save the product type to the database
            $productType->save();
            
            // Redirect to the product type creation page with a success parameter
            header('Location: /product-type/create?success=true');
            exit();
        } else {
            // If the request is not of type POST, Redirect to the product type creation page
            header('Location: /product-type/create');
            exit();
        }
    }
}
