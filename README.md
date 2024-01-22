# Virtual Shopping System

## Overview

The Virtual Shopping System is a web application developed in PHP that provides a simple platform for managing product information, product types, and sales transactions. The system follows the Model-View-Controller (MVC) architecture and utilizes PHP 7.4+, PostgreSQL as the database, and Docker for containerization.

## Features

- **Product Management:** Add, view, and edit product details including name, type, price, and image.
- **Product Type:** Manage different types of products with corresponding tax rates.
- **Sales:** Record sales transactions, including product quantity, total price, and total tax.
- **User Interface:** User-friendly interface for product and sales management.
- **Data Persistence:** Data is stored in a PostgreSQL database, providing durability and reliability.

## Requirements

- PHP 7.4 or higher
- PostgreSQL
- Docker

## Project Structure

The project follows the MVC design pattern:

- **`sql`**: Contains the inital migrate.
- **`src`**: Contains the core application files.
  - **`assets`**: Publicly accessible files, including CSS styles, javascript and images.
  - **`config`**: Configuration files, including database setup.
  - **`domain`**: The business logic.
  - **`http`**: Handles user inputs and updates the model.
  - **`models`**: Represents the application data.
  - **`tests`**: Unit test logic.
  - **`views`**: Displays the data to the user and handles user interface logic.
- **`Dockerfile`**
- **`docker-compose.yml`**

## Installation

1. Clone the repository.
2. Set up the Docker environment using the provided `Dockerfile` and `docker-compose.yml`.
3. Copy .env-sample to .env file
4. Configure the PostgreSQL database in the `.env` file.
5. Run the Docker containers.
6. Install make file running `make deps` ou install manualy dependeces to project with docker (use the Makefile with reference).

## Usage

1. Access the application through the defined routes, e.g., `http://localhost:8080/`.
2. Navigate through the product and sales management interfaces.
3. Add, edit, and view products and product types.
4. Record sales transactions and view relevant information.

## Contributions

Contributions are welcome! Feel free to fork the repository, make changes, and submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE).
