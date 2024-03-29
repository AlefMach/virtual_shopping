<?php

// Include necessary models and middleware
include './models/ProductTypeModel.php';
include './models/ProductModel.php';
include './http/middlewares/AuthMiddleware.php';
include './domain/products/ProductDomain.php';

// Ensure user is authenticated before proceeding
AuthMiddleware::handle();

/**
 * Class ProductController
 *
 * Controller responsible for handling requests related to product management.
 */
class ProductController {
    private $userId;

    /**
     * ProductController constructor.
     *
     * Initializes the controller by fetching product and product type data from the database.
     */
    public function __construct() {
        // Get the user ID from the session
        $this->userId = $_SESSION['user_id'];
    }

    /**
     * Displays the list of products.
     *
     * This method fetches the list of products and product types from the database
     * and includes the HTML view file to display the products along with their details.
     */
    public function index() {
        // Assign product and product type data to local variables
        $products = ProductModel::whereNotIn('user_id', [$this->userId])->get();

        $productTypes = ProductDomain::convertTaxRatesToPercentage(ProductTypeModel::all());

        // Include the HTML view file for displaying the list of products.
        include './views/product/show.php';
    }

    /**
     * Displays the list of own products.
     *
     * This method fetches the list of products and product types from the database
     * and includes the HTML view file to display the products along with their details.
     */
    public function show() {
        // Assign product and product type data to local variables
        $products = ProductModel::where('user_id', $this->userId)->get();

        $productTypes = ProductDomain::convertTaxRatesToPercentage(ProductTypeModel::all());

        // Include the HTML view file for displaying the list of products.
        include './views/product/show.php';
    }

    /**
     * Displays the form for creating a new product.
     *
     * This method includes the HTML view file for the product creation form.
     */
    public function create() {
        // Assign product type data to a local variable
        $productTypes = ProductTypeModel::where('user_id', $this->userId)
            ->orWhereNull('user_id')
            ->get();

        // Include the HTML view file for the product creation form.
        include('./views/product/create.php');
    }

    /**
     * Handles the saving of a new product.
     *
     * This method retrieves the product data from the form submission, handles the
     * file upload for the product image, creates a new Product instance, and saves
     * it to the database using Eloquent.
     */
    public function save() {
        // Get product data from the form submission
        $name = $_POST['name'];
        $price = $_POST['price'];
        $typeId = $_POST['type_id'];

        // Handle upload image
        $imagePath = 'uploads/';
        $imageName = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];

        // Create a directory if it doesn't exist
        if (!is_dir($imagePath)) {
            mkdir($imagePath, 0777, true);
        }

        // Move the uploaded file to the specified path
        move_uploaded_file($imageTmp, $imagePath . $imageName);

        // Create a new instance of the Product using Eloquent
        $product = new ProductModel([
            'name' => $name,
            'type_id' => $typeId,
            'price' => $price,
            'image_path' => $imagePath . $imageName,
            'user_id' => $this->userId,
        ]);

        // Save the product to the database
        $product->save();

        // Redirect to the product list page
        header('Location: /products-own');
        exit();
    }
}
