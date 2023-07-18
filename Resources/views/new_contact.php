<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/reset.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard_nav.css" rel="stylesheet" type="text/css">
    <script type="module" rel='javascript' src="assets/js/contact_form.js"></script>
    <title>New Contact</title>
</head>

<body>
    <h1>New Contact</h1>

    <form action="/contacts_add" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="company_name">Company:</label>
        <input type="text" name="company_name" id="company_name" required><br>

        <?php if (isset($error_message) && !empty($error_message)): ?>
            <div class="error-message">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" required><br>

        <button type="submit">Create</button>
    </form>
    <?php if (isset($errors) && !empty($errors)): ?>
        <div class="error-messages">
            <?php foreach ($errors as $error): ?>
                <p>
                    <?php echo $error; ?>
                </p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</body>

</html>