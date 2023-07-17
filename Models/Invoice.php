<?php

namespace App\Models;

use App\Core\DatabaseConnection;
use Rakit\Validation\Validator;

class Invoice
{
    private $db;
    private $validator;


    public function __construct()
    {
        $this->db = DatabaseConnection::getInstance();
        $this->validator = new Validator();
    }

    public function getLatestInvoices($limit)
    {
        $query = "SELECT invoices.*, companies.name AS company_name 
        FROM invoices 
        INNER JOIN companies ON invoices.id_company = companies.id 
        ORDER BY invoices.created_at DESC 
        LIMIT :limit";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getInvoices()
    {
        $query = "SELECT * FROM invoices ORDER BY created_at DESC";
        $statement = $this->db->prepare($query);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $query = "SELECT invoices.*, companies.name AS company_name FROM invoices 
        LEFT JOIN companies ON invoices.id_company = companies.id 
        WHERE invoices.id = :id";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
    public function getTotalInvoiceCount()
    {
        $query = "SELECT COUNT(*) as total FROM invoices";
        $statement = $this->db->prepare($query);
        $statement->execute();

        $result = $statement->fetch(\PDO::FETCH_ASSOC);

        return $result['total'];
    }
    public function getPaginatedInvoices($offset, $perPage)
    {
        $query = "SELECT invoices.*, types.name AS type_name FROM invoices 
        LEFT JOIN types ON invoices.id_company = types.id 
        ORDER BY invoices.id ASC 
        LIMIT :offset, :perPage";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $statement->bindValue(':perPage', $perPage, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function newInvoice($ref, $due_date, $id_company)
    {
        $validation = $this->validator->make([
            'ref' => $ref,
            'due_date' => $due_date,
            'id_company' => $id_company,
        ], [
            'ref' => 'required',
            'due_date' => 'required|date',
            'id_company' => 'required|numeric',
        ]);

        $validation->validate();

        if ($validation->fails()) {
            $errors = $validation->errors()->firstOfAll();

            $errorMessages = [];
            foreach ($errors as $field => $message) {
                $errorMessages[] = ucfirst($field) . ': ' . $message;
            }

            return $errorMessages;
        }

        $query = "INSERT INTO invoices (ref, due_date, id_company, created_at, updated_at) VALUES
        (:ref, :due_date, :id_company, now(), now())";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':ref', $ref);
        $statement->bindParam(':due_date', $due_date);
        $statement->bindParam(':id_company', $id_company);
        $statement->execute();
    }

    public function deleteInvoice($id)
    {
        $query = "DELETE from invoices WHERE id = $id";
        $statement = $this->db->prepare($query);
        $statement->execute();
    }
    public function editInvoice($ref, $id_company, $id)
    { 
        $validation = $this->validator->make([
            'ref' => $ref,
            'id_company' => $id_company,
        ], [
            'ref' => 'required',
            'id_company' => 'required|numeric',
        ]);

        $validation->validate();

        if ($validation->fails()) {
            $errors = $validation->errors()->firstOfAll();

            $errorMessages = [];
            foreach ($errors as $field => $message) {
                $errorMessages[] = ucfirst($field) . ': ' . $message;
            }

            return $errorMessages;
        }

        $query = "UPDATE invoices SET ref = :ref, id_company = :id_company, updated_at = NOW() WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':ref', $ref, \PDO::PARAM_STR);
        $statement->bindValue(':id_company', $id_company, \PDO::PARAM_INT);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }


}