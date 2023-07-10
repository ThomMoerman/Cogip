<?php

?>
<section class="container section" id="info_table">

    <h3>All companies</h3>

    <!-- Afficher le tableau des entreprises -->
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