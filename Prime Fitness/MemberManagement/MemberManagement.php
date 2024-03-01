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

        $this->conn = new mysqli($host, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function addBasic($name, $email, $phone)
    {
        $sql = "INSERT INTO basicMembers (name,email,phone) VALUES (?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $name, $email, $phone);
        $stmt->execute();
        $stmt->close();
    }

    public function addAdvance($name, $email, $phone)
    {
        $sql = "INSERT INTO advanceMembers (name, email, phone) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $name, $email, $phone);
        $stmt->execute();
        $stmt->close();
    }

    public function addPrime($name, $email, $phone)
    {
        $sql = "INSERT INTO primeMembers (name, email, phone) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $name, $email, $phone);
        $stmt->execute();
        $stmt->close();
    }

    public function getAllBasicMembers()
    {
        $basicMembers = [];
        $sql = "SELECT * FROM basicMembers GROUP BY name,email,phone,type,cost,fromdate,todate,status";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $basicMembers[] = $row;
            }
        }
        return $basicMembers;
    }

    public function getAllAdvanceMembers()
    {
        $advanceMembers = [];
        $sql = "SELECT * FROM advanceMembers GROUP BY name,email,phone,type,cost,fromdate,todate,status";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $advanceMembers[] = $row;
            }
        }
        return $advanceMembers;
    }

    public function getAllPrimeMembers()
    {
        $primeMembers = [];
        $sql = "SELECT * FROM primeMembers GROUP BY name,email,phone,type,cost,fromdate,todate,status";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $primeMembers[] = $row;
            }
        }
        return $primeMembers;
    }

    public function deleteBasicMember($id)
    {
        $sql = "DELETE FROM basicMembers WHERE id='$id'";
        $this->conn->query($sql);
    }

    public function deleteAdvanceMember($id)
    {
        $sql = "DELETE FROM advanceMembers WHERE id='$id'";
        $this->conn->query($sql);
    }

    public function deletePrimeMember($id)
    {
        $sql = "DELETE FROM primeMembers WHERE id='$id'";
        $this->conn->query($sql);
    }

    public function updateBasicMember($id, $name, $email, $phone)
    {
        $sql = "UPDATE basicMembers SET name=?, email=?, phone=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssii", $name, $email, $phone, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function updateBasicStatus($id,$status)
    {
        $sql=  "UPDATE basicMembers SET status = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si",$status,$id);
        $stmt->execute();
        $stmt->close();
    }

    public function updateAdvanceStatus($id,$status)
    {
        $sql=  "UPDATE advanceMembers SET status = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si",$status,$id);
        $stmt->execute();
        $stmt->close();
    }

    public function updatePrimeStatus($id,$status)
    {
        $sql=  "UPDATE primeMembers SET status = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si",$status,$id);
        $stmt->execute();
        $stmt->close();
    }

    public function updateAdvanceMember($id, $name, $email, $phone)
    {
        $sql = "UPDATE advanceMembers SET name=?, email=?, phone=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssii", $name, $email, $phone, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function updatePrimeMember($id, $name, $email, $phone)
    {
        $sql = "UPDATE primeMembers SET name=?, email=?, phone=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssii", $name, $email, $phone, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function getBasicMember($id)
    {
        $sql = "SELECT * FROM basicMembers WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row;
    }

    public function getAdvanceMember($id)
    {
        $sql = "SELECT * FROM advanceMembers WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row;
    }

    public function getPrimeMember($id)
    {
        $sql = "SELECT * FROM primeMembers WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
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
