<?php

include './model/ProductModel.php';
include './model/ProductTypeModel.php';


class ProductController {
    public function index() {
        $products = Product::all();
        $products_type = ProductTypeModel::all();

        include './views/product/show.php';
    }

    public function create() {
        include('./views/product/create.php');
    }

    public function save() {
        // Get the data form
        $name = $_POST['name'];
        $price = $_POST['price'];
        $typeId = $_POST['type_id'];

        // Handle upload image
        $imagePath = 'uploads/';
        $imageName = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];

         // Create a path if not exist
         if (!is_dir($imagePath)) {
            mkdir($imagePath, 0777, true);
        }

        // Move file to path uploads
        move_uploaded_file($imageTmp, $imagePath . $imageName);

         // Create a new instance of the Product using Eloquent 
         $product = new Product([
            'name' => $name,
            'type_id' => $typeId,
            'price' => $price,
            'image_path' => $imagePath . $imageName,
        ]);

        // Save Product db
        $product->save();

        header('Location: /products');
        exit();
    }
}
