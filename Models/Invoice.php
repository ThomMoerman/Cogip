<?php

namespace App\Models;

use App\Core\DatabaseConnection;

class Invoice
{
    private $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getInstance();
    }

    public function getLatestInvoices($limit)
    {
        $query = "SELECT * FROM invoices ORDER BY created_at DESC LIMIT :limit";
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
        $query = "SELECT * FROM invoices WHERE id = :id";
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
}