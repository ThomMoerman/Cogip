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
            <h3>Edit Company</h3>
            <hr>
            <form action="/edit-company/<?php echo $_GET['id'] ?>" method="POST">
                <input type="text" id="name" name="name" required value="<?php echo $_GET['name'] ?>"><br><br>
                <label for='type_id'>Type:</label>
                <select name="type_id" id="type_id" required>
                    <option value="1">Client</option>
                    <option value="2">Supplier</option>
                </select><br>
                <input type="submit" name="send" value="send" id="edit_submit">
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
    </main>
</body>

</html>