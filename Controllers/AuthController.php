<?php

namespace App\Controllers;

use App\Models\User;
use App\Core\Controller;

class AuthController extends Controller
{
    public function login()
    {   
        session_start();
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // Validez les données, effectuez les vérifications nécessaires

        $userModel = new User();
        
        // Vérifiez si l'utilisateur existe dans la base de données
        $user = $userModel->findUserByEmail($email);
        
        if ($user) {
            // Vérifiez le mot de passe
            if ($password === $user['password']) {
                // Connexion réussie
                
                // Effectuez les opérations nécessaires, comme définir des variables de session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_role'] = $user['role_id'];

                // Redirigez vers la page d'accueil ou une autre page appropriée
                header('Location: /');
                exit();
            }
        }
        
        // Si la connexion a échoué, redirigez vers la page de connexion avec un message d'erreur
        header('Location: /connexion?error=1');
        exit();
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

    public function showForm()
    {
        return $this->view('login');
    }

    public function dashboardAccess()
    {
        return $this->view('dashboard');
    }
}