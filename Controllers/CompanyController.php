<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        // Création des instances des modèles
        $companyModel = new Company();

        // Récupérer les 5 derniers enregistrements de la table 'companies'
        $companies = $companyModel->getCompanies();

        // Passer les données aux vues correspondantes
        return $this->view('companies', [
            'name' => 'Cogip',
            'companies' => $companies,
        ]);
    }
}