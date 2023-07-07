<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/reset.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/header.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/footer.css" rel="stylesheet" type="text/css">
    <script rel='../javascript' src="assets/js/searchfilter.js" defer  ></script>
    <title>Contact</title>
</head>

<body>
    <?php
        require '../Resources/Include/header.php'
    ?>
    <main>     
            <section id="contact_profile">
            <h2 class="contact__head"><?php echo $data['name'] ?></h2>
                <div class="contact_info">
                    <p>Contact: <?php echo $data['name'] ?></p>
                    <p>Phone: <?php echo $data['phone'] ?></p>
                    <p>Mail: <?php echo $data['mail'] ?></p>
                    <p>Company: <?php echo $data['company_name'] ?></p>
                </div>
        </section>
    </main>
    <?php
        require '../Resources/Include/footer.php'
    ?>
</body>

</html>