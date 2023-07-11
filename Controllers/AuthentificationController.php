<?php

use App\Controllers\HomeController;
use Bramus\Router\Router;
use App\Models\User;

class AuthentificationController
{
    public function __construct(Router $router)
    {
        $router->get('/login', function () {
            $this->showLoginForm();
        });

        $router->post('/login', function () {
            $this->login();
        });

        $router->get('/logout', function () {
            $this->logout();
        });

        $router->get('/register', function () {
            $this->showRegistrationForm();
        });

        $router->post('/register', function () {
            $this->register();
        });
    }

    public function showLoginForm()
    {
        // Afficher la vue du formulaire de connexion
        require_once 'views/login.php';
    }

    public function login()
    {
        if (isset($_SESSION['user_id'])) {
            // Utilisateur déjà connecté, rediriger vers une autre page
            header('Location: /');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire de connexion
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Valider les données du formulaire (ex: vérification des champs vides)

            // Récupérer l'utilisateur correspondant à l'adresse e-mail
            $user = User::getByEmail($email);

            if ($user && password_verify($password, $user->getPassword())) {
                // Informations d'identification valides, démarrer la session et rediriger vers une page protégée
                session_start();
                $_SESSION['user_id'] = $user->getId();
                header('Location: dashboard.php');
                exit();
            } else {
                // Informations d'identification invalides, afficher un message d'erreur
                $error = "Identifiants invalides. Veuillez réessayer.";
                // Afficher la vue de login avec le message d'erreur
                require_once 'views/login.php';
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user_id'])) {
            // Utilisateur déjà connecté, rediriger vers une autre page
            header('Location: /');
            exit();
        }

        // Déconnexion de l'utilisateur, destruction de la session
        session_start();
        session_destroy();

        // Rediriger l'utilisateur vers la page d'accueil ou une autre page appropriée
        header('Location: /');
        exit();
    }

    public function showRegistrationForm()
    {
        // Afficher la vue du formulaire d'inscription
        require_once 'views/register.php';
    }

    public function register()
    {
        if (isset($_SESSION['user_id'])) {
            // Utilisateur déjà connecté, rediriger vers une autre page
            header('Location: /');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire d'inscription
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Valider les données du formulaire (ex: vérification des champs vides)

            // Créer un nouvel utilisateur dans la base de données
            $user = new User($firstName, $lastName, $email, $password);
            $user->save(); // Méthode hypothétique pour enregistrer l'utilisateur dans la base de données

            // Rediriger l'utilisateur vers une page appropriée (ex: page de connexion)
            header('Location: /login');
            exit();
        }
    }
}
