<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/reset.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard_nav.css" rel="stylesheet" type="text/css">
    <script type="module" rel='javascript' src="assets/js/invoice_form.js"></script>
    <title>New Invoice
    </title>
</head>

<body>
    <h1>New Invoice</h1>

    <form action="/invoices_add" method="POST">
        <label for="ref">Ref:</label>
        <input type="text" name="ref" id="ref"><br>

        <label for="due_date">Due Date:</label>
        <input type="date" name="due_date" id="due_date" required><br>

        <label for="company_name">Company:</label>
        <input type="text" name="company_name" id="company_name" required><br>

        <?php if (isset($error_message) && !empty($error_message)): ?>
            <div class="error-message">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

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