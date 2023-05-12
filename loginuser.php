<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php include '././headerfooter/headerLoginSignup.html';?>
<body>
    <?php include "././boots_content/globalcdn.inc" ; ?>
    <!-- Login -->
    
    <!-- <form method = "POST" action = "login.php">
        <input type = "email" name = "ltxtuseremail" required> Email:
        <br>
        <input type = "password" name = "lpswrduserpassword" required> Password:
        <br>
        <input type = "submit" name = "submt" >
    </form> -->
   
    
  <section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">
                <?php

                  if(isset($_GET['msg'])){
                    echo "<div class='alert alert-success' role='alert' id = 'successmessage'>";
                    echo "Your account has been created!";
                    echo "</div>";
                  }
                  if(isset($_GET['r'])){
                    echo "<div class='alert alert-warning' role='alert'>";
                    echo "Invalid username or password";
                    echo "</div>";
                  }
                



                ?>
              <p> 
                <a href = "landing.php"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                    </svg>
                </a> 
              </p>
               <h1> Applicant Login</h1>
                <form form method = "POST" action = "login.php">
                  <p>Please login to your account</p>

                  <div class="form-outline mb-4">
                    <input type = "email" name = "ltxtuseremail" required id="form2Example11" class="form-control">
                    <label class="form-label" for="form2Example11">Email</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type = "password" name = "lpswrduserpassword" required id="form2Example22" class="form-control" />
                    <label class="form-label" for="form2Example22">Password</label>
                  </div>


                  <!-- <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <button type="button" class="btn btn-outline-danger">Create new</button>
                  </div> -->
                  
                  <input type = "submit" name = "submt" class="btn btn-primary" value = "Login">
                </form>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include '././headerfooter/footer.html';?>
</body>
</html>