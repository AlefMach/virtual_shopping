<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Tipo de Produto</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/product_type/product_type.css">
</head>
<body>
    <div class="box_product_type">
        <h2>Cadastro de Tipo de Produto</h2>
        
        <form action="/product-type/save" method="post">
            <div class="box_product_type_form">
                <label for="name">Nome do Tipo:</label>
                <input type="text" id="name" name="name" required>
            
                <label for="tax_rate">Taxa de Imposto (%):</label>
                <input type="number" id="tax_rate" name="tax_rate" min="0" step="0.01" required>
            
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </div>

    <script src='../../assets/js/productType/productType.js'></script>
</body>
</html>