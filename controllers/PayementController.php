<?php
// require_once __DIR__ . '/../models/HistoriqueModel.php';
// require_once '../models/PaymentModel.php';
// require_once '../models/UserModel.php';
require_once __DIR__ . '/../models/PaymentModel.php';

class PayementController
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function addNewMethodPayement($method, $idStrip, $assoId)
    {
        $payCon = new PayementModel($this->database);
        
        $payCon->insertPayementMethodAsso($method, $idStrip, $assoId);

    }

    public function getAssoPayementM($assoId)
    {
        $payCon = new PayementModel($this->database);
        return $payCon->getPaymentsWithLabels($assoId);
    }

}

