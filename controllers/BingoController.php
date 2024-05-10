<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) session_start();
// require_once __DIR__ . '/../models/HistoriqueModel.php';
require_once __DIR__ . '/../models/BingoModel.php';
// session_start();

class BingoController
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function addNewBingo($bingo_name, $bingo_start, $bingo_stop, $bingo_price, $bingo_assoc, $bingo_dotation, $bingo_ticket_number,$lotNumber)
    {
        $bingo = new BingoModel($this->database);
        $nbBingoAsso = $bingo->nbBingoAsso($_SESSION['user_id']);
        if($nbBingoAsso<5){
           $newBingo = $bingo->addBingo($bingo_name, $bingo_start, $bingo_stop, $bingo_price, $bingo_assoc, $bingo_dotation, $bingo_ticket_number,$lotNumber);
            return $newBingo;
        }else{
            return false;
        }
           
    }
    public function bingoList()
    {
        $bingo = new BingoModel($this->database);
        return $bingo->getBingoToday();
    }

}

