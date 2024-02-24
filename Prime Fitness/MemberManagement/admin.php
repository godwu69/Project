<?php
session_start();

if (!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

include '../MemberManagement/MemberManagement.php';
$memberManagement = new MemberManagement();

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])){
    $memberManagement->deleteMember($_GET['id']);
}
$members = $memberManagement->getAllMembers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <a href="logout.php" class="btn btn-danger">Logout</a>
    <h2>Student List</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($members as $member): ?>
            <tr>
                <td><?php echo $member['id']; ?></td>
                <td><?php echo $member['name']; ?></td>
                <td><?php echo $member['email']; ?></td>
                <td><?php echo $member['phone']; ?></td>
                <td>
                    <a href="edit_member.php?id=<?php echo $member['id']; ?>"
                       class="btn btn-warning btn-sm">Edit</a>
                    <a href="admin.php?action=delete&id=<?php echo $member['id']; ?>"
                       class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this member?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
