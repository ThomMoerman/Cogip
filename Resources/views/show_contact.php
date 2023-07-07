<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/reset.css" rel="stylesheet" type="text/css">
    <link href="assets/css/header.css" rel="stylesheet" type="text/css">
    <link href="assets/css/footer.css" rel="stylesheet" type="text/css">
    <link href="assets/css/table.css" rel="stylesheet" type="text/css">
    <script rel='javascript' src="assets/js/searchfilter.js" defer  ></script>
    <title>Contact</title>
</head>

<body>
    <?php
        require '../Resources/Include/header.php'
    ?>
    <main>     
            <section id="contact_profile">
                <h2 class="contact__head"><?php $contact['name']?></h2>
                <div class="contact_info">
                    <p>Contact:<?php $contact['name']?> </p>
                    <p>Phone:<?php $contact['phone']?> </p>
                    <p>Mail:<?php $contact['email']?> </p>
                    <p>Company:<?php $contact['company_id']?> </p>
                </div>
        </section>
    </main>
    <?php
        require '../Resources/Include/footer.php'
    ?>
</body>

</html>