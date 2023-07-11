<?php

namespace App\Models;

use App\Core\DatabaseConnection;

class User
{
    private $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getInstance();
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
