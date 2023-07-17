<?php

namespace App\Controllers;

use App\Models\User;
use App\Core\Controller;
use Rakit\Validation\Validator;


class AuthController extends Controller
{
    private $validator;

    public function login()
    {   
        $this->validator = new Validator();

        session_start();
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validez les données, effectuez les vérifications nécessaires
        $validation = $this->validator->make([
            'email' => $email,
            'password' => $password,
        ], [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $validation->validate();

        if ($validation->fails()) {
            // Si la validation échoue, récupérez les erreurs et redirigez vers la page de connexion avec les messages d'erreur
            $errors = $validation->errors()->firstOfAll();
            $errorMessages = implode(', ', $errors);
            header('Location: /login?error=1&messages=' . urlencode($errorMessages));
            exit();
        }

        $userModel = new User();

        // Vérifiez si l'utilisateur existe dans la base de données
        $user = $userModel->findUserByEmail($email);

        if (!$user) {
            // Utilisateur non trouvé
            header('Location: /login?error=1&messages=User not found');
            exit();
        }

        // Vérifiez le mot de passe
        if ($password === $user['password']) {
            // Connexion réussie

            // Effectuez les opérations nécessaires, comme définir des variables de session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role_id'];

            // Redirigez vers la page d'accueil ou une autre page appropriée
            header('Location: /');
            exit();
        } else {
            // Mot de passe incorrect
            header('Location: /login?error=1&messages=Invalid Password');
            exit();
        }
    }

    public function logout()
    {
        session_start();
        session_unset(); // Supprimer toutes les variables de session
        session_destroy();
        
        // Redirigez vers la page de connexion ou une autre page appropriée après la déconnexion
        header('Location: /');
        exit();
    }

    public function showLoginForm()
    {
        return $this->view('login');
    }

    public function showRegisterForm()
    {
        return $this->view('register');
    }

    public function dashboardAccess()
    {
        return $this->view('dashboard');
    }

    public function register()
    {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $roleId = 2;

        $userModel = new User();

        $result = $userModel->createUser($firstName, $roleId, $lastName, $email, $password);

        if (is_array($result)) {
            $errorMessages = $result;
            return $this->view('register', ['errorMessages' => $errorMessages]);
        }

        $successMessage = 'Your account has been created, log in to see our functionalities';
        
        // Redirigez vers la page de connexion en passant le message de succès en tant que variable
        header('Location: /login?successMessage=' . urlencode($successMessage));
        exit();
    }
}