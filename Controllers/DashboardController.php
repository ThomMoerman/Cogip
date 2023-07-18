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
        $totalInvoiceCount = $invoiceModel->getTotalInvoiceCount();

        $companyModel = new Company();
        $companies = $companyModel->getLatestCompanies(5);
        $totalCompanyCount = $companyModel->getTotalCompanyCount();

        $contactModel = new Contact();
        $contacts = $contactModel->getLatestContacts(5);
        $totalContactCount = $contactModel->getTotalContactCount();

        return $this->view('dashboard', [
            'invoices' => $invoices,
            'totalInvoices' => $totalInvoiceCount,
            'companies' => $companies,
            'totalCompanies' => $totalCompanyCount,
            'contacts' => $contacts,
            'totalContacts' => $totalContactCount
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
    public function deleteContactIndex()
    {
        return $this->view('delete-contact');
    }
    public function deleteCompanyIndex()
    {
        return $this->view('delete-company');
    }
    public function deleteInvoiceIndex()
    {
        return $this->view('delete-invoice');
    }
}