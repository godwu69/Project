<?php
session_start();

if (isset($_SESSION['user_id'])){
    header("Location: admin.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    include '../MemberManagement/MemberManagement.php';
    $memberManagement = new MemberManagement();

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
    $stmt = $memberManagement->conn->prepare($sql);
    $stmt->bind_param("ss",$username,$password);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1){
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];

        header("Location: admin.php");
        exit();
    }else{
        $error_message = "Login Failed, please check username and password.";
    }

    $stmt->close();
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Login</h2>

    <?php
    if (isset($error_message)){
        echo '<div class="alert alert-danger">' . $error_message . '</div>';
    }
    ?>

    <form method="post" action="">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-outline-primary">Login</button>
    </form>

</div>

</body>
</html>
