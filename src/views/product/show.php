<!-- app/views/product/show.php -->
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Produtos</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/product/product.css">
    <script src='../../assets/js/product/product.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<h2>Listagem de Produtos</h2>

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Preço</th>
            <th>Imposto</th>
            <th>Imagem</th>
            <th>Data de Criação</th>
            <th>Data de Atualização</th>
        </tr>
    </thead>
    <tbody>
        <!-- Loop through products and display data -->
        <?php foreach ($products as $product): ?>
            <?php foreach ($productTypes as $product_type): ?>
                <?php if ($product->type_id == $product_type->id): ?>
                    <tr>
                        <td><?php echo $product->name; ?></td>
                        <td><?php echo $product_type->name ?></td>
                        <td>R$ <?php echo $product->price; ?></td>
                        <td><?php echo $product_type->tax_rate; ?></td>
                        <td><a href="javascript:void(0);" onclick="openImage('<?php echo $product->image_path; ?>')">
                            <img src="<?php echo $product->image_path; ?>" alt="Imagem do Produto" width="80">
                        </a></td>
                        <td><script>document.write(formatDateTime("<?php echo $product->created_at; ?>"));</script></td>
                        <td><script>document.write(formatDateTime("<?php echo $product->updated_at; ?>"));</script></td>
                        <td><a class="purchase-link" href="javascript:void(0);" onclick="addToCart(<?php echo $product->id; ?>, '<?php echo $product_type->tax_rate; ?>', <?php echo $product->price; ?>)">Comprar</a></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>