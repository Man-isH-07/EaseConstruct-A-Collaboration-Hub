<?php
session_start();
include 'connect.php';
$sql = "Select * from registered_customer";
$result = mysqli_query($conn, $sql);


$sql = "SELECT * FROM registered_architecture JOIN catalogue ON registered_architecture.arch_mail = catalogue.cat_mail;";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
$data = mysqli_fetch_assoc($result);

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: customer_login.php");
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EaseConstruct-Home Page</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="user_page.css">

  <style>
    .profile
    {
      width: 30vw;
      height: fit-content;
      padding: 10px;
      border: 1px solid black;
      border-radius: 10px;
      font-weight: 800;
      font-size: large;
    }
    .dp img
    {
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
    .buttons a
    {
      width: 10vw;
      height: fit-content;
      background-color: green;
      border-radius: 10px;
      color: white;
      padding: 10px;
      text-decoration: none;
    }
  </style>

  </head>

<body>

  <?php include "navbar.php"; ?>


  <div class="profile">
  <center>
    <div class="dp"><img src="Architecture_Photo\<?php echo "$data[arch_photo]";?>" alt="arch_photo"></div>
    <hr>
    <div class="info">
    <p><?php echo "$data[arch_name]"; ?></p>
      <hr>
      <p>YearOfExp</p>
      <hr>
      <p><?php echo "$data[cat_amt]"; ?></p>
      <hr>
      <div class="buttons">
        <a href="show_prf.php">Show profile</a>
      </div>
    </div>
    </center>
  </div>






  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>