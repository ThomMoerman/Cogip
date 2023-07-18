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
    <?php require '../Resources/Include/navbar_dashboard.php';?>
    <?php require '../Resources/Include/header_dashboard.php';?>
    <main>
        <div id="form_section">
            <h3>Edit Company</h3>
            <hr>
            <form action="/edit-company/<?php echo $_GET['id'] ?>" method="POST">
                <!-- <label for="name">Name:</label> -->
                <input type="text" id="name" name="name" required value="<?php echo $_GET['name'] ?>"><br><br>

                <!-- <label for='type_id'>Type:</label> -->
                <input type="number" id="type_id" name="type_id" required value="<?php echo $_GET['type_id'] ?>">
                
                <!-- <input type="submit" name="send" value="send"> -->
                <button type="submit">Send</button>
            </form>
        </div>
    </main>
</body>
</html>