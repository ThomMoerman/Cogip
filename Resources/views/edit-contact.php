<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/reset.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/dashboard_nav.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/dashboard_header.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/dashboard_tab.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/dashboard_main.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/dashboard_form.css" rel="stylesheet" type="text/css">
    <title>Formulaire POST</title>
</head>

<body>
    <?php require '../Resources/Include/navbar_dashboard.php'; ?>
    <main>
        <?php require '../Resources/Include/header_dashboard.php'; ?> 
        <div id="form_section">
            <h3>Edit Contact</h3>
            <hr>
            <form action="/edit-contact/<?php echo $_GET['id'] ?>" method="POST">
                <!-- <label for="name">Name:</label> -->
                <input type="text" id="name" name="name" required value="<?php echo $_GET['name'] ?>"><br><br>

                <!-- <label for='company_id'>Company id:</label> -->
                <input type="text" id="company_id" name="company_id" required value="<?php echo $_GET['company_id'] ?>">

                <!-- <label for='email'>Mail:</label> -->
                <input type="mail" id="email" name="email" required value="<?php echo $_GET['email'] ?>">

                <!-- <label for='phone'>Phone:</label> -->
                <input type="tel" id="phone" name="phone" required value="<?php echo $_GET['phone'] ?>">

                <input type="submit" name="send" value="send" id="edit_submit">
            </form>
        </div>
        <?php if (isset($errors) && !empty($errors)): ?>
        <div class="error-messages">
            <?php foreach ($errors as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </main>
</body>
</html>