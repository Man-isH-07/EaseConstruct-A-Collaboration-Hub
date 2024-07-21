<?php
session_start();
// Check if user is already logged in, if yes, redirect to user page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: customer_page.php");
    exit;
}


$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'connect.php';
    $email = $_POST["email"];
    $password = $_POST["password"]; 
     
    $sql = "Select cus_id , cus_name , cus_mail,cus_pass from registered_customer where cus_mail='$email' AND cus_pass='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['cus_id'] = $cus_id;
        $_SESSION['cus_mail'] = $email;
        $_SESSION['cus_name'] = $cus_name;
        header("location: customer_page.php");
        exit();
    } 
    else{
        $showError = "Invalid Credentials";
    }
}
    
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EaseConstruct-CustomerLogin</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="login.css">
</head>

<body>
<?php include "our_ref_nav.php"; ?>
    <header>
        <a class="logo" href="index.php">EaseConstruct<span>.</span></a>
    </header>


   

    

    <div class="mid">
    <section class="box">

        <h2 style="display: flex; justify-content: center; padding: 10px; font-size: x-large; font-weight: bolder;">Customer's Login</h2>

        <hr>

        <center>
            <div class="container my-4">
                <form action="customer_login.php" method="post">

                    <div class="form-group">
                        <label for="email"><b>E-Mail ID :</b></label>
                        <input type="text" class="form-control" id="mail" name="email"
                            aria-describedby="emailHelp">

                    </div>
                    <div class="form-group">
                        <label for="password"><b>Password : </b></label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="forget_register">

                        <h6>If you are new ? Then <a href="customer_register.php">REGISTER HERE</a></h6>

                        <h6><a href="">Forget Password ?</a></h6>

                    </div>

                    <div class="g-recaptcha" data-sitekey="6LcO-qEpAAAAAA1hYNq4DSKyAsws-eWIeeYAIXT-" data-callback="enableBtn"></div>

                    <div class="reset_login">

                       <input type="submit" value="Login" href="" id="btn" disabled=" disabled">

                        <button type="submit" class="reset-btn btn-primary">Reset</button>
                    </div>
                </form>
            </div>
        </center>




    </section>
    </div>

    <script>
        function enableBtn(){
      document.getElementById("btn").disabled = false;
    }
   </script>
</body>

</html>