<?php

namespace App\Models;

use App\Core\DatabaseConnection;
use Rakit\Validation\Validator;


class Contact
{
    private $db;
    private $validator;

    public function __construct()
    {
        $this->db = DatabaseConnection::getInstance();
        $this->validator = new Validator();
    }

    public function getLatestContacts($limit)
    {
        $query = "SELECT contacts.*, companies.id AS company_id, companies.name AS company_name
        FROM contacts
        INNER JOIN companies ON contacts.company_id = companies.id
        ORDER BY contacts.created_at DESC
        LIMIT :limit";
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
    public function newContact($name, $company_id, $email, $phone)
    {
        $validation = $this->validator->make([
            'name' => $name,
            'company_id' => $company_id,
            'email' => $email,
            'phone' => $phone,
        ], [
            'name' => 'required',
            'company_id' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
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

        $query = "INSERT INTO contacts (name, company_id, email, phone, created_at, updated_at) VALUES
        (:name, :company_id, :email, :phone, now(), now())";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':company_id', $company_id);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':phone', $phone);
        $statement->execute();
    }

    public function deleteContact($id)
    {
        $query = "DELETE from contacts WHERE id = $id";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function editContact($id, $name, $company_id, $email, $phone)
    {
        $validation = $this->validator->make([
            'name' => $name,
            'company_id' => $company_id,
            'email' => $email,
            'phone' => $phone,
        ], [
            'name' => 'required',
            'company_id' => 'required|numeric',
            'email' => 'required|email',
            'phone' => 'required',
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

        $query = "UPDATE contacts SET name = :name, company_id = :company_id, email = :email, phone = :phone, updated_at = now() WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':name', $name, \PDO::PARAM_STR);
        $statement->bindValue(':company_id', $company_id, \PDO::PARAM_INT);
        $statement->bindValue(':email', $email, \PDO::PARAM_STR);
        $statement->bindValue(':phone', $phone, \PDO::PARAM_STR);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }

}