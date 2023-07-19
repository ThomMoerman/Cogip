<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/default.css" rel="stylesheet" type="text/css">
    <link href="assets/css/register.css" rel="stylesheet" type="text/css">
    <script src="assets/js/validation_sanytising.js" defer></script>
    <title>Login</title>
</head>

<body>
    <main>
        <section class="register__section">
            <h1 class="section__title">Sign Up</h1>
            <hr>
                <form method="POST" action="/register" class="section__form js-form">
                    <div class="form__firstname">
                        <label for="firstName">First Name:</label>
                        <input type="text" class="js-firstname-input" id="firstName"  name="firstName" require>
                        <div class="field--error"></div>
                    </div>
                    <div class="form__lastname">
                        <label for="lastName">Last Name:</label>
                        <input type="text" class="js-lastname-input" id="lastName" name="lastName"  require>
                        <div class="field--error"></div>
                    </div>
                    <div class="form__email">
                        <label for="email">Email:</label>
                        <input type="email" class="js-email-input" id="email" name="email" require>
                        <div class="field--error"></div>
                    </div>
                    <div class="form__password">
                        <label for="password">Mot de passe:</label>
                        <input type="password" class="js-password-input" id="password" name="password" require>
                        <div class="field--error"></div>
                    </div>
                    <div class="form__button submit">
                        <button type="submit">Register</button>
                    </div>
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