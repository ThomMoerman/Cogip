<?php

namespace App\Models;

use App\Core\DatabaseConnection;
use Rakit\Validation\Validator;


class User
{
    private $db;
    private $validator;


    public function __construct()
    {
        $this->db = DatabaseConnection::getInstance();
        $this->validator = new Validator();
    }

    public function getUsers()
    {
        $query = "SELECT * FROM users";
        $statement = $this->db->prepare($query);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $query = "SELECT * FROM users WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function createUser($firstName, $roleId, $lastName, $email, $password)
    {
        $validation = $this->validator->make([
            'firstName' => $firstName,
            'roleId' => $roleId,
            'lastName' => $lastName,
            'email' => $email,
            'password' => $password,
        ], [
            'firstName' => 'required',
            'roleId' => 'required|numeric',
            'lastName' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
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

        $query = "INSERT INTO users (first_name, role_id, last_name, email, password, created_at, updated_at)
                VALUES (:firstName, :roleId, :lastName, :email, :password, NOW(), NOW())";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':firstName', $firstName, \PDO::PARAM_STR);
        $statement->bindValue(':roleId', $roleId, \PDO::PARAM_INT);
        $statement->bindValue(':lastName', $lastName, \PDO::PARAM_STR);
        $statement->bindValue(':email', $email, \PDO::PARAM_STR);
        $statement->bindValue(':password', $password, \PDO::PARAM_STR);
        $statement->execute();

        return $this->db->lastInsertId();
    }


    public function updateUser($id, $firstName, $roleId, $lastName, $email, $password)
    {
        $query = "UPDATE users SET first_name = :firstName, role_id = :roleId, last_name = :lastName,
                  email = :email, password = :password, updated_at = NOW() WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->bindValue(':firstName', $firstName, \PDO::PARAM_STR);
        $statement->bindValue(':roleId', $roleId, \PDO::PARAM_INT);
        $statement->bindValue(':lastName', $lastName, \PDO::PARAM_STR);
        $statement->bindValue(':email', $email, \PDO::PARAM_STR);
        $statement->bindValue(':password', $password, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->rowCount();
    }

    public function deleteUser($id)
    {
        $query = "DELETE FROM users WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->rowCount();
    }

    public function findUserByEmail($email)
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':email', $email, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
}
