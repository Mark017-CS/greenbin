<?php
require('include/db.php');

$isLoggedIn = isset($_SESSION['isUserLoggedIn']) && $_SESSION['isUserLoggedIn'] === true;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Greenbin</title>
  <!-- AJAX -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Favicons -->
  <link href="images/logo.png" rel="icon">
  <link href="images/logo.png" rel="apple-touch-icon">
  <!-- box icons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="script.js"></script>
  <script>
    window.onload = function () {
      if (performance.navigation.type === 1) {
        // Page is reloaded
        location.href = "#home";
      }
    };
  </script>
  <script>
    if (window.location.href.indexOf("#home") === -1) {
      window.location.href = window.location.href + "#home";
    }
  </script>
  <style>
    body {
      font-family: "Open Sans", sans-serif;
      background-color: #040404;
      color: #fff;
    }

    .navbar-link {
      font-weight: bold;
      color: #FFF !important;
      text-shadow: lightgreen;
    }

    .gray-background::placeholder {
      color: black;
    }

    .gray-background {
      color: black;
    }

    .gray-background {
      background-color: gray;
      color: white;
    }

    .gray-background:focus {
      background-color: gray;
      color: white;
    }

    .background-image {
      position: fixed;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      opacity: 0.5;
      background: url('images/greenbin.png') top right no-repeat;
      background-size: cover;
    }
  </style>
</head>

<body>
  <div class="background-image"></div>
  <!-- ======= Header ======= -->
  <header class="header" id="header" style="justify-content: center;">
    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link active" href="#home">Home</a></li>
        <li><a class="nav-link" href="#food">Food Waste</a></li>
        <li><a class="nav-link" href="#about">About Us</a></li>
        <li><a class="nav-link" href="#contact">Contact</a></li>

        <?php if ($isLoggedIn) { ?>
          <li><a href="components/logout.php"><b class="navbar-link">Logout</b></a></li>
        <?php } else { ?>
          <li><a href="components/register.php"><b class="navbar-link">Register</b></a></li>
          <li><a href="components/login.php"><b class="navbar-link">Login</b></a></li>
        <?php } ?>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
  </header><!-- End Header -->


  <section class="home" id="home">
    <div class="containers">
      <img src="images/logo.png" alt="Green Bin" style="width: 180px; height: 200px;">
      <h1><a href="index.php"><b style="color: #21ce5d; font-style: italic; ">
            Green</b><b style="color: #FFF;">Bin
          </b></a></a></h1>
      <h2 style="text-decoration: solid; text-shadow: #000000;">
        GreenBin is an innovative application software designed to tackle <br>the pressing issue of <span>food waste
          reduction</span> within food establishments, <br> such as restaurants, cafes, hotels, and other commercial
        kitchens.
      </h2>

      <div class="social-links" style="justify-content: center;">
        <a href="https://twitter.com/" class="twitter" target="_blank"><i class="bi bi-twitter"></i></a>
        <a href="https://facebook.com/" class="facebook" target="_blank"><i class="bi bi-facebook"></i></a>
        <a href="https://instagram.com/" class="instagram" target="_blank"><i class="bi bi-instagram"></i></a>
        <a href="https://join.skype.com/" class="google-plus" target="_blank"><i class="bi bi-skype"></i></a>
        <a href="https://youtube.com/" class="youtube" target="_blank"><i class="bi bi-youtube"></i></a>
        <a href="https://linkedin.com/" class="linkedin" target="_blank"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </section>
  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <!-- ======= About Us ======= -->
    <div class="about-me container">
      <div class="section-title">
        <h2>About Us</h2>
        <p>Learn more about us</p>
      </div>
      <div class="row" style="justify-content: center;">
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
          <p style="text-align: center;">
            Welcome to GreenBin, the revolutionary application software designed to optimize food waste reduction among
            food establishments! At GreenBin, we are committed to making a significant impact on the global food waste
            crisis by providing innovative and user-friendly solutions to restaurants, cafes, hotels, and other
            food-related businesses.

            <br><br>GreenBin offers a comprehensive suite of features that streamline the process of managing food
            surplus. Our intuitive and easy-to-navigate interface allows businesses to track their inventory
            efficiently, identify potential waste points, and make informed decisions to reduce excess food. By
            implementing smart analytics and reporting tools, we enable our users to gain valuable insights into their
            waste patterns, which empowers them to fine-tune their operations and minimize overproduction.

            <br><br>What sets GreenBin apart is our commitment to customization and flexibility. We understand that
            every food establishment is unique, with distinct processes and challenges. Therefore, our software can be
            tailored to suit the specific needs of each business, ensuring a seamless integration into their existing
            workflows.

            <br><br>Beyond just an application, GreenBin fosters a community of like-minded businesses and
            environmentally-conscious individuals. By bringing together food establishments, NGOs, and sustainability
            advocates, we create a platform for sharing best practices, innovative ideas, and success stories, fostering
            collaboration towards a common goal of reducing food waste.

            <br><br>Our team at GreenBin comprises passionate individuals who possess a deep understanding of both the
            technology and the urgency of the global food waste issue. We continuously innovate and upgrade our
            software, staying at the forefront of technological advancements to offer the best possible solutions to our
            valued clients.

            <br><br>Join us at GreenBin, and let's embark on a journey towards a more sustainable future together.
            Together, we can make a difference and create a world where food waste is minimized, and every meal counts
            towards a greener planet.
          </p>
        </div>
      </div>
    </div><!-- End About Us-->
    <!-- ======= Mission ======= -->
    <div class="about-me container">
      <div class="section-title">
        <h2>Our Mission</h2>
        <p>Mission</p>
      </div>
      <div class="row" style="justify-content: center;">
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
          <p style="text-align: center;">
            Our mission is simple yet profound: to empower food establishments to minimize their environmental footprint
            and contribute to a sustainable future. We understand that the food industry plays a significant role in the
            wastage of edible goods, and we aim to change that through cutting-edge technology and effective strategies.
          </p>
        </div>
      </div>
    </div><!-- End Mission-->
    <!-- ======= Vision ======= -->
    <div class="about-me container">
      <div class="section-title">
        <h2>Our Vision</h2>
        <p>Vision</p>
      </div>
      <div class="row" style="justify-content: center;">
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
          <p style="text-align: center;">
            Our vision is to create a world where restaurants, cafes, and other food-related businesses can
            significantly reduce their food waste, making a positive impact on both the environment and their bottom
            line.
          </p>
        </div>
      </div>
    </div><!-- End Vision-->
  </section><!-- End About Section -->

  <!-- ======= Food Classification Section ======= -->
  <section id="food" class="food">
    <div class="container">
      <div class="section-title">
        <h2>Food Waste</h2>
        <p>Food Waste Classification</p>
      </div>
      <div class="row food-container">

        <div class="card-body p-0">
          <div class="col-md-6" style="margin-bottom: 10px;">
            <form id="search-form">
              <input type="text" id="searchTerm" placeholder="Search term..." required>
              <button type="submit">Search</button>
            </form>
          </div>
          <table class="food-table">
            <thead>
              <tr>
                <th style="width: 10px">ID</th>
                <th>Item</th>
                <th>Weight (in kg)</th>
                <th>Type of Waste</th>
                <th>Expiration Date</th>
                <th>Organization Contact</th>
                <th style="width: 40px">Action</th>
              </tr>
            </thead>
            <tbody>
            <tbody id="tableBody">
          </table>
        </div>
        <form id="addEntryForm" role="form" action="index.php" method="post" enctype="multipart/form-data"
          style="margin-top: 25px;">
          <div class="card-body">
            <div class="form-group col-6">
              <label for="exampleInputEmail1">Select Type of Waste</label><br>
              <select name="wasteType" id="wasteType" class="form-control">
                <option value="Rinds, Peels, and Shells">Rinds, Peels, and Shells</option>
                <option value="Meat and Bones">Meat and Bones</option>
                <option value="Seeds and Nuts">Seeds and Nuts</option>
                <option value="Stems, Leaves, and Plant Scraps">Stems, Leaves, and Plant Scraps</option>
                <option value="Spoiled and Unusable">Spoiled and Unusable</option>
              </select>
            </div>
            <div class="form-group col-6">
              <label for="exampleInputEmail1">Food Item</label>
              <input type="text" class="form-control" id="item" placeholder="Enter Food item name..." name="item"
                id="exampleInputEmail1" required>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group col-6">
              <label for="exampleInputEmail1">Weight (in kg)</label>
              <input type="text" class="form-control" id="weight" placeholder="Enter weight..." name="weight"
                id="exampleInputEmail1" required>
            </div>
            <div class="form-group col-6">
              <label for="exampleInputEmail1">Expiration Date</label>
              <input type="date" name="xdate" id="xdate" required>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" id="submitBtn" onClick="addDataToTable();">Add</button>
          </div>

        </form>

      </div>

    </div>
  </section>


  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">
      <div class="section-title">
        <h2>Contact</h2>
        <p>Contact Us</p>
      </div>
      <div class="row mt-2">
        <div class="col-md-6 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-map"></i>
            <h3>Address</h3>
            <p>
              Sta. Mesa Manila
            </p>
          </div>
        </div>
        <div class="col-md-6 mt-4 mt-md-0 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-share-alt"></i>
            <h3>GreenBin Social Profiles</h3>
            <div class="social-links">
              <a href="https://twitter.com/" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="https://facebook.com/" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="https://instagram.com/" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="https://skype.com/" class="google-plus"><i class="bi bi-skype"></i></a>
              <a href="https:/youtube.com/" class="youtube"><i class="bi bi-youtube"></i></a>
              <a href="https://linkedin.com/" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-envelope"></i>
            <h3>Email Us</h3>
            <p>
              greenbin@gmail.com
            </p>
          </div>
        </div>
        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-phone-call"></i>
            <h3>Call Us</h3>
            <p>
              (+63)999999999
            </p>
          </div>
        </div>
      </div>
      <form action="#" method="POST" class="php-email-form mt-4">
        <div class="row">
          <div class="col-md-6 form-group mt-3">
            <input type="text" name="fullName" class="form-control gray-background" placeholder="Your Name" required>
          </div>
          <div class="col-md-6 form-group mt-3">
            <input type="email" class="form-control gray-background" name="email" placeholder="Your Email" required>
          </div>
          <div class="col-md-6 form-group mt-3">
            <input type="number" class="form-control gray-background" name="mobileNumber" placeholder="Mobile Number"
              required>
          </div>
          <div class="col-md-6 form-group mt-3">
            <input type="text" class="form-control gray-background" name="subject" placeholder="Email Subject" required>
          </div>
          <div class="col-md-12 form-group mt-3">
            <textarea class="form-control gray-background" name="message" rows="5" placeholder="Your Message"
              required></textarea>
          </div>
          <div class="text-center center-text">
            <button type="submit" class="btn btn-primary center-text">Send Email
            </button>
          </div>
        </div>
      </form>
    </div>
  </section>

  <!-- End Contact Section -->

  <div class="credits">
    Copyright &copy; 2023 <a href="#">by Group 1 | All Rights Reserved.</a>
  </div>

  <!-- SCRIPTS -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>


</body>

</html>