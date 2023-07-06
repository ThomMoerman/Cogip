<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        // Création des instances des modèles
        $companyModel = new Contact();

        // Récupérer les 5 derniers enregistrements de la table 'companies'
        $contacts = $companyModel->getContacts();

        // Passer les données aux vues correspondantes
        return $this->view('contacts', [
            'name' => 'Cogip',
            'contacts' => $contacts,
        ]);
    }
}