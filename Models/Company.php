<?php

namespace App\Models;

use App\Core\DatabaseConnection;
use Rakit\Validation\Validator;

class Company
{
    private $db;
    private $validator;

    public function __construct()
    {
        $this->db = DatabaseConnection::getInstance();
        $this->validator = new Validator();
    }

    public function getLatestCompanies($limit)
    {
        $query = "SELECT companies.*, types.name AS company_type 
        FROM companies
        INNER JOIN types ON companies.type_id = types.id 
        ORDER BY companies.created_at DESC 
        LIMIT :limit";
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
    public function getLatestInvoicesByCompany($limit, $id)
    {
        $query = "SELECT * FROM invoices LEFT JOIN companies ON invoices.id_company = companies.id where id_company = $id ORDER BY invoices.created_at DESC LIMIT :limit";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function newCompany($name, $type_id, $country, $tva)
    {
        $validation = $this->validator->make([
            'name' => $name,
            'type_id' => $type_id,
            'country' => $country,
            'tva' => $tva,
        ], [
            'name' => 'required',
            'type_id' => 'required|numeric',
            'country' => 'required',
            'tva' => 'required',
        ]);

        $validation->validate();

        if ($validation->fails()) {
            $errors = $validation->errors()->firstOfAll();

            // Formatage des messages d'erreur
            $errorMessages = [];
            foreach ($errors as $field => $message) {
                $errorMessages[] = ucfirst($field) . ': ' . $message;
            }

            // Retourne les messages d'erreur à l'appelant
            return $errorMessages;
        }

        $query = "INSERT INTO companies (name, type_id, country, tva, created_at, updated_at) VALUES
        (:name, :type_id, :country, :tva, now(), now())";

        $statement = $this->db->prepare($query);
        $statement->bindValue(':name', $name, \PDO::PARAM_STR);
        $statement->bindValue(':type_id', $type_id, \PDO::PARAM_INT);
        $statement->bindValue(':country', $country, \PDO::PARAM_STR);
        $statement->bindValue(':tva', $tva, \PDO::PARAM_STR);
        $statement->execute();
    }

    public function deleteCompany($id)
    {
        $query = "DELETE from companies WHERE id = $id";
        $statement = $this->db->prepare($query);
        $statement->execute();
    }
    public function getCompanyByName($company_name)
    {
        $sql = "SELECT * FROM companies WHERE name = :name";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name', $company_name);
        $stmt->execute();

        $company = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $company;
    } 

    public function editCompany($id, $name, $type_id)
    {
        $validation = $this->validator->make([
            'name' => $name,
            'type_id' => $type_id,
        ], [
            'name' => 'required',
            'type_id' => 'required|numeric',
        ]);

        $validation->validate();

        if ($validation->fails()) {
            $errors = $validation->errors()->firstOfAll();

            // Formatage des messages d'erreur
            $errorMessages = [];
            foreach ($errors as $field => $message) {
                $errorMessages[] = ucfirst($field) . ': ' . $message;
            }

            // Retourne les messages d'erreur à l'appelant
            return $errorMessages;
        }

        $query = "UPDATE companies SET name = :name, type_id = :type_id, updated_at = now() WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':name', $name, \PDO::PARAM_STR);
        $statement->bindValue(':type_id', $type_id, \PDO::PARAM_INT);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }

}
;
?>