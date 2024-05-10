<?php

class TicketModel
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->getConnection();
    }

    public function addTicket($bingo, $user, $ticket_grille)
    {
        $dateAchatTicket = new DateTime();
        $dateAchatTicketStr = $dateAchatTicket->format('Y-m-d H:i:s'); // Convertir l'objet DateTime en chaîne de caractères

        $insertQuery = "INSERT INTO `ticket`(`ticket_bingo`,`ticket_user`,`ticket_grille`,`ticket_dateAchat`)
                        VALUES (:ticket_bingo, :ticket_user, :ticket_grille, :ticket_dateAchat)";
        $insertStmt = $this->db->prepare($insertQuery);
        $insertStmt->bindParam(':ticket_bingo', $bingo);
        $insertStmt->bindParam(':ticket_user', $user);
        $insertStmt->bindParam(':ticket_grille', $ticket_grille);
        $insertStmt->bindParam(':ticket_dateAchat', $dateAchatTicketStr); // Utiliser la chaîne de caractères de la date
        $insertStmt->execute();
        return $this->db->lastInsertId();

    }
    public function ticketById($bingoId)
    {
        $selectQuery = "SELECT u.user_name,ticket_numero, u.user_mail, t.ticket_grille, b.bingo_ticket_number,b.bingo_name
                        FROM ticket t
                        INNER JOIN user u ON t.ticket_user = u.user_id
                        INNER JOIN bingo b ON t.ticket_bingo = b.bingo_id
                        WHERE t.ticket_id = :ticket_id";
    
        $selectStmt = $this->db->prepare($selectQuery);
    
        $selectStmt->bindParam(':ticket_id', $bingoId);
    
        $selectStmt->execute();
    
        $tickets = $selectStmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $tickets;
    }
    
    public function ticketListSales($bingoId)
    {
        $selectQuery = "SELECT t.`ticket_id`, t.`ticket_bingo`, t.`ticket_user`, t.`ticket_grille`, t.`ticket_dateAchat`,
                    u.`user_id`, u.`user_name`, u.`user_mail`
                    FROM `ticket` t
                    INNER JOIN `user` u ON t.`ticket_user` = u.`user_id`
                    WHERE t.`ticket_bingo` = :bingoId";


        $selectStmt = $this->db->prepare($selectQuery);

        $selectStmt->bindParam(':bingoId', $bingoId);

        $selectStmt->execute();

        $tickets = $selectStmt->fetchAll(PDO::FETCH_ASSOC);

        return $tickets;
    }
    public function setTicket($idAsso)
    {
        $updateQuery = "UPDATE `ticket`
        SET `asso_status`= :asso_status
        WHERE `asso_id` = :asso_id";
        $updateStmt = $this->db->prepare($updateQuery);
        $updateStmt->bindParam(':asso_status', 1);
        $updateStmt->bindParam(':asso_id', $idAsso);
        $updateStmt->execute();
    }
}
