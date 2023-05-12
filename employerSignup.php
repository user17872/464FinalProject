<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include '././headerfooter/headerLoginSignup.html';?>


<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">
                                <?php include "././boots_content/globalcdn.inc" ; ?>


                                <p> 
                                    <a href = "employerLogin.php"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                                        </svg>
                                    </a> 
                                </p>
                                <h1> Create an employer account</h1>

                                <form method = "POST" action = "addEmployer.php">
                                    <label class="form-label" for="employerCompanyName">Company Name</label>
                                    <input class="form-control" type = "text" name = "employerCompanyName" placeholder = "Ex. One Software Solutions" required > 
                                   
                                    <br>
                                    <label class="form-label" for="employerCompanyIndustry">Industry</label>
                                    <input class="form-control" type = "text" name = "employerCompanyIndustry"  placeholder = "Ex. Information Technology" required >
                                        
                                    <br>
                                    <label class="form-label" for="employerAbout">Headquarters Country</label>
                                    <input class="form-control" type = "text" name = "employerAbout" placeholder = "Ex. United States of America"  required > 
                                        
                                    <br>
                                    <label class="form-label" for="employerCompanyEmail"> Corporate E-mail:</label>
                                    <input class="form-control" type = "text" name  = "employerCompanyEmail" placeholder = "Ex. tsscareers@tss.com"  required>
                                        
                                    <br>
                                    <label class="form-label" for="employerPassword">Password</label>
                                    <input class="form-control" type = "password" name = "employerPassword" id = "pswrdone" required>
                                        
                                    <br>
                                    <input type = "submit" name = "subit" class="btn btn-primary"> 


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