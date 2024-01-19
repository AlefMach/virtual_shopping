<?php

include './models/UserModel.php';

/**
 * Class UserController
 *
 * Handles user-related operations, such as user registration.
 */
class UserController
{
    /**
     * Display the user registration form.
     */
    public function index() {
        include './views/user/register.php';
    }

    /**
     * Process the user registration form submission.
     */
    public function create()
    {
        // Check if it's a POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Check if the user already exists
            if (!$this->userExists($username)) {
                // If the user doesn't exist, register in the database
                $this->registerUser($username, $password);

                // Redirect to the login page or perform other actions after registration
                header('Location: /login');
                exit();
            } else {
                // If the user already exists, display an alert
                echo '<script>alert("User already exists!");</script>';
            }
        }
    }

    /**
     * Check if a user with the given username already exists.
     *
     * @param string $username The username to check.
     * @return bool True if the user exists, false otherwise.
     */
    private function userExists($username) {
        try {
            // Check if the user exists in the database
            $existingUser = UserModel::where('username', '=', $username)->first();

            return $existingUser !== null;
        } catch (PDOException $e) {
            // Handle any database error here
            echo "Error checking user existence: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Register a new user in the database.
     *
     * @param string $username The username of the new user.
     * @param string $password The password of the new user.
     */
    private function registerUser($username, $password) {
        // Encrypt the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            // Create an instance of the User model
            $user = new UserModel([
                'username' => $username,
                'password' => $hashedPassword,
            ]);

            // Save the user to the database
            $user->save();
        } catch (PDOException $e) {
            // Handle any database error here
            echo "Error registering user: " . $e->getMessage();
        }
    }
}
