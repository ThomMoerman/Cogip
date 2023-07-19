<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/default.css" rel="stylesheet" type="text/css">
    <link href="assets/css/login.css" rel="stylesheet" type="text/css">
     <script src="assets/js/validation_sanytising.js" defer></script>
    <title>Login</title>
</head>

<body>
    <main>
        <h1>Login</h1>
        <form method="POST" action="/login" class="section__form js-form">
            <div class="email form__email">
                <label for="email">Email:</label>
                <input type="email" class="js-email-input"  id="email" name="Email" required>
                <div class="field--error"></div>         
            </div>
            <div class="password form__password">
                <label for="password">Mot de passe:</label>
                <input type="password" class="js-password-input"  id="password" name="Password" required>
                <div class="field--error"></div>
            </div>
            <button type="submit">Se connecter</button>
        </form>
        <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
            <div class="error-messages">
                <p>Erreur de connexion.</p>
                <?php if (isset($_GET['messages'])): ?>
                    <p>
                        <?php echo $_GET['messages']; ?>
                    </p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['successMessage'])): ?>
            <div class="success-message">
                <p>
                    <?php echo $_GET['successMessage']; ?>
                </p>
            </div>
        <?php endif; ?>
    </main>
</body>

</html>