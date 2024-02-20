<?php

class MemberManagement
{
    public $conn;

    public function __construct()
    {
        $host = "localhost:3306";
        $username = "root";
        $password = "";
        $dbname = "primefitness";

        $this->conn = new mysqli($host,$username,$password,$dbname);

        if ($this->conn->connect_error){
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function addMember($name,$email,$phone)
    {
        $sql = "INSERT INTO members (name, email, phone) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi",$name,$email,$phone);
        $stmt->execute();
        $stmt->close();
    }

    public function getMemberByPhone($phone)
    {
        $sql = "SELECT * FROM members WHERE phone = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i",$phone);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row;
    }

    public function __destruct()
    {
        $this->conn->close();
    }

}