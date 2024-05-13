<?php

class BingoModel
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->getConnection();
    }

    public function addBingo($bingo_name, $bingo_start, $bingo_stop, $bingo_price, $bingo_assoc, $bingo_dotation, $bingo_ticket_number, $bingo_lot_number)
    {
        $bingo_statut = 1;
        $insertQuery = "INSERT INTO `bingo`(`bingo_name`,`bingo_start`,`bingo_stop`,`bingo_price`,`bingo_assoc`,`bingo_dotation`,`bingo_ticket_number`,`bingo_lots_number`,`bingo_ticket_number_dispo`,`bingo_statut`)
        VALUES (:bingo_name, :bingo_start, :bingo_stop, :bingo_price, :bingo_assoc, :bingo_dotation, :bingo_ticket_number, :bingo_lots_number, :bingo_ticket_number_dispo, :bingo_statut)";
        $insertStmt = $this->db->prepare($insertQuery);
        $insertStmt->bindParam(':bingo_name', $bingo_name);
        $insertStmt->bindParam(':bingo_start', $bingo_start);
        $insertStmt->bindParam(':bingo_stop', $bingo_stop);
        $insertStmt->bindParam(':bingo_price', $bingo_price);
        $insertStmt->bindParam(':bingo_assoc', $bingo_assoc);
        $insertStmt->bindParam(':bingo_dotation', $bingo_dotation);
        $insertStmt->bindParam(':bingo_ticket_number', $bingo_ticket_number);
        $insertStmt->bindParam(':bingo_lots_number', $bingo_lot_number);
        $insertStmt->bindParam(':bingo_ticket_number_dispo', $bingo_ticket_number);
        $insertStmt->bindParam(':bingo_statut', $bingo_statut);
        $insertStmt->execute();
        $lasId = $this->db->lastInsertId();
        return $lasId;
    }
    public function getBingoListByAsso($assoId)   
{
    $sql = "SELECT 
                b.bingo_id,
                b.bingo_name, 
                b.bingo_stop, 
                b.bingo_start, 
                b.bingo_price, 
                b.bingo_dotation, 
                b.bingo_statut, 
                b.bingo_lots_number, 
                b.bingo_ticket_number_dispo
            FROM 
                bingo b
            WHERE 
                b.bingo_assoc = :assoId";

    $stmtGet = $this->db->prepare($sql);
    $stmtGet->bindParam(':assoId', $assoId);
    $stmtGet->execute(); 
    return $stmtGet->fetchAll(PDO::FETCH_ASSOC);
}

    public function getBingoDispo($assoId)
    {
        $sql = "SELECT 
                b.bingo_id,
                b.bingo_name 
                FROM 
                    bingo b
                WHERE 
                b.bingo_stop < CURRENT_DATE() 
                AND b.bingo_ticket_number_dispo > 0
                AND b.bingo_assoc = :assoId";

        $stmtGet = $this->db->prepare($sql);
        $stmtGet->bindParam(':assoId', $assoId);
        $stmtGet->execute(); 
        return $stmtGet->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getLastInsertedBingo($assoId)
    {
        $sql = "SELECT 
                    b.bingo_id,
                    b.bingo_name 
                FROM 
                    bingo b
                WHERE 
                    b.bingo_stop < CURRENT_DATE() 
                    AND b.bingo_ticket_number_dispo > 0
                    AND b.bingo_assoc = :assoId
                ORDER BY 
                    b.bingo_id DESC
                LIMIT 1";
    
        $stmtGet = $this->db->prepare($sql);
        $stmtGet->bindParam(':assoId', $assoId);
        $stmtGet->execute(); 
        return $stmtGet->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getTicketNumberDispo($bingoId)
    {
        $sql = "SELECT bingo_ticket_number_dispo 
            FROM bingo 
            WHERE bingo_id = :bingoId";

        $stmtGet = $this->db->prepare($sql);
        $stmtGet->bindParam(':bingoId', $bingoId);
        $stmtGet->execute(); 
        return $stmtGet->fetch(PDO::FETCH_ASSOC);
    }

    public function getBingo_ticket_number($bingoId)
    {
        $sql = "SELECT bingo_ticket_number 
            FROM bingo 
            WHERE bingo_id = :bingoId";

        $stmtGet = $this->db->prepare($sql);
        $stmtGet->bindParam(':bingoId', $bingoId);
        $stmtGet->execute(); 
        return $stmtGet->fetch(PDO::FETCH_ASSOC);
    }
    public function getBingoTicketPrice($bingoId)
    {
        $sql = "SELECT bingo_price 
            FROM bingo 
            WHERE bingo_id = :bingoId";

        $stmtGet = $this->db->prepare($sql);
        $stmtGet->bindParam(':bingoId', $bingoId);
        $stmtGet->execute(); 
        return $stmtGet->fetch(PDO::FETCH_ASSOC);
    }
    public function updateBingoTicketNumberDispo($bingoId, $newTicketNumberDispo)
    {
        $sql = "UPDATE bingo 
                SET bingo_ticket_number_dispo = :newTicketNumberDispo 
                WHERE bingo_id = :bingoId";

        $stmtUpdate = $this->db->prepare($sql);
        $stmtUpdate->bindParam(':bingoId', $bingoId);
        $stmtUpdate->bindParam(':newTicketNumberDispo', $newTicketNumberDispo);
        return $stmtUpdate->execute(); // Execute the SQL query and return true/false based on success
    }

    public function getBingoToday()
    {
        $sql = "SELECT 
        b.bingo_ticket_number AS bingo_ticket_number, 
        b.bingo_name AS bingo_name, 
        b.bingo_id AS Bingo_id, 
        b.bingo_start AS DateBingo,
        b.bingo_statut AS Statut,
        a.asso_name AS Association,
        (
            SELECT l.lot_title
            FROM lots l
            WHERE lot_id = (
                SELECT MIN(lot_id)
                FROM lots l
                WHERE l.bingo = b.bingo_id
            )
        ) AS `1st prize`,
        b.bingo_dotation AS Dotation,
        b.bingo_price AS `Ticket price`,
        a.asso_status AS Status
        FROM 
            bingo b
        JOIN 
            association a ON b.bingo_assoc = a.asso_id";

            $result = $this->db->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function nbBingoAsso($association)
    {
        $sql = "SELECT COUNT(*) AS NombreDeBingo
            FROM bingo
            WHERE bingo_assoc = :associationId";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':associationId', $association);   
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['NombreDeBingo'];

    }

}
