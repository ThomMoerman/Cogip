<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Invoice;
use App\Models\Company;
use App\Models\Contact;

class HomeController extends Controller
{
    public function index()
    {
        // Création des instances des modèles
        $invoiceModel = new Invoice();
        $companyModel = new Company();
        $contactModel = new Contact();

        // Récupérer les 5 derniers enregistrements de la table 'invoices'
        $invoices = $invoiceModel->getLatestInvoices(5);

        // Récupérer les 5 derniers enregistrements de la table 'companies'
        $companies = $companyModel->getLatestCompanies(5);

        // Récupérer les 5 derniers enregistrements de la table 'contacts'
        $contacts = $contactModel->getLatestContacts(5);

        // Passer les données aux vues correspondantes
        return $this->view('welcome', [
            'name' => 'Cogip',
            'invoices' => $invoices,
            'companies' => $companies,
            'contacts' => $contacts
        ]);
    }
}