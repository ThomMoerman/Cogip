<?php

namespace App\Models;

use App\Core\DatabaseConnection;

class Contact
{
    private $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getInstance();
    }

    public function getLatestContacts($limit)
    {
        $query = "SELECT * FROM contacts ORDER BY created_at DESC LIMIT :limit";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getContacts()
    {
        $query = "SELECT * FROM contacts ORDER BY created_at DESC";
        $statement = $this->db->prepare($query);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function find($id)
    {
        $query = "SELECT contacts.*, companies.name AS company_name 
        FROM contacts
        LEFT JOIN companies ON contacts.company_id = companies.id
        WHERE contacts.id = :id";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
    public function getTotalContactCount()
    {
        $query = "SELECT COUNT(*) as total FROM contacts";
        $statement = $this->db->prepare($query);
        $statement->execute();

        $result = $statement->fetch(\PDO::FETCH_ASSOC);

        return $result['total'];
    }
    public function getPaginatedContacts($offset, $perPage)
    {
        $query = "SELECT contacts.*, companies.name AS company_name FROM contacts
        LEFT JOIN companies ON contacts.company_id = companies.id
        ORDER BY contacts.id ASC 
        LIMIT :offset, :perPage";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $statement->bindValue(':perPage', $perPage, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}