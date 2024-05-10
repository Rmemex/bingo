<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) session_start();

// require_once __DIR__ . '/../models/HistoriqueModel.php';
require_once '../models/UserModel.php';
require_once '../models/AssociationModel.php';
class LoginController
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }
    
    public function login($emailE, $passE)
    {
        $userModel = new UserModel($this->database);
        $assoModel = new AssociationModel($this->database);
        $isAuth = $userModel->auth($emailE, $passE);

        if($isAuth)  {    
            $_SESSION['user_id'] = $isAuth['user_id'];
            $_SESSION['user_name'] = $isAuth['user_name'];
            $_SESSION['user_mail'] = $isAuth['user_mail'];
            $_SESSION['user_type'] = $isAuth['user_type'];
            $assos = $assoModel->getAssoInfo($_SESSION['user_id']);
            $_SESSION['association_info'] = $assos[0];
            
            return true;
        }
        else{ return false; } 
            
    }
    public function logout()
    {
        $_SESSION = array();
        // Destruction de la session
        session_destroy();
    }

}

