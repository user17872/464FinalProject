<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sprout</title>
    <link rel = "icon" href = "././images/green-leaf-icon.webp" type = "image/x-icon">
</head>
<header>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarExample01"
        aria-controls="navbarExample01"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarExample01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <!-- <li class="nav-item">
            <a class="nav-link" href="features.php">Features</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="aboutus.php">About</a>
          </li>
        </ul>   
      </div>
      <button type="button" class="btn btn-outline-primary" onclick="window.location.href='signupHTML.php'">Sign-up</button>
      <div>&nbsp</div>
      <button type="button" class="btn btn-outline-secondary" onclick="window.location.href='loginuser.php'">Login</button>
    </div>
  </nav>
  <!-- Navbar -->

  <!-- Jumbotron -->
  <div class="p-5 text-center bg-light">
    <!-- <h1 class="mb-3">Sprout</h1> -->
    <img src="././images/Sprout2.png" alt="Bootstraplogo">
    <!-- <a class="btn btn-primary" href="" role="button">Call to action</a> -->

    <p> Find the entry-level job of your dreams.</p>
    <a href = "employerLogin.php"> Post a job</a>
  </div>
  <!-- Jumbotron -->
</header>
<body>
    <?php 
        include "././boots_content/globalcdn.inc" ;
        //include("././../includes/php_scripts/script.php");
    ?>
    <br><br>
    <?php include '././headerfooter/footer.html';?>
</body>
</html>