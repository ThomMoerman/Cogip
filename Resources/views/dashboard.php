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

</svg>
    <title>Dashboard</title>
</head>

<body>
<?php
     require '../Resources/Include/navbar_dashboard.php'
    ?>
    <main>
        <?php
            require '../Resources/Include/header_dashboard.php'
        ?>
            <section class="dashboard__data">
                <div class="data__statistics__contacts">
                    <div class="section statistics">
                        <h2>Statistics</h2>
                        <ul class="statistics__list">
                            <li class="statistics__invoices">
                                <span><?php echo $totalInvoices; ?></span>
                                <span>Invoices</span>
                            </li>
                            <li class="statistics__contacts">
                                <span><?php echo $totalContacts; ?></span>
                                <span>Contacts</span>
                            </li>
                            <li class="statistics__companies">
                                <span><?php echo $totalCompanies; ?></span>
                                <span>Companies</span>
                            </li>
                        </ul>
                    </div>
                    <div class="section contacts">
                        <h2>Last Contacts</h2>
                        <hr>
                        <table id="contactsTable">
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <!-- <th>Company</th> -->
                            </tr>
                            <?php foreach ($contacts as $contact): ?>
                                <tr>
                                    <td><a
                                            href="/edit-contact/<?php echo $contact['id']; ?>?id=<?php echo $contact['id']; ?>&name=<?php echo $contact['name']; ?>&company_id=<?php echo $contact['company_id']; ?>&email=<?php echo $contact['email']; ?>&phone=<?php echo $contact['phone']; ?>"><?php echo $contact['name']; ?></a></td>
                                    <td>
                                        <?php echo $contact['phone']; ?>
                                    </td>
                                    <td>
                                        <?php echo $contact['email']; ?>
                                    </td>
                                        <!-- <td><a
                                                href="/edit-contact/<?php echo $contact['id']; ?>?id=<?php echo $contact['id']; ?>&name=<?php echo $contact['name']; ?>&company_id=<?php echo $contact['company_id']; ?>&email=<?php echo $contact['email']; ?>&phone=<?php echo $contact['phone']; ?>"><?php echo $contact['company_name']; ?></a></td>
                                        <td><a href="/delete-contact/<?php echo $contact['id']; ?>">delete</a></td> -->
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>

                <div class="data__invoices data__companies">
                    <div class="section companies" >
                        <h2>Last Companies</h2>
                        <hr>
                        <table id="companiesTable">
                            <tr>
                                <th>Name</th>
                                <th>TVA</th>
                                <th>Country</th>
                                <th>Delete</th>
                            </tr>
                            <?php foreach ($companies as $company): ?>
                                <tr>
                                    <td><a
                                            href="/edit-company/<?php echo $company['id']; ?>?id=<?php echo $company['id']; ?>&name=<?php echo $company['name']; ?>&type_id=<?php echo $company['type_id']; ?>"><?php echo $company['name']; ?></a></td>
                                    <td>
                                        <?php echo $company['company_type']; ?>
                                    </td>
                                    <td> <?php echo $company['country'];?> </a></td>
                                    <td><a href="/delete-company/<?php echo $company['id']; ?>" class="delete">Delete</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <div class="section invoices">
                        <h2>Last Invoices</h2>
                        <hr>
                        <table id="invoicesTable">
                            <tr>
                                <th>Invoice Number</th>
                                <th>Date</th>
                                <th>Company</th>
                                <th>Delete</th>
                            </tr>
                            <?php foreach ($invoices as $invoice): ?>
                                <tr>
                                    <td><a
                                            href="/edit-invoice/<?php echo $invoice['id']; ?>?id=<?php echo $invoice['id']; ?>&ref=<?php echo $invoice['ref']; ?>&id_company=<?php echo $invoice['id_company']; ?>"><?php echo $invoice['ref']; ?></a>
                                    </td>
                                    <td>
                                        <?php echo $invoice['due_date']; ?>
                                    </td>
                                    <td><a
                                            href="/edit-invoice/<?php echo $invoice['id']; ?>?id=<?php echo $invoice['id']; ?>&ref=<?php echo $invoice['ref']; ?>&id_company=<?php echo $invoice['id_company']; ?>"><?php echo $invoice['company_name']; ?></a></td>
                                    <td><a href="/delete-invoice/<?php echo $invoice['id']; ?>">Delete</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </section>

    </main>

</body>

</html>
