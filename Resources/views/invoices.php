<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/reset.css" rel="stylesheet" type="text/css">
    <link href="assets/css/header.css" rel="stylesheet" type="text/css">
    <link href="assets/css/footer.css" rel="stylesheet" type="text/css">
    <link href="assets/css/table.css" rel="stylesheet" type="text/css">
    <script rel='javascript' src="assets/js/searchfilter.js" defer></script>
    <title>Invoices</title>
</head>
<body>
    <?php
        require '../Resources/Include/header.php'
    ?>
    <main>
        <section class="section invoices_table_section">
            <h3>All invoices</h3>
            <table class="invoices_table">
                <thead>
                    <th>Invoice number</th>
                    <th>Due dates</th>
                    <th>Company</th>
                    <th>Created at</th>
                </thead>
                <tbody>
                    <?php foreach ($invoices as $invoice_data): ?>
                        <tr>
                            <td><?php echo $invoice_data['ref'] ?></td>
                            <td><?php echo $invoice_data['due_date'] ?></td>
                            <td><?php echo $invoice_data['id_company'] ?></td>
                            <td><?php echo $invoice_data['created_at'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
    <?php
        require '../Resources/Include/footer.php'
    ?>
</body>
</html>