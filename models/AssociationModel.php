<?php

class AssociationModel
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->getConnection();
    }

    public function getAssociation()
    {
        $sql = "SELECT * FROM association";
        $result = $this->db->query($sql);
        $passwords = $result->fetchAll(PDO::FETCH_COLUMN);
        return $passwords;
    }
    
    public function getAssoInfo($userId)
    {
        $sql = "SELECT * FROM association WHERE user = :userId";
        $query = $this->db->prepare($sql);
        $query->execute(array(':userId' => $userId)); 

        $assoInfo = $query->fetchAll(PDO::FETCH_ASSOC); 

        return $assoInfo;
    }
    public function addAssociation($assoName, $assoMail ,$assoDoc, $user)
    {
        $insertQuery = "INSERT INTO `association`(`asso_name`,`asso_mail`,`asso_document`, `user`)
        VALUES (:asso_name, :asso_mail, :asso_doc, :user)";
        $insertStmt = $this->db->prepare($insertQuery);
        $insertStmt->bindParam(':asso_name', $assoName);
        $insertStmt->bindParam(':asso_mail', $assoMail);
        $insertStmt->bindParam(':asso_doc', $assoDoc);
        $insertStmt->bindParam(':user', $user);
        return $insertStmt->execute();
    }
    public function setAssociation($asso_name)
    {
        $updateQuery = "UPDATE `association`
        SET `asso_name`= :asso_name
        WHERE `asso_name` = :asso_name";
        $updateStmt = $this->db->prepare($updateQuery);
        $updateStmt->bindParam(':asso_name', $asso_name);
        $updateStmt->execute();
    }
    public function validAssociation($assoId, $stat)
    {
        $updateQuery = "UPDATE `association`
        SET `asso_status`= :asso_status
        WHERE `asso_id` = :idCompte";
        $updateStmt = $this->db->prepare($updateQuery);
        $updateStmt->bindParam(':asso_status', $stat);
        $updateStmt->bindParam(':asso_id', $assoId);
        $updateStmt->execute();
    }
    public function unValidAssociation($idAsso)
    {
        $updateQuery = "UPDATE `association`
        SET `asso_status`= :asso_status
        WHERE `asso_id` = :idCompte";
        $updateStmt = $this->db->prepare($updateQuery);
        $updateStmt->bindParam(':asso_status', 0);
        $updateStmt->bindParam(':asso_id', $idAsso);
        $updateStmt->execute();
    }
}
