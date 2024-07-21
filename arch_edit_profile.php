<?php
session_start();
include 'connect.php';


$sql = "Select * from registered_architecture where arch_mail='$_SESSION[arch_mail]'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
$data = mysqli_fetch_assoc($result);


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EaseConstruct-Architecture's_Edit_Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <style>
        .pack {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }

        .arch_info {
            margin: 1%;
            padding: 5px;
            width: 40%;
            height: fit-content;
            border: 2px solid black;
            background-color: rgb(216, 255, 255);
            border-radius: 10px;
        }

        .arch_info label {
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 800;
            font-size: larger;
        }

        .arch_info p {
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 600;
            font-size: large;
        }

        .arch_info img {
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 700;
            font-size: large;

            width: 12vw;
            /* Adjust size as needed */
            height: 24vh;
            /* Adjust size as needed */
            border-radius: 50%;
            /* To make it circular */
            margin-right: 10px;
            /* Space between picture and name */

        }



        #not_edited {
            font-weight: 400;
            border: 1px solid red;
            color: white;
            background-color: red;
            border-radius: 5px;
            text-decoration: none;
            cursor: no-drop;
        }

        .edits {
            width: 30vw;
            padding: 10px;
            height: fit-content;
            border: 2px solid black;
            background-color: rgb(216, 255, 255);
            border-radius: 10px;
        }

        .edits a {
            display: block;
            font-weight: bolder;
            font-size: larger;
            color: black;
            background-color: rgb(173, 255, 173);
            border-radius: 5px;
            text-decoration: none;
            cursor: grab;
            padding: 6px;
            margin: 20px;
        }
    </style>



</head>

<body>


<?php include "navbar_arch.php"; ?>

    

    <div class="pack">

        <section class="arch_info">
            <center>
                <h3>My Profile</h3>
            </center>
            <hr>

            <div>
                <center><img src="Architecture_Photo\<?php echo "$data[arch_photo]"; ?>" alt="User Photo"></center>
            </div>

            <hr>

            <div>
                <label>Name</label>
                <p><?php echo "$data[arch_name]"; ?></p>
            </div>

            <hr>

            <div>
                <label>Date Of Birth</label>
                <p><?php echo "$data[arch_dob]"; ?></p>
            </div>


            <hr>

            <div>
                <label>Contact Number</label>
                <p><?php echo "$data[arch_mobile]"; ?></p>
            </div>

            <hr>



            <div>
                <label>Email ID ( <button id="not_edited">Can't Be Edited</button> )</label>
                <p disabled><?php echo "$data[arch_mail]"; ?></♂>

            </div>

        </section>

        <section class="edits">

            <center><a
                    href="edit_arch_info.php?nm=$nm &dob=$data[arch_dob] &cn=$data[arch_mobile] &img=$data[arch_photo]">Edit
                    / Update Details</a>
                <a href="#" style="background-color: lightblue; color:black; border:none; font-weight:bolder;">Update
                    Profile Photo </a>
                <a href="#" style="background-color: rgb(255, 255, 171); color:black; border:none; font-weight:bolder;">Change
                    Password</a>
                <a href="#" style="background-color: rgb(255, 199, 199); color:black; border:none; font-weight:bolder;">Update Your
                    Catelogue</a>
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