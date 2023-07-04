<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\DatabaseConnection;
use PDO;

class HomeController extends Controller
{
    public function index()
    {
        // Récupérer les 5 derniers enregistrements de la table 'invoices'
        $invoices = $this->getLatestRecords('invoices', 5);

        // Récupérer les 5 derniers enregistrements de la table 'companies'
        $companies = $this->getLatestRecords('companies', 5);

        // Récupérer les 5 derniers enregistrements de la table 'contacts'
        $contacts = $this->getLatestRecords('contacts', 5);

        // Passer les données aux vues correspondantes
        return $this->view('welcome', [
            'name' => 'Cogip',
            'invoices' => $invoices,
            'companies' => $companies,
            'contacts' => $contacts
        ]);
    }

    protected function getLatestRecords($table, $limit)
    {
        $pdo = DatabaseConnection::getInstance();

        $query = "SELECT * FROM $table ORDER BY created_at DESC LIMIT $limit";
        $statement = $pdo->prepare($query);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $records;
    }
}