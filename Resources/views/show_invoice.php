<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/reset.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/header.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/welcome.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/footer.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/table.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/invoices.css" rel="stylesheet" type="text/css">
    <title>Cogip - Show Invoice</title>
</head>
<body>
    <?php
        require '../Resources/Include/header.php'
    ?>
    <main>
        <section class="section__client">
            <div class="client__name">
                <h3 class="name__display">pied pipper</h3>
            <div class="color__band"></div>
            </div>
            <div class="client__information">
                <p class="information__label"><b>Name:</b> Pied Pipper</p>
                <p class="information__label">TVA: BE87 876 767 565</p>
                <p class="information__label">Country: Belgium</p>
                <p class="information__label">Type: Supplier</p>
            </div>
        </section>
        <section>
            <hr>
        </section>
        <section class="section__contact">
            <div>
                <h3>Contact people</h3>
            </div>
            <div class="contact__identity">
                <div class="person">
                    <img src="../assets/img/Avatar_one.svg" alt="picture of contact people">
                    <p>Bertram Gilfoyle</p>
                </div>
                <div class="person">
                    <img src="../assets/img/Avatar_two.svg" alt="picture of contact people">
                    <p>Henry George</p>
                </div>
            </div>
        </section>
        <section>
            <hr>
        </section>
        <section class="section table_show_invoice">
        </section>
    </main>
    <?php
        require '../Resources/Include/footer.php'
    ?>
</body>
</html>