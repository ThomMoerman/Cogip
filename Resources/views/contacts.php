<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/default.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/table.css" rel="stylesheet" type="text/css">
    <script rel='javascript' src="assets/js/searchfilter.js" defer></script>
    <title>Contacts</title>
</head>

<body>
    <?php
    require '../Resources/Include/header.php'
        ?>
    <main>
        <section class="container section">
        <div class="title__filter">
                <div class="title__section">
                    <h3>All contacts</h3>
                    <div class="color__band_company"></div>
                </div>
                <div class="filter__section"></div>
            </div>
            <!-- Afficher le tableau des entreprises -->
            <table id='list_table'>
                <!-- En-têtes de colonne -->
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Mail</th>
                        <th>Company</th>
                        <th>Created at</th>

                    </tr>
                </thead>
                <!-- Données -->
                <tbody>
                    <?php foreach ($contacts as $contact): ?>
                        <tr>
                            <td>
                                <a href="/contacts/<?php echo $contact['id']; ?>"><?php echo $contact['name']; ?></a>
                            </td>
                            <td>
                                <?php echo $contact['phone']; ?>
                            </td>
                            <td>
                                <?php echo $contact['email']; ?>
                            </td>
                            <td>
                                <?php echo $contact['company_name']; ?>
                            </td>
                            <td>
                                <?php echo date('d-m-Y', strtotime($contact['created_at'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Afficher la pagination -->
            <div class="pagination">
                <?php if ($currentPage > 1): ?>
                    <!-- Afficher la flèche précédente si ce n'est pas la première page -->
                    <a href="/contacts?page=<?php echo ($currentPage - 1); ?>" class="arrow">←</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <?php if ($i == $currentPage): ?>
                        <!-- Afficher la page courante en gras ou d'une autre manière pour la distinguer -->
                        <span class="current-page">
                            <?php echo $i; ?>
                        </span>
                    <?php else: ?>
                        <!-- Afficher les autres pages comme des liens -->
                        <a href="/contacts?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php endif; ?>
                <?php endfor; ?>

                <?php if ($currentPage < $totalPages): ?>
                    <!-- Afficher la flèche suivante si ce n'est pas la dernière page -->
                    <a href="/contacts?page=<?php echo ($currentPage + 1); ?>" class="arrow">→</a>
                <?php endif; ?>
            </div>
        </section>
    </main>
    <?php
    require '../Resources/Include/footer.php'
        ?>
</body>

</html>