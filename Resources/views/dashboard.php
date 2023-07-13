<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/reset.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard_nav.css" rel="stylesheet" type="text/css">
    <link href="assets/css/table.css" rel="stylesheet" type="text/css">
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
            <section class="dashboard__data">
    <div class="section">
        <h2>Last Invoices</h2>
        <table id="invoicesTable">
            <tr>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Company</th>
            </tr>
            <?php foreach ($invoices as $invoice): ?>
                <tr>
                    <td><a href="/edit-invoice.php?id=<?php echo $invoice['id']; ?>"><?php echo $invoice['ref']; ?></a></td>
                    <td><?php echo $invoice['due_date']; ?></td>
                    <td><a href="/edit-company.php?id=<?php echo $invoice['id_company']; ?>"><?php echo $invoice['company_name']; ?></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="section">
        <h2>Last Companies</h2>
        <table id="companiesTable">
            <tr>
                <th>Company Name</th>
                <th>Type</th>
            </tr>
            <?php foreach ($companies as $company): ?>
                <tr>
                    <td><a href="/edit-company.php?id=<?php echo $company['id']; ?>"><?php echo $company['name']; ?></a></td>
                    <td><?php echo $company['company_type']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="section">
        <h2>Last Contacts</h2>
        <table id="contactsTable">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Company</th>
            </tr>
            <?php foreach ($contacts as $contact): ?>
                <tr>
                    <td><a href="/edit-contact.php?id=<?php echo $contact['id']; ?>"><?php echo $contact['name']; ?></a></td>
                    <td><?php echo $contact['phone']; ?></td>
                    <td><?php echo $contact['email']; ?></td>
                    <td><a href="/edit-company.php?id=<?php echo $contact['company_id']; ?>"><?php echo $contact['company_name']; ?></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</section>

    </main>
    
</body>
</html>