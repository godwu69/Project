<?php

//Connect to database
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
    
    //Add member
    public function addMember($name,$email,$phone,$membership,$cost,$fromdate,$todate)
    {

        $stmt = $this->conn->prepare("INSERT INTO members (name, email, phone) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $phone);
        $stmt->execute();
        $member_id = $stmt->insert_id;

        $stmt = $this->conn->prepare("INSERT INTO services (membership, cost, member_id) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $membership, $cost, $member_id);
        $stmt->execute();

        $stmt = $this->conn->prepare("INSERT INTO orders (fromdate, todate, member_id) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $fromdate, $todate, $member_id);
        $stmt->execute();
    }

    //Get all member information
    public function getAllMembers()
    {
        $members = [];
        $sql = "SELECT m.id,m.name,m.email,m.phone,s.membership,s.cost,o.fromdate,o.todate,o.status
                FROM members m
                JOIN services s on s.member_id  = m.id
                JOIN orders o on o.member_id = m.id
                WHERE m.hide = 'Show'
                ORDER BY fromdate DESC";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $members[] = $row;
            }
        }
        return $members;
    }

    //Get all hidden member information
    public function getAllHiddenMembers()
    {
        $members = [];
        $sql = "SELECT m.id,m.name,m.email,m.phone,s.membership,s.cost,o.fromdate,o.todate,o.status
                FROM members m
                JOIN services s on s.member_id  = m.id
                JOIN orders o on o.member_id = m.id
                WHERE m.hide = 'Hide'
                ORDER BY fromdate DESC";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $members[] = $row;
            }
        }
        return $members;
    }

    //Update member information
    public function updateMember($id, $name, $email, $phone)
    {
        $sql = "UPDATE members SET members.name=?, members.email=?, members.phone=? WHERE members.id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssii", $name, $email, $phone, $id);
        $stmt->execute();
        $stmt->close();
    }

    //Update member
    public function updateMemberStatus($id,$status)
    {
        $sql=  "UPDATE orders SET orders.status = ? WHERE orders.id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si",$status,$id);
        $stmt->execute();
        $stmt->close();
    }

    //Get member information by ID
    public function getMemberById($id)
    {
        $sql = "SELECT members.name, members.email, members.phone FROM members WHERE members.id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row;
    }

    //Search member information by membership & status
    public function searchMember($membership,$status)
    {
        $members = [];
        $sql = "SELECT m.id,m.name,m.email,m.phone,s.membership,s.cost,o.fromdate,o.todate,o.status
                FROM members m
                JOIN services s on s.member_id  = m.id
                JOIN orders o on o.member_id = m.id
                WHERE s.membership = '$membership' AND o.status = '$status' 
                ORDER BY fromdate DESC";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $members[] = $row;
            }
        }
        return $members;
    }

    //Search member information by Email
    public function searchMemberByEmail($email)
    {

        $members = [];
        $sql = "SELECT m.name,m.email,m.phone,s.membership,o.fromdate,o.todate,o.status
                FROM members m
                JOIN services s on s.member_id  = m.id
                JOIN orders o on o.member_id = m.id
                WHERE m.email = '$email'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $members[] = $row;
            }
        }
        return $members;
    }

    //Hide member
    public function hideMember($id,$hide)
    {
        $sql = "UPDATE members SET members.hide = ? WHERE members.id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si",$hide,$id);
        $stmt->execute();
        $stmt->close();
    }

    //Show hidden member
    public function showMember($id,$hide)
    {
        $sql = "UPDATE members SET members.hide = ? WHERE members.id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si",$hide,$id);
        $stmt->execute();
        $stmt->close();
    }



    public function __destruct()
    {
        $this->conn->close();
    }
}
