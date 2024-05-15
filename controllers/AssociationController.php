<?php

require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../models/AssociationModel.php';

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
    public function getAssoName($bingoId)
    {
        $asso = new AssociationModel($this->database);
        return $asso->getAssoName($bingoId);
    }
}

