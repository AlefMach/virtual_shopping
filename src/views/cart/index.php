<!-- cart/index.php -->
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/cart/cart.css">
</head>
<body>

    <h2>Carrinho de Compras</h2>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Nome do Produto</th>
                    <th>Imagem</th>
                    <th>Quantidade</th>
                    <th>Preço Unitário</th>
                    <th>Taxa acrescida %</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through cart items and display data -->
                <?php foreach ($cartItems as $cartItem): ?>
                    <tr>
                        <td><?php echo $cartItem->product_name; ?></td>
                        <td><img src="<?php echo $cartItem->image_path; ?>" alt="Imagem do Produto" width="80"></td>
                        <td><?php echo $cartItem->quantity; ?></td>
                        <td><?php echo $cartItem->product_price; ?></td>
                        <td><?php echo $cartItem->tax_rate; ?></td>
                        <td><?php echo $cartItem->total_price; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="box-button-cart">
        <button>Finalizar</button>
    </div>

</body>
</html>
