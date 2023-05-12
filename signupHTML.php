<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
    <?php include "././boots_content/globalcdn.inc" ; ?>
    <?php include '././headerfooter/headerLoginSignup.html';?>
    <section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">
              <p> 
                <a href = "landing.php"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                    </svg>
                </a> 
            </p>
               <h1> Applicant Signup</h1>
              
                  <p>Create your account</p>
                  <form method = "POST" action = "adduser.php">
                    <div class="form-outline mb-4">
                        <input type = "text" name = "txtusername" required class="form-control">
                        <label class="form-label" for="txtusername">Name</label>
                    </div>
                    <div class="form-outline mb-4">
                        <input type = "email" name = "txtuseremail" required class="form-control">
                        <label class="form-label" for="txtuseremail">Email</label>
                    </div>
                    <div class="form-outline mb-4">
                        <input type = "password" id="password" name = "pswrduserpassword" required class="form-control" onChange="onChange()">
                        <label class="form-label" for="pswrduserpassword">Password</label>
                    </div>
                    <div class="form-outline mb-4">
                        <input type = "password" id="confirm_password" name = "confirm_password" required class="form-control" onChange="onChange()">
                        <label class="form-label" for="pswrduserpassword">Confirm Password</label>
                    </div>

                    <input type = "submit"  name = "submt" value = "Create Account" class="btn btn-primary">

                    </form>
                    </div>
                    <span id='message'></span>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>



    <!-- <form method = "POST" action = "adduser.php">
        <input type = "text" name = "txtusername" required> Name:
        <br>
        <input type = "email" name = "txtuseremail" required> Email:
        <br>
        <input type = "password" name = "pswrduserpassword" required> Password:
        <br>
        <input type = "submit" name = "submt" >
    </form> -->
    <?php include '././headerfooter/footer.html';?>
    <script>
      function onChange() {
        const password = document.querySelector('input[name=pswrduserpassword]');
        const confirm = document.querySelector('input[name=confirm_password]');
        if (confirm.value === password.value) {
          confirm.setCustomValidity('');
        } else {
          confirm.setCustomValidity('Passwords do not match');
        }
      }
    </script>
</body>

</html>