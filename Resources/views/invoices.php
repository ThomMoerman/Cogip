<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/default.css" rel="stylesheet" type="text/css">
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
            <table class="invoices_table" id='list_table'>
                <thead>
                    <th>Invoice number</th>
                    <th>Due dates</th>
                    <th>Company</th>
                    <th>Created at</th>
                </thead>
                <tbody>
                    <?php foreach ($invoices as $invoice_data): ?>
                        <tr>
                            <td><a href="/invoices/<?php echo $invoice_data['id']; ?>"><?php echo $invoice_data['ref']; ?></a></td>
                            <td><?php echo $invoice_data['due_date'] ?></td>
                            <td><?php echo $invoice_data['id_company'] ?></td>
                            <td><?php echo $invoice_data['created_at'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- Pagination  -->
            <div class="pagination">
                <?php if ($currentPage > 1): ?> <!-- Si $currentPage plus grand que 1, nous ne sommes pas sur la 1ère page -->
                    <!-- Affichage de la flèche précédente si la page ACTUELLE n'est pas la première page -->
                    <a href="/invoices?page=<?php echo ($currentPage - 1); ?>" class="arrow">← Previous</a><!-- Création d'un lien vers la page précédente > ($currentPage - 1) indique le numéro de page dans le lien '/invoices?page='-->
                <?php endif; ?><!-- endif = fin de la structure conditionnelle -->

                <?php for ($i = 1; $i <= $totalPages; $i++): ?><!-- Itération à travers les numéros de page, à chaque itération $i = numéro page en cours -->
                    <?php if ($i == $currentPage): ?><!-- vérification si $i = page actuelle...-->
                        <!-- ... affichage de la page courante en gras... -->
                        <span class="current-page">
                            <?php echo $i; ?>
                        </span>
                    <?php else: ?>
                        <!-- ... sinon, affichage des autres pages comme des liens -->
                        <a href="/invoices?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php endif; ?>
                <?php endfor; ?><!-- fin des 2 structures conditionnelles -->

                <?php if ($currentPage < $totalPages): ?>
                    <a href="/invoices?page=<?php echo ($currentPage + 1); ?>" class="arrow">Next →</a>
                <?php endif; ?>
                <!-- Si la page actuelle est < au nombre total de page, donc que ce n'est pas la dernière page, création d'un lien vers la page suivante -->
            </div>
        </section>
    </main>
    <?php
        require '../Resources/Include/footer.php'
    ?>
</body>
</html>