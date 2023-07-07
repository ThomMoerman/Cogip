<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        // Récupérer le numéro de page à afficher (par exemple, depuis une requête GET)
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

        // Définir le nombre d'enregistrements par page
        $perPage = 10;

        // Création de l'instance du modèle
        $contactModel = new Contact();

        // Récupérer le nombre total d'enregistrements dans la table 'contacts'
        $totalRecords = $contactModel->getTotalContactCount();

        // Calculer le nombre total de pages
        $totalPages = ceil($totalRecords / $perPage);

        // Vérifier si la page demandée dépasse le nombre total de pages
        if ($page > $totalPages) {
            // Rediriger vers la dernière page si la page demandée est invalide
            header('Location: /Contacts?page=' . $totalPages);
            exit();
        }

        // Calculer l'offset pour la requête SQL
        $offset = ($page - 1) * $perPage;

        // Récupérer les enregistrements pour la page demandée
        $contacts = $contactModel->getPaginatedContacts($offset, $perPage);

        // Passer les données aux vues correspondantes
        return $this->view('contacts', [
            'name' => 'Cogip',
            'contacts' => $contacts,
            'totalPages' => $totalPages,
            'currentPage' => $page
        ]);
    }
    public function show($id)
    {
        // Récupérez les informations de l'entreprise depuis la base de données en utilisant l'ID
        $ContactModel = new Contact();
        $Contact = $ContactModel->find($id);

        // Vérifiez si l'entreprise existe
        if (!$Contact) {
            // alert('The choosen Contact doesn\'t exists');
        }

        // Préparez les données à envoyer à la vue
        $data = [
            'ref' => $Contact->ref,
            'Contact' => $Contact->Contact,
            'created_at' => $Contact->created_at
        ];

        // Renvoyez les données à la vue appropriée pour l'affichage
        return $this->view('show_Contact', $data);
    }
}