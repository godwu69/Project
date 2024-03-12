<?php

include '../MemberManagement/MemberManagement.php';
$memberManagement = new MemberManagement();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $membership = $_POST['membership'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $fromdate = date('Y-m-d');

    if ($membership == 'Basic') {
        $todate = date('Y-m-d', strtotime('+1 month'));
        $cost = '20$';
    } elseif ($membership == 'Advance') {
        $todate = date('Y-m-d', strtotime('+6 months'));
        $cost = '150$';
    } elseif ($membership == 'Prime') {
        $todate = date('Y-m-d', strtotime('+1 year'));
        $cost = '250$';
    }
$memberManagement->addMember($name,$email,$phone,$membership,$cost,$fromdate,$todate);
    header('Location: admin.php');
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
    <link rel="stylesheet" href="add.css">
</head>
<body>
<div class="container mt-5">
    <a href="admin.php" class="btn btn-outline-danger">Back</a>
    <br><br>
    <h2>Add Member</h2>
    <form method="post" action="add_member.php">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name"
                   name="name" value="" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email"
                   name="email" value="" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone"
                   name="phone" value="" required>
        </div>
        <div class="form-group">
            <label for="membership">Membership:</label>&nbsp;
            <br>
            <select name="membership" id="membership" required>
                <option value="">Select</option>
                <option value="Basic">Basic</option>
                <option value="Advance">Advance</option>
                <option value="Prime">Prime</option>
            </select>
        </div>
        <button type="submit" class="btn btn-outline-primary">Add Member</button>
    </form>
</div>
</body>
</html>
