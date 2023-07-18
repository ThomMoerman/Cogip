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
    <link href="assets/css/dashboard_form.css" rel="stylesheet" type="text/css">
    <title>New Company</title>
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
    <h3>New Company</h3>
    <hr class="form_hr">
    <form action="/companies_add" method="POST">
     <!--    <label for="name">Name:</label> -->
        <input type="text" name="name" id="name" placeholder="Name" required><br>

     <!--    <label for="type_id">Type:</label> -->
        <input type="text" name="type_id" id="type_id" placeholder="Type" required><br>

    <!--     <label for="country">Country:</label> -->
        <input type="text" name="country" id="country" placeholder="Country" required><br>

    <!--     <label for="tva">TVA:</label> -->
        <input type="text" name="tva" id="tva" placeholder="TVA" required><br>

        <button type="submit">Save</button>
    </form>
</div>
</main>
</body>

</html>