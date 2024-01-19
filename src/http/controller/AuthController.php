<?php

include './models/UserModel.php';

/**
 * Class AuthController
 *
 * Handles user authentication operations such as login and logout.
 */
class AuthController {
    /**
     * Process the login form submission.
     */
    public function login() {
        // Logic to process the login form
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Add logic to verify credentials in the database
            $user = UserModel::where('username', $username)->first();

            if ($user && password_verify($password, $user->password)) {
                // Start the session if not already started
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                // Save user information in the session
                $_SESSION['user_id'] = $user->id; // Replace 'user_id' with the actual user identifier
                $_SESSION['username'] = $_POST['username']; // Replace 'username' with the correct variable

                // Redirect to the dashboard or another page after login
                header('Location: /'); // Replace '/' with the desired URL
                exit();
            } else {
                // Invalid credentials, redirect back to the login page
                header('Location: /login?error=true');
                exit();
            }
        } else {
            // If it's not a POST request, redirect to the login page
            include('./views/auth/login.php');
        }
    }

    /**
     * Log the user out and destroy the session.
     */
    public function logout() {
        session_destroy();
        header('Location: /login');
        exit();
    }

    /**
     * Check if a user is currently logged in.
     *
     * @return bool True if a user is logged in, false otherwise.
     */
    public static function isUserLoggedIn() {
        return isset($_SESSION['user_id']);
    }
}
