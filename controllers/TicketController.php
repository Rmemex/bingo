<?php
// require_once __DIR__ . '/../models/HistoriqueModel.php';
require_once __DIR__ . '/../models/TicketModel.php';
require_once __DIR__ . '/../models/BingoModel.php';
require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../models/LinkModel.php';

class TicketController
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function saveGenerateTicket($bingoTicket, $ticketNumber, $userId, $numTicket, $trans)
    {
        $TicketMod = new TicketModel($this->database);
        $linkMod = new LinkModel($this->database);
        
         
        $genTick = null;
        for ($i = 0; $i < $ticketNumber; $i++) {
            $bingoMod = new BingoModel($this->database);
            $getBingo_ticket_number = $bingoMod->getBingo_ticket_number($bingoTicket);
            $nbTikDisp = $bingoMod->getTicketNumberDispo($bingoTicket);
            $numTicket = $getBingo_ticket_number['bingo_ticket_number']-$nbTikDisp['bingo_ticket_number_dispo']+1;

            $ticket_grille =$this->generer_ticket();

            $genTick = $TicketMod->addTicket($bingoTicket, $userId, $ticket_grille, $numTicket, $trans);
            $genTick = $linkMod->addLink($genTick);

        }
        return $genTick;
    }   
    public function showTicket($ticketId)
    {
        $TicketMod = new TicketModel($this->database);

        $listTick = $TicketMod->ticketById($ticketId);
<?php
// require_once __DIR__ . '/../models/HistoriqueModel.php';
require_once __DIR__ . '/../models/TicketModel.php';
require_once __DIR__ . '/../models/BingoModel.php';
require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../models/LinkModel.php';

class TicketController
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function saveGenerateTicket($bingoTicket, $ticketNumber, $userId, $numTicket, $trans)
    {
        $TicketMod = new TicketModel($this->database);
        $linkMod = new LinkModel($this->database);
        
         
        $genTick = null;
        for ($i = 0; $i < $ticketNumber; $i++) {
            $bingoMod = new BingoModel($this->database);
            $getBingo_ticket_number = $bingoMod->getBingo_ticket_number($bingoTicket);
            $nbTikDisp = $bingoMod->getTicketNumberDispo($bingoTicket);
            $numTicket = $getBingo_ticket_number['bingo_ticket_number']-$nbTikDisp['bingo_ticket_number_dispo']+1;

            $ticket_grille =$this->generer_ticket();

            $genTick = $TicketMod->addTicket($bingoTicket, $userId, $ticket_grille, $numTicket, $trans);
            $genTick = $linkMod->addLink($genTick);

        }
        return $genTick;
    }   
    public function showTicket($ticketId)
    {
        $TicketMod = new TicketModel($this->database);

        $listTick = $TicketMod->ticketById($ticketId);
          
        return $listTick;
    } 
    public function tickekListSales($bingoId)
    {
        $TicketMod = new TicketModel($this->database);

        $listTick = $TicketMod->ticketListSales($bingoId);
          
        return $listTick;
    } 
    public function getTicketBingo($ticketId)
    {
        $TicketMod = new TicketModel($this->database);

        $ticketB = $TicketMod->getTicketBingo($ticketId);
          
        return $ticketB;
    }   
    public function generer_ticket() {
        $ticket = array();
        $nombres = range(1, 90);
        shuffle($nombres);
    
        for ($i = 0; $i < 3; $i++) {
            $ligne = array_fill(0, 9, 0);
            $positions = array_rand($ligne, 5); 
            foreach ($positions as $pos) {
                $ligne[$pos] = array_pop($nombres); 
            }
            // sort($ligne);
            $ticket[] = $ligne;
        }
        return json_encode($ticket);
    }
    
    public function bingoList()
    {
        $bingo = new BingoModel($this->database);
        return $bingo->getBingoToday();
    }

}

