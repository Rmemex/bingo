<?php
// require_once __DIR__ . '/../models/HistoriqueModel.php';
require_once __DIR__ . '/../models/TransactionModel.php';

class TransactionController
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function getListTransTicketSales($bingoId)
    {
        
        $transMod = new TransactionModel($this->database);
        return $transMod->getListTransByAsso($bingoId);
    }

}

