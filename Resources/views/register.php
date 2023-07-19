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
    <main>
        <section class="register__section">
            <h1 class="section__title">Sign Up</h1>
            <hr>
                <form method="POST" action="/register" class="section__form">
                    <div class="form__firstname">
                        <label for="firstName">First Name:</label>
                        <input type="text" id="firstName" name="firstName" required>
                    </div>
                    <div class="form__lastname">
                        <label for="lastName">Last Name:</label>
                        <input type="text" id="lastName" name="lastName" required>
                    </div>
                    <div class="form__email">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form__password">
                        <label for="password">Mot de passe:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form__button submit">
                        <button type="submit">Register</button>
                    </div>
                    <a href="/" style="display: block; text-align: center; text-decoration: none; color: #000; font-weight: bold; margin-top: 25px;"><= Back to Homepage</a>
                </form>
        </section>
    <?php if (isset($errorMessages) && count($errorMessages) > 0): ?>
        <div class="error-messages">
            <?php foreach ($errorMessages as $errorMessage): ?>
                <p>
                    <?php echo $errorMessage; ?>
                </p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    </main>
</body>

</html>