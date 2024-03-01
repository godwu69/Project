<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include '../MemberManagement/MemberManagement.php';
$memberManagement = new MemberManagement();

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $memberManagement->deleteAdvanceMember($_GET['id']);
}

if (isset($_GET['action']) && $_GET['action'] === 'Active' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $active = $_GET['action'];
    $memberManagement->updateAdvanceStatus($id,$active);
}

if (isset($_GET['action']) && $_GET['action'] === 'Expired' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $expired = $_GET['action'];
    $memberManagement->updateAdvanceStatus($id,$expired);
}

if (isset($_GET['action']) && $_GET['action'] === 'Pending' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $pending = $_GET['action'];
    $memberManagement->updateAdvanceStatus($id,$pending);
}

$advanceMembers = $memberManagement->getAllAdvanceMembers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advance Member List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-5">
    <h2>Advance Member List</h2>
    <a href="admin.php" class="btn btn-outline-danger">Back to admin</a>
    <a href="AdvanceMembersManager.php" class="btn btn-outline-primary">Search</a>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Membership</th>
            <th>Total</th>
            <th>From Date</th>
            <th>To Date</th>
            <th>Status</th>
            <th>Change Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($advanceMembers as $advanceMember) : ?>
            <tr>
                <td><?php echo $advanceMember['name']; ?></td>
                <td><?php echo $advanceMember['email']; ?></td>
                <td><?php echo $advanceMember['phone']; ?></td>
                <td><?php echo $advanceMember['type']; ?></td>
                <td><?php echo $advanceMember['cost']; ?></td>
                <td><?php echo $advanceMember['fromdate']; ?></td>
                <td><?php echo $advanceMember['todate']; ?></td>
                <td><?php echo $advanceMember['status'] ?></td>
                <td>
                    <select class="status-select">
                        <option>Select</option>
                        <option value="1">Pending</option>
                        <option value="2">Active</option>
                        <option value="3">Expired</option>
                    </select>
                </td>
                <td>
                    <a href="AdvanceMembersManager.php?action=Pending&id=<?php echo $advanceMember['id']; ?>" class=" myLink1 "  hidden="hidden">Pending</a>
                    <a href="AdvanceMembersManager.php?action=Active&id=<?php echo $advanceMember['id']; ?>" class=" myLink2 " hidden="hidden">Active</a>
                    <a href="AdvanceMembersManager.php?action=Expired&id=<?php echo $advanceMember['id']; ?>" class=" myLink3 "  hidden="hidden">Expired</a>
                    <a href="edit_advance_member.php?id=<?php echo $advanceMember['id']; ?>" class="btn btn-outline-warning btn-sm">Edit</a>
                    <a href="AdvanceMembersManager.php?action=delete&id=<?php echo $advanceMember['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this member?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    var statusSelects = document.querySelectorAll('.status-select');

    statusSelects.forEach(function(select) {
        select.addEventListener("change", function() {
            var selectedValue = this.value;
            if (selectedValue === "1") {
                this.parentNode.parentNode.querySelector(".myLink1").click();
            } else if (selectedValue === "2") {
                this.parentNode.parentNode.querySelector(".myLink2").click();
            } else if (selectedValue === "3") {
                this.parentNode.parentNode.querySelector(".myLink3").click();
            }
        });
    });

</script>
</body>

</html>