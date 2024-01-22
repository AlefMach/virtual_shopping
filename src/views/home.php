<!-- home.php -->

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loja vitual</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/home/home.css">

</head>
<body>
    <div class="box_home">
        <h2>Bem-vindo à loja vitual <?php echo $_SESSION['username']; ?></h2>
        
        <ul>
            <li><a href="/products">Loja</a></li>
            <li><a href="/cart">Carrinho</a></li>
            <li><a href="/products-own">Meus produtos</a></li>
            <li><a href="/product/create">Cadastrar novos produtos</a></li>
            <li><a href="/product-type/create">Cadastrar tipo de produto</a></li>
        </ul>
    </div>
</body>
</html>