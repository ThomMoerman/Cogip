
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/reset.css" rel="stylesheet" type="text/css">
    <link href="assets/css/header.css" rel="stylesheet" type="text/css">
    <link href="assets/css/welcome.css" rel="stylesheet" type="text/css">
    <link href="assets/css/footer.css" rel="stylesheet" type="text/css">
    <script src="assets/js/home_table.js"defer></script>
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
        <article class="section invoices__table_section" id="invoices_list">
        </article>
        <article class="section contacts__table_section" id="companies_list">
        </article>
        <article class="section companies__table_section" id="contacts_list">

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
    </main> -->