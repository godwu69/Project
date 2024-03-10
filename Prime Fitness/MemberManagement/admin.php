<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../MemberManagement/MemberManagement.php';
    $memberManagement = new MemberManagement();
    $members = $memberManagement->getAllMembers();


if (isset($_GET['search'])) {
    $membership = $_GET['membership'];
    $status = $_GET['status'];
    $members = $memberManagement->searchMember($membership,$status);
}

if (isset($_GET['action']) && $_GET['action'] === 'Active' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $active = $_GET['action'];
    $memberManagement->updateMemberStatus($id,$active);
    header('Location: admin.php');
}

if (isset($_GET['action']) && $_GET['action'] === 'Expired' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $expired = $_GET['action'];
    $memberManagement->updateMemberStatus($id,$expired);
    header('Location: admin.php');
}

if (isset($_GET['action']) && $_GET['action'] === 'Pending' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $pending = $_GET['action'];
    $memberManagement->updateMemberStatus($id,$pending);
    header('Location: admin.php');
}

if (isset($_GET['action']) && $_GET['action'] === 'Hide' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $hide = $_GET['action'];
    $memberManagement->hideMember($id,$hide);
    header('Location: admin.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member List</title>
    <link href="admin-style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

<div class="container mt-5">
    <a href="logout.php" class="btn btn-outline-danger">Logout</a>
    <br>
    <br>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <a href="add_member.php" class="btn btn-outline-primary">Add Member</a>&nbsp;
    <a href="hidden_members.php" class="btn btn-outline-secondary">Hidden Member List</a>
    <form method="get" action="admin.php">
        <select name="membership" required>
            <option value="">Select Membership</option>
            <option value="Basic">Basic</option>
            <option value="Advance">Advance</option>
            <option value="Prime">Prime</option>
        </select>
        &nbsp;
        <select name="status" required>
            <option value="">Select Status</option>
            <option value="Pending">Pending</option>
            <option value="Active">Active</option>
            <option value="Expired">Expired</option>
        </select>
        &nbsp;
        <input type="submit" name="search" value="Search" class="btn btn-outline-primary">
        <a href="admin.php" class="btn btn-outline-danger" id="reset-btn">Reset</a>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
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
        <?php foreach ($members as $member) : ?>
            <tr>
                <td><?php echo $member['id']; ?></td>
                <td><?php echo $member['name']; ?></td>
                <td><?php echo $member['email']; ?></td>
                <td><?php echo $member['phone']; ?></td>
                <td><?php echo $member['membership']; ?></td>
                <td><?php echo $member['cost']; ?></td>
                <td><?php echo $member['fromdate']; ?></td>
                <td><?php echo $member['todate']; ?></td>
                <td><?php echo $member['status'] ?></td>
                <td>
                    <select class="status-select">
                        <option>Select</option>
                        <option value="1">Pending</option>
                        <option value="2">Active</option>
                        <option value="3">Expired</option>
                    </select>
                </td>
                <td>
                    <a href="admin.php?action=Pending&id=<?php echo $member['id']; ?>" class=" myLink1 "  hidden="hidden">Pending</a>
                    <a href="admin.php?action=Active&id=<?php echo $member['id']; ?>" class=" myLink2 " hidden="hidden">Active</a>
                    <a href="admin.php?action=Expired&id=<?php echo $member['id']; ?>" class=" myLink3 "  hidden="hidden">Expired</a>
                    <a href="edit_member.php?id=<?php echo $member['id']; ?>" class="btn btn-outline-warning btn-sm">Edit</a>
                    <a href="admin.php?action=Hide&id=<?php echo $member['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to hide this member?')">Hide</a>
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
