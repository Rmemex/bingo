<?php

class UserModel
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->getConnection();
    }
    public function auth($mail, $passW)
    {
        $sql = "SELECT * FROM user  WHERE user_mail = :user_mail AND user_password = :user_password ";
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':user_mail', $mail);
        $stmt->bindParam(':user_password', $passW);
        $stmt->execute();
        $count = $stmt->rowCount();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($count > 0) {
            return $user;
        } else {
            return false;
        }
    }

    public function getEmail()
    {
        $sql = "SELECT user_mail FROM user ";
        $result = $this->db->query($sql);
        $user_mail = $result->fetchAll(PDO::FETCH_COLUMN);
        return $user_mail;
    }

    public function getTtype()
    {
        $sql = "SELECT user_type FROM user";
        $result = $this->db->query($sql);
        $user_mail = $result->fetchAll(PDO::FETCH_COLUMN);
        return $user_mail;
    }

    public function getPass()
    {
        $sql = "SELECT user_password FROM user";
        $result = $this->db->query($sql);
        $passwords = $result->fetchAll(PDO::FETCH_COLUMN);
        return $passwords;
    }
    public function addUser($username, $email)
    {
        // Vérifier si l'email existe déjà
        $checkEmailQuery = "SELECT `user_id` FROM `user` WHERE `user_mail` = :user_mail";
        $checkStmt = $this->db->prepare($checkEmailQuery);
        $checkStmt->bindParam(':user_mail', $email);
        $checkStmt->execute();
        $existingUser = $checkStmt->fetch(PDO::FETCH_ASSOC);

        if ($existingUser) {
            // Si l'email existe déjà, retourner son ID
            return $existingUser['user_id'];
        } else {
            // Sinon, insérer un nouvel utilisateur
            $insertQuery = "INSERT INTO `user`(`user_name`, `user_mail`)
                            VALUES (:user_name, :user_mail)";
            $insertStmt = $this->db->prepare($insertQuery);
            $insertStmt->bindParam(':user_name', $username);
            $insertStmt->bindParam(':user_mail', $email);
            $insertStmt->execute();

            // Retourner l'ID du nouvel utilisateur inséré
            return $this->db->lastInsertId();
        }
    }

    public function addUserAsso($username, $email, $pass, $type)
    {
        $insertQuery = "INSERT INTO `user`(`user_name`,`user_mail`, `user_password`, `user_type`)
        VALUES (:user_name, :user_mail, :user_password, :user_type)";
        $insertStmt = $this->db->prepare($insertQuery);
        $insertStmt->bindParam(':user_name', $username);
        $insertStmt->bindParam(':user_mail', $email);
        $insertStmt->bindParam(':user_password', $pass);
        $insertStmt->bindParam(':user_type', $type);
        $insertStmt->execute();
        $lasId = $this->db->lastInsertId();
        return $lasId ;

    }
    public function getUserAsso($role)
    {
        $sql = "SELECT a.user_id, a.user_type, a.asso_name, a.asso_mail, a.asso_status, a.asso_document
        FROM association a
        JOIN user u ON a.user = u.user_id
        WHERE u.user_type = :usrole ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
