<?php
require_once('./models/Db.php');

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function findByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $this->db->query($sql);
        $this->db->bind(':email', $email);
        return $this->db->single();
    }

    public function create($firstname, $lastname, $email, $pwd)
    {
        $sql = "INSERT INTO users (firstname, lastname, email, pwd) VALUES (:firstname, :lastname, :email, :pwd)";
        $this->db->query($sql);
        $this->db->bind(':firstname', $firstname);
        $this->db->bind(':lastname', $lastname);
        $this->db->bind(':email', $email);
        $this->db->bind(':pwd', $pwd);
        $this->db->execute();
        return $this->db->lastInsertId();
    }
}
