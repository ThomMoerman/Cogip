<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function index()
    {
        // Création des instances des modèles
        $invoiceModel = new Invoice();

        // Récupérer les 5 derniers enregistrements de la table 'companies'
        $invoices = $invoiceModel->getInvoices();

        // Passer les données aux vues correspondantes
        return $this->view('invoices', [
            'invoices' => $invoices,
        ]);
    }

    public function show($id) {
        // Récupérez les informations de l'entreprise depuis la base de données en utilisant l'ID
        $invoiceModel = new Invoice();
        $invoice = $invoiceModel->find($id);
    
        // Vérifiez si l'entreprise existe
        if (!$invoice) {
            alert('The choosen invoice doesn\'t exists');
        }
    
        // Préparez les données à envoyer à la vue
        $data = [
            'ref' => $invoice->ref,
            'company' => $invoice->company,
            'created_at' => $invoice->created_at
        ];
    
        // Renvoyez les données à la vue appropriée pour l'affichage
        return $this->view('show_invoice', $data);
    }
}