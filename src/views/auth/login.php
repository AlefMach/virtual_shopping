<!-- views/auth/login.php -->

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/auth/login.css">
</head>
<body>
    <div style="display: block;">
        <div class="login-container">
            <h2>Login</h2>
            <form action="/login" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="login-button">Entrar</button>
            </form>
        </div>
        
        <a class="create-account-link" style="position: absolute; margin-top: 19px;" href="/register">Criar conta</a>
    </div>

    <script src='../../assets/js/auth/login.js'></script>
</body>
</html>
