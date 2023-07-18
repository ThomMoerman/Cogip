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
    public function showCompanyForm()
    {
        return $this->view('new_company');
    }
    public function delete($id)
    {
        // Créez une instance du modèle Contact
        $companyModel = new Company();

        // Appelez la méthode deleteContact pour supprimer le contact spécifié par l'ID
        $companyModel->deleteCompany($id);

        // Redirigez vers la page index des contacts après la suppression
        header('Location: /dashboard');
        exit();
    }
    public function update($id)
    {
        // Créez une instance du modèle Company
        $companyModel = new Company();

        $name = $_POST['name'];
        $type_id = $_POST['type_id'];

        // Appelez la méthode editCompany pour mettre à jour l'entreprise
        $errors = $companyModel->editCompany($id, $name, $type_id);

        if ($errors) {
            // Si des erreurs se sont produites, affichez-les dans la vue appropriée (par exemple, edit_company)
            return $this->view('edit_company', ['errors' => $errors]);
        }

        // Redirigez vers la page index des entreprises après la mise à jour
        header('Location: /dashboard');
    }
    public function add()
{
    $name = $_POST['name'];
    $type_id = $_POST['type_id'];
    $country = $_POST['country'];
    $tva = $_POST['tva'];

    // Créez une instance du modèle Company
    $companyModel = new Company();

    // Appelez la méthode newCompany pour ajouter l'entreprise
    $errors = $companyModel->newCompany($name, $type_id, $country, $tva);

    if ($errors) {
        // Si des erreurs se sont produites, affichez-les dans la vue new_company
        return $this->view('new_company', ['errors' => $errors]);
    }

    // Redirigez vers la page index des entreprises après l'ajout
    header('Location: /dashboard');
}
}