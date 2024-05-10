<?php

class LotsModel
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->getConnection();
    }

    public function addLots($lotTitle, $lotPrice, $lotImage, $lotLink, $lotDesc, $lotBingo)
    {
        $insertQuery = "INSERT INTO `lots`(`lot_title`,`lot_price`,`lot_image`,`lot_link_disc`,`lot_desc`,`bingo`)
        VALUES (:lot_title, :lot_price, :lot_image, :lot_link_disc, :lot_desc, :bingo)";
        $insertStmt = $this->db->prepare($insertQuery);
        $insertStmt->bindParam(':lot_title', $lotTitle);
        $insertStmt->bindParam(':lot_price', $lotPrice);
        $insertStmt->bindParam(':lot_image', $lotImage);
        $insertStmt->bindParam(':lot_link_disc', $lotLink);
        $insertStmt->bindParam(':lot_desc', $lotDesc);
        $insertStmt->bindParam(':bingo', $lotBingo);
        $insertStmt->execute();
        
    }
    
    public function getBingoToday()
    {
        $sql = "SELECT 
        b.bingo_start AS DateBingo,
        a.asso_name AS Association,
        (
            SELECT l.lot_title
            FROM lots l
            WHERE l.id = (
                SELECT MIN(l.id)
                FROM lots l
                WHERE l.bingo = b.bingo_id
            )
        ) AS `1st prize`,
        b.bingo_dotation AS Dotation,
        b.bingo_ticket_price AS `Ticket price`,
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
