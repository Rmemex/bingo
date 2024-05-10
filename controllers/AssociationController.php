<?php
// require_once __DIR__ . '/../models/HistoriqueModel.php';
require_once '../models/AssociationModel.php';
require_once '../models/UserModel.php';

class AssociationController

{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function addNewAssociation($assoName, $assoMail ,$assoDoc,$assoPass)
    {
        $bingo = new AssociationModel($this->database);
        $userMod = new UserModel($this->database);
        $idUser = $userMod->addUserAsso($assoName, $assoMail, $assoPass, 'association');
        
        return $bingo->addAssociation($assoName, $assoMail , $assoDoc, $idUser);

    }

    public function modifAssociationInfo()
    {
        $bingo = new BingoModel($this->database);
        return $bingo->getBingoToday();
    }

}

