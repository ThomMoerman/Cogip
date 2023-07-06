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
}