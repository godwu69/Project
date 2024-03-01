<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

<div class="container mt-5">
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <a href="logout.php" class="btn btn-outline-danger">Logout</a>
    <h2>Membership List</h2>
    <a href="../MemberManagement/BasicMembersManager.php" class="btn btn-outline-primary">Basic Membership</a>&nbsp;
    <a href="../MemberManagement/AdvanceMembersManager.php" class="btn btn-outline-primary">Advance Membership</a>&nbsp;
    <a href="../MemberManagement/PrimeMembersManager.php" class="btn btn-outline-primary">Prime Membership</a>
</div>

</body>

</html>
