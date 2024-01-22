<?php

include './http/middlewares/AuthMiddleware.php';
include './models/CartModel.php';
include './domain/cart/CartDomain.php';

// Ensure user is authenticated before proceeding
AuthMiddleware::handle();

/**
 * Class CartController
 *
 * Controller responsible for handling requests related to the shopping cart.
 */
class CartController {

    private $userId;

    /**
     * Constructor to initialize the user ID from the session.
     */
    public function __construct() {
        // Get the user ID from the session
        $this->userId = $_SESSION['user_id'];
    }

    /**
     * Display the shopping cart page.
     */
    public function index() {
        // Get details of products in the shopping cart
        $cartItems = CartModel::getByUserId($this->userId);

        // Include the HTML view file for displaying the shopping cart.
        include './views/cart/index.php';
    }

    /**
     * Add a product to the shopping cart.
     */
    public function addToCart() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['productId'];
            $price = $_POST['price'];
            $tax_rate = $_POST['tax_rate'];

            // Calculate the total price including tax
            $total_price = CartDomain::getTotalPrice($price, $tax_rate);
            
            // Check if the product is already in the cart
            $existingCartItem = CartModel::where('user_id', $this->userId)
                ->where('product_id', $productId)
                ->first();
        
            if ($existingCartItem) {
                // If the product is already in the cart, increment the quantity
                $existingCartItem->increment('quantity');
                
                $existingCartItem->total_price += $total_price;
                $existingCartItem->save();
            } else {
                // If the product is not in the cart, create a new cart item
                $cartItem = new CartModel([
                    'user_id' => $this->userId,
                    'product_id' => $productId,
                    'total_price' => $total_price,
                    'quantity' => 1,
                ]);
                $cartItem->save();
            }
        
            // Redirect back to the products page
            header('Location: /products');
            exit();
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // Redirect to the products page if the request is a GET request
            header('Location: /products');
            exit();
        }
    }
}