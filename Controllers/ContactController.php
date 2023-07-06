<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        // Création des instances des modèles
        $contactModel = new Contact();

        // Récupérer les 5 derniers enregistrements de la table 'companies'
        $contacts = $contactModel->getContacts();

        // Passer les données aux vues correspondantes
        return $this->view('contacts', [
            'name' => 'Cogip',
            'contacts' => $contacts,
        ]);
    }
    public function show($id)
    {
        // Récupérez les informations de l'entreprise depuis la base de données en utilisant l'ID
        $contactModel = new Contact();
        $contact = $contactModel->find($id);

        // Vérifiez si l'entreprise existe
        if (!$contact) {
            // alert('The choosen contact doesn\'t exists');
        }

        // Préparez les données à envoyer à la vue
        $data = [
            'ref' => $contact->ref,
            'company' => $contact->company,
            'created_at' => $contact->created_at
        ];

        // Renvoyez les données à la vue appropriée pour l'affichage
        return $this->view('show_contact', $data);
    }
}