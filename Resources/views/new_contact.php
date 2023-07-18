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
    <title>New Contact</title>
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
    <h3>New Contact</h3>
    <hr class="form_hr">
    <form action="/contacts_add" method="POST">
    <!-- <label for="name">Name:</label> -->
        <input type="text" name="name" id="name" placeholder="Name" required><br>

   <!--  <label for="company_id">Company:</label> -->
        <input type="text" name="company_id" id="company_id" placeholder="Company"  required><br>

   <!--  <label for="email">Email:</label> -->
        <input type="email" name="email" id="email" placeholder="Email" required><br>

  <!--   <label for="phone">Phone:</label> -->
        <input type="text" name="phone" id="phone" placeholder="Phone" required><br>

        <button type="submit">Save</button>
</form>
</div>
</main>
</body>
</html>