<?php

class TransactionModel
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->getConnection();
    }

    public function addTrans($trans_user, $trans_amount, $trans_date, $trans_nb)
    {
        $dateAchatTicket = new DateTime();
        
        $insertQuery = "INSERT INTO `transaction`(`trans_user`, `trans_amount`, `trans_date`, `trans_nb`)
                        VALUES (:trans_user, :trans_amount, :trans_date, :trans_nb)";
        $insertStmt = $this->db->prepare($insertQuery);
        $insertStmt->bindParam(':trans_user', $trans_user);
        $insertStmt->bindParam(':trans_amount', $trans_amount);
        $insertStmt->bindParam(':trans_date', $trans_date);
        $insertStmt->bindParam(':trans_nb', $trans_nb);
        $insertStmt->execute();
        return $this->db->lastInsertId();

    }
    
}
