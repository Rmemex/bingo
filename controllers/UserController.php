<?php

require_once '../models/UserModel.php';
require_once '../models/AssociationModel.php';

class UserController

{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }
    
    public function addNewUser($userName,$email)
    {
        $userMod = new UserModel($this->database);
        $userMod->addUser($userName, $email);
    }

   
    public function getAllUserAssoDoc($userRole)
    {
        $userMod = new UserModel($this->database);
        return $userMod->getUserAsso('association');
    }
    public function validUserAsso($assoId,$stat)
    {
        $userAssoMod = new AssociationModel($this->database);
        $userAssoMod->validAssociation($assoId, $stat);
    }
}

