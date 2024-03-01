<?php
session_start();

if (!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

include '../MemberManagement/MemberManagement.php';

$memberManagement = new MemberManagement();

if (!isset($_GET['id'])){
    header('Location: PrimeMembersManager.php');
    exit;
}

$memberId = $_GET['id'];
$primeMember = $memberManagement->getPrimeMember($memberId);

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $memberManagement->updatePrimeMember($memberId,$name,$email,$phone);

    header('Location: PrimeMembersManager.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Member</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Member</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name"
                   name="name" value="<?php echo $primeMember['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email"
                   name="email" value="<?php echo $primeMember['email']; ?>" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone"
                   name="phone" value="<?php echo $primeMember['phone']; ?>" required>
        </div>
        <button type="submit" class="btn btn-outline-primary">Update Member</button>
    </form>
</div>
</body>
</html>
