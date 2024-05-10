<?php

class LinkModel
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->getConnection();
    }

    public function addLink($ticketId)
    {
        $linkKey = 'http://localhost/bingos/view/ticketPdfGenerated.php?ticketId=' . urlencode($ticketId);

        $insertQuery = "INSERT INTO `link`(`link_ticket`, `link_key`)
                        VALUES (:link_ticket, :link_key)";
        $insertStmt = $this->db->prepare($insertQuery);
        $insertStmt->bindParam(':link_ticket', $ticketId);
        $insertStmt->bindParam(':link_key', $linkKey);
     
        $insertStmt->execute();
        return $this->db->lastInsertId();

    }

    
}
