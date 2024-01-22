<?php

include './http/middlewares/AuthMiddleware.php';

// Ensure user is authenticated before proceeding
AuthMiddleware::handle();

class CartController {
    public function index() {
        // Simule produtos no carrinho (você deve ter sua lógica de gerenciamento do carrinho)
        $cartItems = [
            ['id' => 1, 'product_name' => 'Produto 1', 'quantity' => 2],
            ['id' => 2, 'product_name' => 'Produto 2', 'quantity' => 1],
        ];

        include './views/cart/index.php';
    }

    public function update() {
        // Lógica para atualizar o carrinho (adicionar/remover itens)
        // ...

        // Redireciona de volta para a página do carrinho após a atualização
        header('Location: /cart');
        exit();
    }
}
