<?php

include './http/controller/AuthController.php';

class AuthMiddleware {
    public static function handle() {
        // Checks if the user is logged in
        if (!AuthController::isUserLoggedIn()) {
            header('Location: /login');
            exit();
        }
    }
}
