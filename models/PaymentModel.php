<?php

class PayementModel
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->getConnection();
    }

    public function getPaymentsWithLabels($assoId)
    {
        $selPaymentQuery = "SELECT p.payment_id, p.paymentMethod, p.asso, p.payment_idStripe, pm.paymentMethod_label
                            FROM payment p
                            JOIN paymentmethod pm ON p.paymentMethod = pm.paymentMethod_id
                            WHERE p.asso = :assoId";
        $stmtGet = $this->db->prepare($selPaymentQuery);
        $stmtGet->bindParam(':assoId', $assoId);
        $stmtGet->execute();
        return $stmtGet->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertPayementMethodAsso($payM,$idS,  $assoId)
    {
        $inserQuery = "INSERT INTO `payment`(`paymentMethod`, `asso`, `payment_idStripe`) 
        VALUES (:payM, :assoId, :payment_idStripe)";
        $insertStmt = $this->db->prepare($inserQuery);
        $insertStmt->bindParam(':payM', $payM);
        $insertStmt->bindParam(':assoId', $assoId);
        $insertStmt->bindParam(':payment_idStripe', $idS);

        $insertStmt->execute();

    }
}
