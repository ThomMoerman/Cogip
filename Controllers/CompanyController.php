<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        // Récupérer le numéro de page à afficher (par exemple, depuis une requête GET)
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

        // Définir le nombre d'enregistrements par page
        $perPage = 10;

        // Création de l'instance du modèle
        $companyModel = new Company();

        // Récupérer le nombre total d'enregistrements dans la table 'companies'
        $totalRecords = $companyModel->getTotalCompanyCount();

        // Calculer le nombre total de pages
        $totalPages = ceil($totalRecords / $perPage);

        // Vérifier si la page demandée dépasse le nombre total de pages
        if ($page > $totalPages) {
            // Rediriger vers la dernière page si la page demandée est invalide
            header('Location: /companies?page=' . $totalPages);
            exit();
        }

        // Calculer l'offset pour la requête SQL
        $offset = ($page - 1) * $perPage;

        // Récupérer les enregistrements pour la page demandée
        $companies = $companyModel->getPaginatedCompanies($offset, $perPage);

        // Passer les données aux vues correspondantes
        return $this->view('companies', [
            'name' => 'Cogip',
            'companies' => $companies,
            'totalPages' => $totalPages,
            'currentPage' => $page
        ]);
    }

    public function show($id)
    {
        // Récupérez les informations de l'entreprise depuis la base de données en utilisant l'ID
        $companyModel = new Company();
        $company = $companyModel->find($id);
        $invoicesByCompany = $companyModel->getLatestInvoicesByCompany(5, $id);

        // Vérifiez si l'entreprise existe
        if (!$company) {
            // alert('The choosen company doesn\'t exists');
        }

        // Préparez les données à envoyer à la vue
        $data = [
            'name' => $company['name'],
            'tva' => $company['tva'],
            'country' => $company['country'],
            'type' => $company['type_name'],
            'created_at' => $company['created_at'],
            'lastinvoices' => $invoicesByCompany
        ];

        // Renvoyez les données à la vue appropriée pour l'affichage
        $this->view('show_company', $data);

    }
}