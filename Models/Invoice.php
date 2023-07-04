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
}