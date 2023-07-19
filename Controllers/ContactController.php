<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Company;
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
        // Récupérez les informations du contact depuis la base de données en utilisant l'ID
        $contactModel = new Contact();
        $contact = $contactModel->find($id);

        // Vérifiez si le contact existe
        if (!$contact) {
            // alert('The chosen contact doesn\'t exist');
        }

        // Préparez les données à envoyer à la vue
        $data = [
            'name' => isset($contact['name']) ? $contact['name'] : '',
            'phone' => isset($contact['phone']) ? $contact['phone'] : '',
            'mail' => isset($contact['email']) ? $contact['email'] : '',
            'company_name' => isset($contact['company_name']) ? $contact['company_name'] : '',
            'created_at' => isset($contact['created_at']) ? $contact['created_at'] : ''
        ];

        // Renvoyez les données à la vue appropriée pour l'affichage
        return $this->view('show_contact', $data);
    }
    public function delete($id)
    {
        // Créez une instance du modèle Contact
        $contactModel = new Contact();

        // Appelez la méthode deleteContact pour supprimer le contact spécifié par l'ID
        $contactModel->deleteContact($id);

        // Redirigez vers la page dashboard après la suppression
        header("Location: /dashboard");
    }
    public function update($id)
    {
        $name = $_POST['name'];
        $company_name = $_POST['company_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $contactModel = new Contact();

        $companyModel = new Company();
        $company = $companyModel->getCompanyByName($company_name);

        if ($company) {
            $company_id = $company['id'];
            $errors = $contactModel->editContact($id, $name, $company_id, $email, $phone);
            if ($errors) {
                return $this->view('edit_contact', ['errors' => $errors]);
            }
        } else {
            $error_message = "Company not found.";
            return $this->view('edit-contact', ['error_message' => $error_message]);
        }
        header('Location: /dashboard');
    }

    public function add()
    {
        $name = $_POST['name'];
        $company_name = $_POST['company_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $contactModel = new Contact();

        $companyModel = new Company();
        $company = $companyModel->getCompanyByName($company_name);

        if ($company) {
            $company_id = $company['id'];
            $errors = $contactModel->newContact($name, $company_id, $email, $phone);
            if ($errors) {
                return $this->view('new_contact', ['errors' => $errors]);
            }
        } else {
            $error_message = "Company not found.";
            return $this->view('new_contact', ['error_message' => $error_message]);
        }

        header('Location: /dashboard');
    }

    public function showContactForm()
    {
        return $this->view('new_contact');
    }
}