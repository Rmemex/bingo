<?php

class paymentMethodModel
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->getConnection();
    }

    public function getPayementMethod()
    {
        $selPaymentQuery = "SELECT `payment_id`, `paymentMethod`, `asso` FROM `payment` WHERE ";
        $insertStmt = $this->db->prepare($selPaymentQuery);
        $insertStmt->bindParam(':assoId',  $_SESSION['association_info']['asso_id']);
        $insertStmt->execute();
    }
}
