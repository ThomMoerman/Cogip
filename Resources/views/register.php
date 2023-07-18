<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/default.css" rel="stylesheet" type="text/css">
    <link href="assets/css/register.css" rel="stylesheet" type="text/css">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <form method="POST" action="/register">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required>

        <label for="lastName">First Name:</label>
        <input type="text" id="lastName" name="lastName" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>

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