<?php
session_start();
include 'connect.php';
error_reporting(0);
$sql = "Select * from registered_architecture where arch_mail='$_SESSION[arch_mail]'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
$data = mysqli_fetch_assoc($result);

if(isset($_GET['submit']))
{
    $name = $_GET['name'];
    $mobile_no=$_GET['mobile_no'];
    $dob=$_GET['dob'];

$sql = "Update registered_architecture SET arch_name='$name',arch_mobile='$mobile_no',arch_dob='$dob' WHERE arch_mail='$_SESSION[arch_mail]'";
$result = mysqli_query($conn, $sql);
if($result)
{
    echo "<script>alert('Profile Updated')</script> ";
    ?>
    <META http-equiv="refresh" content="0; URL=http://localhost/EasyConstruct/arch_edit_profile.php" >
    <?php
}
else
{
    echo"Not Updated";
}
}



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EaseConstruct-Architecture's_Info_Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
    <style>
header {
  background: linear-gradient(to bottom, #D5DEE7 0%, #E8EBF2 50%, #E2E7ED 100%), linear-gradient(to bottom, rgba(0, 0, 0, 0.02) 50%, rgba(255, 255, 255, 0.02) 61%, rgba(0, 0, 0, 0.02) 73%), linear-gradient(33deg, rgba(255, 255, 255, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%);
  background-blend-mode: normal, color-burn;
  height: 15vh;
  display: flex;
  justify-content: center;
  align-items: center;

}

.logo {
  color: black;
  font-weight: 600;
  font-size: 2.1rem;
  text-decoration: none;
}

.logo span {
  color: #C06B3E;
}

.logo a {
  color: black;
  text-decoration: none;
  transition: 0.2s ease;

  font-weight: bolder;
  font-size: large;
}

.logo a:hover {
  color: #C06B3E;
}

.mid {
    background-image: linear-gradient(120deg, #e0c3fc 0%, #8ec5fc 100%);

     height:85vh;
 
}


.box {
    background-image: linear-gradient(to top, #accbee 0%, #e7f0fd 100%);  
    height: fit-content;

  border-radius: 10px;
  position: absolute;
  left: 25%;
  margin-top: 20px;


}


.form-group {
  margin-top: 20px;
}

.form-group label {
  font-weight: bold;
  font-size: large;
  margin: 15px;

}

.form-group input {
  width: 60%;
  font-weight: bold;
  font-size: large;
  padding: 6px;
  border: none;
  border-bottom: 2px solid black;
  border-radius: 10px;

}

.forget_register {
  display: flex;
  justify-content: space-evenly;
  margin-top: 30px;
  margin-bottom: 30px;
  font-weight: bold;
  font-size: large;

}

.reset_login {
  display: flex;
  justify-content: center;
  margin-top: 30px;
  gap: 15%;
}

#btn {
  border: 2px solid black;
  padding: 10px;
  border-radius: 10px;
  font-size: large;
  font-weight: bolder;
  cursor: pointer;
}

.reset-btn {

  font-size: large;
  font-weight: bolder;
  border-radius: 10px;
  padding: 5px;
  color: black;
  background-color: rgb(255, 109, 109);
  border: 1px solid rgb(255, 119, 119);
  cursor: pointer;
}

    </style>
    
</head>

<body>


   <header>
        <a class="logo" href="index.php">EaseConstruct<span>.</span></a>
    </header>



    <div class="mid">
       <center>
        <section class="box">

            <h2 style="display: flex; justify-content: center;margin-top: 15px; padding: 10px; font-size: x-large; font-weight: bolder;">
                Architectcure's Information Edit Form</h2>

            <hr>

            <center>
                <div class="container my-4">
                    <form action="edit_arch_info.php" method="♀ost">

                        <div class="form-group">
                            <label for="name"><b>Full Name :</b></label>
                            <input type="text" value="<?php echo"$data[arch_name]" ?>" class="form-control" id="name" name="name">
                        </div>

                        <div class="form-group" class="dob_no" style="display:flex; justify-content: center; margin-top: 35px;">

                            <label for="mobile_no"><b>Mobile No. :</b></label>
                            <input type="number" value="<?php echo"$data[arch_mobile]" ?>"  class="form-control" id="mobile_no" name="mobile_no"
                                style="width: 25%;">


                            <label for="dob"><b>DOB :</b></label>
                            <input type="date" value="<?php echo"$data[arch_dob]" ?>"  class="form-control" id="dob" name="dob" style="width: 25%;">

                        </div>

                    

                        <div class="g-recaptcha" style="margin-top:30px;" data-sitekey="6LcO-qEpAAAAAA1hYNq4DSKyAsws-eWIeeYAIXT-"
                            data-callback="enableBtn"></div>

                        <div class="reset_login">

                            <button type="submit" value="" id="btn" name="submit"
                                    disabled=" disabled">Update</button>

                            <button href="arch_register.php" class="reset-btn btn-primary">Reset</button>
                        </div>
                    </form>
                </div>
            </center>

        </section>
        </center>

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