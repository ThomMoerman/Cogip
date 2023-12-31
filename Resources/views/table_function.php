<?php
function tableInvoices($table_1)
{
    foreach ($table_1 as $row) {
        echo '
        <tr>
            <td>' . $row["ref"] . '</td>
            <td>' . date('d-m-Y', strtotime($row['due_date'])) . '</td>
            <td>' . $row["company_name"] . '</td>
            <td>' . date('d-m-Y', strtotime($row['created_at'])) . '</td>
        </tr>
        ';
    }
}


function tableContacts($table_2)
{
    foreach ($table_2 as $row) {
        echo '
        <tr>
            <td>' . $row["name"] . '</td>
            <td>' . $row["phone"] . '</td>
            <td>' . $row["email"] . '</td>
            <td>' . $row["company_name"] . '</td>
            <td>' .date('d-m-Y', strtotime($row['created_at'])) . '</td>
        </tr>
        ';
    }
}




function tableCompanies($table_3)
{
    foreach ($table_3 as $row) {
        echo '
        <tr>
            <td>' . $row["name"] . '</td>
            <td>' . $row["tva"] . '</td>
            <td>' . $row["country"] . '</td>
            <td>' . $row["company_type"] . '</td>
            <td>' . date('d-m-Y', strtotime($row['created_at'])) . '</td>
        </tr>
        ';
    }
}

?>