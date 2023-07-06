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

    public function find($id)
    {
        $query = "SELECT companies.*, types.name AS type_name FROM companies 
        LEFT JOIN types ON companies.type_id = types.id 
        WHERE companies.id = :id";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function getTotalCompanyCount()
    {
        $query = "SELECT COUNT(*) as total FROM companies";
        $statement = $this->db->prepare($query);
        $statement->execute();

        $result = $statement->fetch(\PDO::FETCH_ASSOC);

        return $result['total'];
    }

    public function getPaginatedCompanies($offset, $perPage)
    {
        $query = "SELECT companies.*, types.name AS type_name FROM companies 
        LEFT JOIN types ON companies.type_id = types.id 
        ORDER BY companies.id ASC 
        LIMIT :offset, :perPage";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $statement->bindValue(':perPage', $perPage, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}

?>