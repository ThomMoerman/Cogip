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
            <h3>Edit Invoice</h3>
            <hr>
            <form
                action="/edit-invoice/<?php echo $_GET['id']; ?>?id=<?php echo $_GET['id']; ?>&ref=<?php echo $_GET['ref']; ?>&company_name=<?php echo $_GET['company_name']; ?>"
                method="POST">
                <!-- <label for="ref">ref:</label> -->
                <input type="text" id="ref" name="ref" required value="<?php echo $_GET['ref'] ?>"><br><br>

                <label for='company_name'>Company:</label>
                <input type="text" id="company_name" name="company_name" required
                    value="<?php echo $_GET['company_name'] ?>">
                <?php if (isset($error_message) && !empty($error_message)): ?>
                    <div class="error-message">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>
                <input type="submit" name="send" value="send" id="edit_submit">
            </form>
        </div>
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