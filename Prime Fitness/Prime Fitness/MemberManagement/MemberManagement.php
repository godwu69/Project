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

    public function getAllMembers()
    {
        $members = [];
        $sql = "SELECT * FROM members GROUP BY name,email,phone";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $members[] = $row;
            }
        }
            return $members;
    }

    public function deleteMember($id)
    {
        $sql = "DELETE FROM members WHERE id='$id'";
        $this->conn->query($sql);
    }

    public function updateMember($id, $name,$email,$phone)
    {
        $sql = "UPDATE members SET name=?, email=?, phone=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssii",$name,$email,$phone,$id);
        $stmt->execute();
        $stmt->close();
    }

    public function getMemberById($id)
    {
        $sql = "SELECT * FROM members WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i",$id);
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