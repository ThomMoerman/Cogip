
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
        require '../Resources/Include/header.php'
    ?>
    <div id="headline">
    <img            src="assets/img/background_effect_hp.svg" 
                alt="background_effect"
                class="headline_bg">
        <h2 class="headline_text">MANAGE YOUR CUSTOMERS AND INVOICES EASLY</h2>
        <img            src="assets/img/Illustration.png" 
                alt="cogip logo"
                class="headline_illustration">
    </div>
    <main>
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
    </main>
    <?php
        require '../Resources/Include/footer.php'
    ?>
</body>
</html>

<!--  <main>
    <section class="container">
            <h1>Welcome to <?php echo $name ?></h1>
            <p>This base project is provided by BeCode</p>
            <ul>
                <li><a href="https://github.com/bramus/router" target="_blank">Bramus/Router</a></li>
                <li><a href="https://github.com/filp/whoops" target="_blank">Flip/Whoops</a></li>
                <li>dd() function</li>
                <li>redirect() function</li>
            </ul>
        </section>
    </main>
    <?php
        require '../Resources/Include/footer.php'
    ?>
</body>
</html>