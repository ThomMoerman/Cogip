<?php

namespace App\Models;

use App\Core\DatabaseConnection;

class Company
{
    private $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getInstance();
    }

    public function getLatestCompanies($limit)
    {
        $query = "SELECT * FROM companies ORDER BY created_at DESC LIMIT :limit";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getCompanies()
    {
        $query = "SELECT * FROM companies ORDER BY created_at DESC";
        $statement = $this->db->prepare($query);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}

?>