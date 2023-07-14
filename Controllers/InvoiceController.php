<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function index()
    {
        // Récupérer le numéro de page à afficher (par exemple, depuis une requête GET)
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

        // Définir le nombre d'enregistrements par page
        $perPage = 10;

        // Création de l'instance du modèle
        $invoiceModel = new Invoice();

        // Récupérer le nombre total d'enregistrements dans la table 'invoices'
        $totalRecords = $invoiceModel->getTotalInvoiceCount();

        // Calculer le nombre total de pages
        $totalPages = ceil($totalRecords / $perPage);

        // Vérifier si la page demandée dépasse le nombre total de pages
        if ($page > $totalPages) {
            // Rediriger vers la dernière page si la page demandée est invalide
            header('Location: /invoices?page=' . $totalPages);
            exit();
        }

        // Calculer l'offset pour la requête SQL
        $offset = ($page - 1) * $perPage;

        // Récupérer les enregistrements pour la page demandée
        $invoices = $invoiceModel->getPaginatedInvoices($offset, $perPage);


        // Passer les données aux vues correspondantes
        return $this->view('invoices', [
            'name' => 'Cogip',
            'invoices' => $invoices,
            'totalPages' => $totalPages,
            'currentPage' => $page
        ]);
    }

    public function show($id)
    {
        // Récupérez les informations de l'entreprise depuis la base de données en utilisant l'ID
        $invoiceModel = new Invoice();
        $invoice = $invoiceModel->find($id);

        // Vérifiez si l'entreprise existe
        if (!$invoice) {
            // alert('The choosen invoice doesn\'t exists');
        }

        // Préparez les données à envoyer à la vue
        $data = [
            'ref' => $invoice['ref'],
            'due_date' => $invoice['due_date'],
            'company_name' => $invoice['company_name'],
            'created_at' => $invoice['created_at']
        ];

        // Renvoyez les données à la vue appropriée pour l'affichage
        return $this->view('show_invoice', $data);
    }
    public function delete($id)
    {
        // Créez une instance du modèle Contact
        $invoiceModel = new Invoice();

        // Appelez la méthode deleteContact pour supprimer le contact spécifié par l'ID
        $invoiceModel->deleteInvoice($id);

        // Redirigez vers la page index des contacts après la suppression
        header('Location: /dashboard');
        exit();
    }
    public function update($id)
    {
        // Créez une instance du modèle Contact
        $invoiceModel = new Invoice();
        $ref = $_POST['ref'];
        $id_company = $_POST['id_company'];

        // Appelez la méthode deleteinvoice pour supprimer le invoice spécifié par l'ID
        $invoiceModel->editInvoice($ref, $id_company, $id);

        // Redirigez vers la page index des contacts après la suppression
        header('Location: /dashboard');
    }
    public function add($ref, $id_company)
    {
        // Créez une instance du modèle Contact
        $invoiceModel = new Invoice();

        // Appelez la méthode deleteinvoice pour supprimer le invoice spécifié par l'ID
        $invoiceModel->newInvoice($ref, $id_company);

        // Redirigez vers la page index des contacts après la suppression
        return $this->view('edit');
    }
}