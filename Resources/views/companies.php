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
    <title>Companies</title>
</head>

<body>
    <?php
        require '../Resources/Include/header.php'
    ?>
    <main>
        <section class="container section" id="info_table">

            <h3>All companies</h3>

            <!-- Afficher le tableau des entreprises -->
            <table id='list_table'>
                <!-- En-têtes de colonne -->
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Pays</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <!-- Données -->
                <tbody>
                    <?php foreach ($companies as $company): ?>
                        <tr>
                            <td>
                                <?php echo $company['id']; ?>
                            </td>
                            <td><a href="/companies/<?php echo $company['id']; ?>"><?php echo $company['name']; ?></a></td>
                            <td>
                                <?php echo $company['country']; ?>
                            </td>
                            <td>
                                <?php echo $company['type_name']; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Afficher la pagination -->
            <div class="pagination">
                <?php if ($currentPage > 1): ?>
                    <!-- Afficher la flèche précédente si ce n'est pas la première page -->
                    <a href="/companies?page=<?php echo ($currentPage - 1); ?>" class="arrow">← Previous</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <?php if ($i == $currentPage): ?>
                        <!-- Afficher la page courante en gras ou d'une autre manière pour la distinguer -->
                        <span class="current-page">
                            <?php echo $i; ?>
                        </span>
                    <?php else: ?>
                        <!-- Afficher les autres pages comme des liens -->
                        <a href="/companies?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php endif; ?>
                <?php endfor; ?>

                <?php if ($currentPage < $totalPages): ?>
                    <!-- Afficher la flèche suivante si ce n'est pas la dernière page -->
                    <a href="/companies?page=<?php echo ($currentPage + 1); ?>" class="arrow">Next →</a>
                <?php endif; ?>
            </div>
        </section>
    </main>
    <?php
        require '../Resources/Include/footer.php'
    ?>
</body>

</html>