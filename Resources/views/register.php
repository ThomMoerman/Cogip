<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <form method="POST" action="/register">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName">

        <label for="lastName">First Name:</label>
        <input type="text" id="lastName" name="lastName">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password">

        <button type="submit">S'inscrire</button>
    </form>
    <?php if (isset($errorMessages) && count($errorMessages) > 0): ?>
        <div class="error-messages">
            <?php foreach ($errorMessages as $errorMessage): ?>
                <p>
                    <?php echo $errorMessage; ?>
                </p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</body>

</html>