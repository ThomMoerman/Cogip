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

    public function show($id) {
        // Récupérez les informations de l'entreprise depuis la base de données en utilisant l'ID
        $companyModel = new Company();
        $company = $companyModel->find($id);
    
        // Vérifiez si l'entreprise existe
        if (!$company) {
            alert('The choosen company doesn\'t exists');
        }
    
        // Préparez les données à envoyer à la vue
        $data = [
            'name' => $company->name,
            'tva' => $company->tva,
            'country' => $company->country,
            'type' => $company->type
        ];
    
        // Renvoyez les données à la vue appropriée pour l'affichage
        $this->view('show_company', $data);
    }
}