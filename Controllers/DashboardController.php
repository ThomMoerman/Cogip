<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Invoice;
use App\Models\Company;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function index()
    {
        $invoiceModel = new Invoice();
        $invoices = $invoiceModel->getLatestInvoices(5);

        $companyModel = new Company();
        $companies = $companyModel->getLatestCompanies(5);

        $contactModel = new Contact();
        $contacts = $contactModel->getLatestContacts(5);

        return $this->view('dashboard', [
            'invoices' => $invoices,
            'companies' => $companies,
            'contacts' => $contacts
        ]);
    }
    public function editInvoiceIndex()
    {
        return $this->view('edit-invoice');
    }
    public function editCompanyIndex()
    {
        return $this->view('edit-company');
    }
    public function editContactIndex()
    {
        return $this->view('edit-contact');
    }
}