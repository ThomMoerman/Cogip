<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/reset.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard_nav.css" rel="stylesheet" type="text/css">
    <script type="module" rel='javascript' src="assets/js/company_form.js"></script>
    <title>New Company</title>
</head>

<body>
    <h1>New Company</h1>

    <form action="/companies_add" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="type_id">Type:</label>
        <input type="text" name="type_id" id="type_id" required><br>

        <label for="country">Country:</label>
        <input type="text" name="country" id="country" required><br>

        <label for="tva">TVA:</label>
        <input type="text" name="tva" id="tva" required><br>

        <button type="submit">Create</button>
    </form>
    <?php if(isset($errors) && !empty($errors)): ?>
    <div class="error-messages">
        <?php foreach($errors as $error): ?>
            <p><?php echo $error; ?></p>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</body>

</html>