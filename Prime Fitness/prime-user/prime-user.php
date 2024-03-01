<?php
include '../MemberManagement/MemberManagement.php';
$memberManagement = new MemberManagement();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $memberManagement->addPrime($name, $email, $phone);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="globals.css"/>
    <link rel="stylesheet" href="styleguide.css"/>
    <link rel="stylesheet" href="style.css"/>
    <title>Successfully</title>
</head>

<body>
<div class="desktop">
    <div class="overlap">
        <div class="frame">
            <a href="../homepage/index.php">
                <div class="div">
                    <div class="text-wrapper">PRIME</div>
                    <div class="FITNESS-TRAINING">FITNESS &amp; TRAINING</div>
                </div>
            </a>
            <a href="../memberships/index.php">
                <div class="div-wrapper">
                    <div class="text-wrapper-2">Join Us</div>
                </div>
            </a>
            <a href="../homepage/index.php">
                <div class="frame-2">
                    <div class="text-wrapper-3">Home</div>
                </div>
            </a>
            <a href="../services/index.php">
                <div class="frame-3">
                    <div class="text-wrapper-4">Services</div>
                </div>
            </a>
            <a href="../about/index.html">
                <div class="frame-4">
                    <div class="text-wrapper-5">About</div>
                </div>
            </a>
            <a href="../contact/index.html">
                <div class="frame-5">
                    <div class="text-wrapper-6">Contacts</div>
                </div>
            </a>
        </div>
        <div class="frame-6">
            <div class="frame-7">
                <div class="text-wrapper">PRIME</div>
                <div class="FITNESS-TRAINING">FITNESS &amp; TRAINING</div>
            </div>
            <div class="text-wrapper-7">Prime Power For Fitness</div>
            <div class="prime-fitness">Prime Fitness &amp; Training</div>
            <p class="p">8A Ton That Thuyet, My Dinh, Cau Giay, Ha Noi</p>
            <div class="frame-8">
                <img class="copyright" src="img/copyright-1-1.png"/>
                <div class="text-wrapper-8">2024 All Rights Reserved</div>
            </div>
            <img class="pin-alt-light" src="img/pin-alt-light.svg"/>
            <div class="overlap-group">
                <img class="phone" src="img/phone.png"/>
                <img class="vector" src="img/vector-189.svg"/>
                <p class="text-wrapper-9">012 345 6789 - 098 765 4321</p>
            </div>
            <img class="message" src="img/message-1.svg"/>
            <div class="text-wrapper-10">fptaptech@fpt.edu.vn</div>
            <div class="text-wrapper-11">More</div>
            <a href=""><a href="">
                    <div class="text-wrapper-12">Terms of Use</div>
                </a></a>
            <a href="">
                <div class="text-wrapper-13">Privacy Notice</div>
            </a>
            <img class="line" src="img/line-4.svg"/>
            <img class="img" src="img/line-5.svg"/>
            <a href="">
                <div class="text-wrapper-14">Cookies</div>
            </a>
        </div>
        <div class="frame-9">
            <a href="../homepage/index.php">
                <div class="frame-10">
                    <div class="text-wrapper-15">Back to homepage</div>
                </div>
            </a>
            <div class="overlap-2">
                <div class="div">
                  <div class="text-wrapper">PRIME</div>
                  <div class="FITNESS-TRAINING">FITNESS &amp; TRAINING</div>
                </div>
                <img class="line-2" src="img/line-6.svg" />
              </div>
              <div class="frame-11">
                <div class="text-wrapper-16">Prime</div>
                <div class="text-wrapper-17">Membership</div>
              </div>
              <div class="text-wrapper-18">Successfully Registation</div>
                <div class="notice">We will contact you within 24 hours, thank you for using our service.</div>
                <p class="user-name">Name: <?php echo $_POST['name']?></p>
                <p class="user-email">Email: <?php echo $_POST['email']?></p>
                <p class="user-phone">Phone: <?php echo $_POST['phone']?></p>
        </div>
    </div>
</div>
</body>
</html>