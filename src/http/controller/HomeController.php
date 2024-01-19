<?php

include './http/middlewares/AuthMiddleware.php';

AuthMiddleware::handle();

/**
 * Class HomeController
 *
 * Controller responsible for handling requests related to the home page.
 */
class HomeController
{
    /**
     * Renders the home page.
     *
     * This method includes the HTML view file for the home page.
     */
    public function index()
    {
        // Include the HTML view file for the home page.
        include './views/home.php';
    }
}