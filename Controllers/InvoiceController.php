<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Company;
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
        $invoiceModel = new Invoice();

        $invoiceModel->deleteInvoice($id);

        header('Location: /dashboard');
        exit();
    }
    public function update($id)
    {
        $invoiceModel = new Invoice();
        $ref = $_POST['ref'];
        $id_company = $_POST['id_company'];

        $errors = $invoiceModel->editInvoice($ref, $id_company, $id);

        if ($errors) {
            return $this->view('edit_invoice', ['errors' => $errors]);
        }

        header('Location: /dashboard');
    }

    public function add()
    {
        $ref = $_POST['ref'];
        $due_date = $_POST['due_date'];
        $company_name = $_POST['company_name'];

        $invoiceModel = new Invoice();

        $companyModel = new Company();
        $company = $companyModel->getCompanyByName($company_name);

        if ($company) {
            $id_company = $company['id'];
            $invoiceModel->newInvoice($ref, $id_company, $due_date);
            // $errors = $invoiceModel->newInvoice($ref, $due_date, $id_company);
        } else {
            echo "Company not found.";
            exit;
        }

        $errors = $invoiceModel->newInvoice($ref, $due_date, $id_company);

        if ($errors) {
            return $this->view('new_invoice', ['errors' => $errors]);
        }

        header('Location: /dashboard');
    }

    public function showInvoiceForm()
    {
        return $this->view('new_invoice');
    }
}