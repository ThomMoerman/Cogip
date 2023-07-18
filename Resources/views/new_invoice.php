<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/reset.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard_nav.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard_header.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard_tab.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard_main.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/dashboard_form.css" rel="stylesheet" type="text/css">
    <title>New Invoice
    </title>
</head>

<body>
<?php
     require '../Resources/Include/navbar_dashboard.php'
    ?>
    <main>
        <?php
            require '../Resources/Include/header_dashboard.php'
        ?>
    <div id="form_section">
    <h3>New Invoice</h3>
    <hr class="form_hr">
    <form action="/invoices_add" method="POST">
        <input type="text" name="ref" id="ref" placeholder="Reference" required><br>

        <input type="date" name="due_date" id="due_date" placeholder="Due date" required><br>

        <input type="text" name="company_name" id="company_name" placeholder="Company Name" required><br>

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