<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/default.css" rel="stylesheet" type="text/css">
    <link href="assets/css/welcome.css" rel="stylesheet" type="text/css">
    <link href="assets/css/table.css" rel="stylesheet" type="text/css">
    <title>Cogip - Welcome</title>
</head>

<body>
    <?php
    require '../Resources/Include/header_home.php'
        ?>
    <main>
        <?php if (isset($_SESSION['user_name'])): ?>
            <h3>Welcome back
                <?php echo $_SESSION['user_name'] ?>!
            </h3>
        <?php endif ?>

        <?php require 'table_function.php'; ?>
        <article class="section invoices__table_section">
            <h3>Last invoices</h3>
            <table>
                <th>Invoice number</th>
                <th>Dates due</th>
                <th>Company</th>
                <th>Created at</th>
                <?php
                tableInvoices($invoices);
                ?>
            </table>
        </article>
        <article class="section contacts__table_section">
            <h3>Last contacts</h3>
            <table>
                <th>Name</th>
                <th>Phone</th>
                <th>Mail</th>
                <th>Company</th>
                <th>Created at</th>
                <?php
                tableContacts($contacts);
                ?>
            </table>
        </article>
        <article class="section companies__table_section">
            <h3>Last companies</h3>
            <table>
                <th>Name</th>
                <th>TVA</th>
                <th>Country</th>
                <th>Type</th>
                <th>Created at</th>
                <?php
                tableCompanies($companies);
                ?>
            </table>
        </article>
        <article class="slogan bottom__page">
            <div class="page__foot__line">
                <p>work better in your company</p>
            </div>
            <div class="page__foot__illustration">
                <img src="assets/img/phone_illustration.svg" alt="phone illustration for applications"
                    class="illustration_phone">
                <img src="assets/img/rectangle_yellow.svg" alt="rectangle yellow" class="illustration_bg">
            </div>
        </article>
    </main>
    <?php
    require '../Resources/Include/footer.php'
        ?>
</body>

</html>