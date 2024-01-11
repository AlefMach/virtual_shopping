<!-- app/views/product/create.php -->
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">

</head>
<body>
    <h1>Cadastrar Produto</h1>

    <form action="/product/save" method="post" enctype="multipart/form-data">
        <label for="name">Nome do Produto:</label>
        <input type="text" name="name" id="name" required>

        <label for="price">Preço do Produto:</label>
        <input type="text" name="price" id="price" required>

        <label for="type_id">Categoria:</label>
        <select name="type_id" id="type_id" required>
            <?php
                // Recupere os tipos de produto da tabela product_type
                $productTypes = ProductTypeModel::all();

                // Preencha as opções do select com os tipos de produto
                foreach ($productTypes as $type) {
                    echo '<option value="' . $type->id . '">' . $type->name . '</option>';
                }
            ?>
        </select>

        <label for="image">Imagem do Produto:</label>
        <input type="file" name="image" id="image" accept="image/*" required>

        <button type="submit">Salvar Produto</button>
    </form>

    <script src="../../assets/product/create.js"></script>
</body>
</html>