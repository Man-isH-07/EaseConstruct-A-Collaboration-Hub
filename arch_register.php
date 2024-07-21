<?php

include 'connect.php';


$showAlert = false;
$showError = false;

if (isset($_POST["submit"]))
{

    include 'connect.php';


    $name = $_POST["name"];
    $mobile_no = $_POST["mobile_no"];
    $dob = $_POST["dob"];
    $mail = $_POST["mail"];
    $password = $_POST["password"];
    $c_password = $_POST["c_password"];
    

    $photo = rand(1000,10000)."-".$_FILES["file"]["name"];
 
    #temporary file name to store file
    $tname = $_FILES["file"]["tmp_name"];
   
     #upload directory path
$uploads_dir = 'C:\xampp\htdocs\EasyConstruct\Architecture_Photo';

    #TO move the uploaded file to specific location
    move_uploaded_file($tname, $uploads_dir.'/'.$photo);


    $exists=false;
    if(($password == $c_password) && $exists==false){
        $sql = "INSERT INTO `registered_architecture` ( `arch_name`, `arch_mobile`,`arch_dob`,`arch_mail`,`arch_pass`, `arch_c_pass`,`arch_photo`) VALUES ('$name', '$mobile_no', '$dob', '$mail', '$password','$c_password','$photo')";

        $result = mysqli_query($conn, $sql);

        if ($result){
            $showAlert = true;
        }
    }
    else{
        $showError = "Passwords do not match";
    }

}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EaseConstruct-Architecture's_Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="register.css">
    
</head>

<body>
    <header>
        <a class="logo" href="index.php">EaseConstruct<span>.</span></a>
    </header>


    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login Here --> 
        
        <button type="button"  data-dismiss="alert" style=" padding: 5px;"><a style="text-decoration: none;color: black; font-weight: bolder;" href="arch_login.php">LOGIN</a></button> 

    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?> 




    <div class="mid">
       
        <section class="box">

            <h2 style="display: flex; justify-content: center;margin-top: 15px; padding: 10px; font-size: x-large; font-weight: bolder;">
                Architectcure's Registration Form</h2>

            <hr>

            <center>
                <div class="container my-4">
                    <form action="arch_register.php" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="name"><b>Full Name :</b></label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>

                        <div class="form-group" class="dob_no" style="display:flex; justify-content: center; margin-top: 35px;">

                            <label for="mobile_no"><b>Mobile No. :</b></label>
                            <input type="number" class="form-control" id="mobile_no" name="mobile_no"
                                style="width: 25%;">


                            <label for="dob"><b>DOB :</b></label>
                            <input type="date" class="form-control" id="dob" name="dob" style="width: 25%;">

                        </div>

                        <div class="form-group">
                            <label for="mail"><b>Email ID :</b></label>
                            <input type="text" class="form-control" id="mail" name="mail"
                                aria-describedby="emailHelp">

                        </div>

                        <div class="form-group">
                            <label for="password"><b>Password : </b></label>
                            <input type="password" class="form-control" id="password" name="password" style="width: 45%;">
                        </div>

                        <div class="form-group">
                            <label for="c_password"><b>Confirm Password : </b></label>
                            <input type="password" class="form-control" id="c_password" name="c_password" style="width: 45%;">
                        </div>

                        <div class="form-group" style="width: 50vw; margin: 35px; display: flex; align-items: center; justify-content: center;">
                            <label for="file"><b>Upload Photograph : </b></label>
                            <input type="file" class="form-control" id="file" name="file" style="border: none;">
                        </div>

                    

                        <div class="g-recaptcha" data-sitekey="6LcO-qEpAAAAAA1hYNq4DSKyAsws-eWIeeYAIXT-"
                            data-callback="enableBtn"></div>

                        <div class="reset_login">

                            <button type="submit" value="" id="btn" name="submit"
                                    disabled=" disabled">Register</button>

                            <button href="arch_register.php" class="reset-btn btn-primary">Reset</button>
                        </div>
                    </form>
                </div>
            </center>




        </section>
        
    </div>
    

    <script>
        function enableBtn() {
            document.getElementById("btn").disabled = false;
        }
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>