<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/default.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/table.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/show_company.css" rel="stylesheet" type="text/css">
    <title>Cogip - Show Invoice</title>
</head>
<body>
    <?php
        require '../Resources/Include/header.php'
    ?>
    <main>
            <section id="page_profile">
                <h2 class="page__head">
                <?php echo $data['name'];?>
                </h2>
                <div class="color__band"></div>
            <div class="page_info">
                <p class="information__label"><b>Name:</b><?php echo $data['name']; ?></p>
                <p class="information__label">TVA: <?php echo $data['tva']; ?></p>
                <p class="information__label">Country: <?php echo $data['country']; ?></p>
                <p class="information__label">Type: <?php echo $data['type']; ?></p>
            </div>
        </section>
        <section>
            <hr>
        </section>
        <section class="section__contact">
            <div>
                <h2>Contact people</h2>
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
            <h2>Last invoices</h2>    
        <table id='list_table'>
        <!-- En-têtes de colonne -->
        <thead>
            <tr>
                <th>Invoice Number</th>
                <th>Dates</th>
                <th>Company</th>
                <th>Created at</th>
            </tr>
        </thead>
        <!-- Données -->
        <tbody>
            <?php foreach ($lastinvoices as $invoice): ?>
                <tr>
                    <td>
                        <?php echo $invoice['ref']; ?>
                    </td>
                    <td>
                        <?php echo $invoice['due_date']; ?>
                    </td>
                    <td>
                        <?php echo $invoice['name']; ?>
                    </td>
                    <td>
                        <?php echo $invoice['created_at']; ?>
                    </td>
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