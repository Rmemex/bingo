<?php

class TransactionModel
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->getConnection();
    }

    public function addTrans($trans_user, $trans_amount, $trans_date, $trans_nb,$trans_bingo)
    {
        $dateAchatTicket = new DateTime();
        
        $insertQuery = "INSERT INTO `transaction`(`trans_user`, `trans_amount`, `trans_date`, `trans_nb`, `trans_bingo`)
                        VALUES (:trans_user, :trans_amount, :trans_date, :trans_nb, :trans_bingo)";
        $insertStmt = $this->db->prepare($insertQuery);
        $insertStmt->bindParam(':trans_user', $trans_user);
        $insertStmt->bindParam(':trans_amount', $trans_amount);
        $insertStmt->bindParam(':trans_date', $trans_date);
        $insertStmt->bindParam(':trans_nb', $trans_nb);
        $insertStmt->bindParam(':trans_bingo', $trans_bingo);
        $insertStmt->execute();
        return $this->db->lastInsertId();

    }
    public function getListTransByAsso($bingoId)
    {
        $sql = "SELECT 
                    t.trans_id,
                    u.user_name,
                    u.user_mail,
                    t.trans_nb, 
                    t.trans_amount, 
                    t.trans_date
                FROM 
                    transaction t
                INNER JOIN 
                    user u ON t.trans_user = u.user_id
                WHERE 
                    t.trans_bingo = :bingoId";
    
        $stmtGet = $this->db->prepare($sql);
        $stmtGet->bindParam(':bingoId', $bingoId);
        $stmtGet->execute(); 
        return $stmtGet->fetchAll(PDO::FETCH_ASSOC);
    }
    

}
