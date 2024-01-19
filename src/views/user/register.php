<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="assets/css/user/register.css">
</head>
<body>
    <div class="box_register">
        <h2>Cadastro</h2>
    
        <form action="/register/create" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
    
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
    
            <button type="submit">Registrar</button>
        </form>
    </div>

</body>
</html>