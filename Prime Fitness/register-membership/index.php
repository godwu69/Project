<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="globals.css" />
  <link rel="stylesheet" href="style.css" />
  <title>Membership Register</title>
</head>

<body>
  <form method="post" action="../user-information/user-information.php">
    <div class="desktop">
      <div class="overlap-wrapper">
        <div class="overlap">
          <div class="frame">
            <a href="../homepage/index.php">
              <div class="logo">
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
            <a href="../services/index.html">
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
              <img class="copyright" src="img/copyright-1-1.png" />
              <div class="text-wrapper-8">2024 All Rights Reserved</div>
            </div>
            <img class="pin-alt-light" src="img/pin-alt-light.svg" />
            <div class="overlap-group">
              <img class="phone" src="img/phone.png" />
              <img class="vector" src="img/vector-189.svg" />
              <p class="text-wrapper-9">012 345 6789 - 098 765 4321</p>
            </div>
            <img class="message" src="img/message-1.svg" />
            <div class="text-wrapper-10">fptaptech@fpt.edu.vn</div>
            <div class="text-wrapper-11">More</div>
            <a href="">
              <div class="text-wrapper-12">Terms of Use</div>
            </a>
            <a href="">
              <div class="text-wrapper-13">Privacy Notice</div>
            </a>
            <img class="line" src="img/line-4.svg" />
            <img class="img" src="img/line-5.svg" />
            <a href="">
              <div class="text-wrapper-14">Cookies</div>
            </a>
          </div>
          <div class="frame-9">
            <p class="notice-message">Please fill in your information in the form below, we will contact you within 24 hours</p>
            <input type="text" name="name" id="name" class="rectangle" placeholder="Enter your name" required />
            <input type="email" name="email" id="email" class="rectangle-2" placeholder="Enter your email address" required />
            <input type="text" name="phone" id="phone" class="rectangle-3" placeholder="Enter your phone number" required />
            <select name="membership" id="membership" required>
              <option value="">Select your membership</option>
              <option value="Basic">Basic</option>
              <option value="Advance">Advance</option>
              <option value="Prime">Prime</option>
            </select>
            <input type="submit" value="Join Now" class="frame-10" />
            <div class="overlap-2">
              <div class="div">
                <div class="text-wrapper">PRIME</div>
                <div class="FITNESS-TRAINING">FITNESS &amp; TRAINING</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</body>

</html>