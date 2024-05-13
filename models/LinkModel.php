<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once __DIR__ . '/../vendor/autoload.php';

class LinkModel
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->getConnection();
    }

    public function addLink($ticketId)
    {
        $mail = new PHPMailer(true);
        $linkKey = 'http://localhost/bingo/view/ticket/ticketPdfGenerated.php?ticketId=' . $ticketId;
        $insertQuery = "INSERT INTO `link`(`link_ticket`, `link_key`)
                        VALUES (:link_ticket, :link_key)";
        $insertStmt = $this->db->prepare($insertQuery);
        $insertStmt->bindParam(':link_ticket', $ticketId);
        $insertStmt->bindParam(':link_key', $linkKey);
     
        $insertStmt->execute();
        $lastInsertId =  $this->db->lastInsertId();
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'mariodevpro20@gmail.com'; 
            $mail->Password = 'X@Kc4Pr5LDE898J'; 
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('mariodevpro20@gmail.com', 'BINGO');
            $mail->addAddress('destinataire@example.com'); 
            $mail->Subject = 'Votre Ticket';
            $mail->Body = 'Voici le lien vers votre ticket : ' . $linkKey;

            $mail->send();
            return $lastInsertId; 
        } catch (Exception $e) {
            return false; 
        }

    }

}