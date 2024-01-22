<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Carrinho de Compras</h1>

    <table>
        <tr>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($cartItems as $item): ?>
            <tr>
                <td><?= $item['product_name']; ?></td>
                <td>
                    <form method="post" action="/cart/update">
                        <input type="hidden" name="product_id" value="<?= $item['id']; ?>">
                        <input type="number" name="quantity" value="<?= $item['quantity']; ?>" min="1">
                        <button type="submit">Atualizar</button>
                    </form>
                </td>
                <td>
                    <form method="post" action="/cart/remove">
                        <input type="hidden" name="product_id" value="<?= $item['id']; ?>">
                        <button type="submit">Remover</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="/products">Continuar Comprando</a>
</body>
</html>
