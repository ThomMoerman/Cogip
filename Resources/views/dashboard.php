<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/reset.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard_nav.css" rel="stylesheet" type="text/css">
    <script type="module" rel='javascript' src="assets/js/dashboard.js"></script>
    <title>Dashboard</title>
    
</head>
<body>
    <section id="dashboard__navbar">
        <div class="navbar__admin_block">
            <img src="assets/img/Avatar_two.svg" alt="profile pic">
            <h3>John Doe</h3>
        </div>
        <hr>
        <div class="navbar__buttons">
            <button class="nav btn_dashboard">Dashboard</button>
            <button class="nav btn_invoices">Invoices</button>
            <button class="nav btn_companies">Companies</button>
            <button class="nav btn_contacts">Contacts</button>
        </div>
    </section>
    <main>
            <section class="dashboard__header" >
            <div class="header_name"></div>
            <h2>Dashboard</h2>
            <p>dashboard/</p>
            <div class="header_message">
            <h3>Welcome back Henry!</h3>
            <p>You can here add an invoice, a company and some contacts</p>
            <img src="" alt="">
            </div>
            </div>
            <section class="dashboard__data" id="3">
                
                <article class="data_table" id="invoices">
                    <h4>Last Invoices</h4>
                </article>
                <article class="data_table" id="contacts">
                    <h4>Last Contacts</h4>
                </article>
                <article class="data_table" id="companies">
                    <h4>Last Companies</h4>
                </article>
            </section>
    </main>
    
</body>
</html>