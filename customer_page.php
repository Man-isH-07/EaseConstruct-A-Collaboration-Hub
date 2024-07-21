<?php
session_start();
include 'connect.php';
$sql = "Select * from registered_customer";
$result = mysqli_query($conn, $sql);

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location:customer_login.php");
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


  <style>

    .cards {
      display: flex;
      justify-content: space-around;
      align-items: center;
      margin-top: 50px;
    }

    .silver {
      width: 30vw;
      height: fit-content;
      padding: 5px;
      background-image: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);
      border: 1px solid linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);;
      border-radius: 10px;
    }



    .platinum {
      width: 30vw;
      height: fit-content;
      padding: 5px;
      background-color: #E6E6FA;
      border: 1px solid #E6E6FA;
      border-radius: 10px;
    }

    .gold {
      width: 30vw;
      height: fit-content;
      padding: 5px;
      background-image: linear-gradient(to top, #e6b980 0%, #eacda3 100%);            border: 1px solid linear-gradient(120deg, #f6d365 0%, #fda085 100%);
      border-radius: 10px;
    }

    .silver:hover,
    .platinum:hover,
    .gold:hover {
      height: fit-content;
      font-weight: 600;
      transition: all 0.3s ease-in;
      color: black;
    }

    .silver img:hover,
    .platinum img:hover,
    .gold img:hover {
      width: 55%;
      height: 55%;
      transition: all 0.5s ease-in;
    }


    .silver button,
    .platinum button,
    .gold button {
      background-color: silver;
      padding: 5px;
      border: 1px solid silver;
      color: black;
      border-radius: 10px;
      margin-bottom: 10px;
    }

 

    .silver a,
    .platinum a,
    .gold a {
      color: black;
      text-decoration: none;
      font-weight: bold;
      border-radius: 5px;
    }

    .silver a:hover,
    .platinum a:hover,
    .gold a:hover {
      color: black;
    }

  </style>
</head>

<body>

  <?php include "navbar.php"; ?>

  <center>
    <div class="cards">


      <div class="silver">

        <img src="Silver.png" alt="" width="50%" height="50%">
        <hr>
        <div class="info">
          <ul>
            <li>Lorem ipsum dolor sit amet, consectetur .</li>
            <li>Lorem ipsum dolor sit amet, consectetur .</li>
            <li>Lorem ipsum dolor sit amet, consectetur .</li>
            <li>Lorem ipsum dolor sit amet, consectetur .</li>
            <li>Lorem ipsum dolor sit amet, consectetur .</li>
          </ul>
          <hr>
          <button><a href="silverpage.php">View More</a></button>
        </div>


      </div>

      <div class="platinum">

        <img src="platinum.png" alt="" width="50%" height="50%">
        <hr>
        <ul>
          <li>Lorem ipsum dolor sit amet, consectetur .</li>
          <li>Lorem ipsum dolor sit amet, consectetur .</li>
          <li>Lorem ipsum dolor sit amet, consectetur .</li>
          <li>Lorem ipsum dolor sit amet, consectetur .</li>
          <li>Lorem ipsum dolor sit amet, consectetur .</li>
        </ul>
        <hr>

        <button><a href="platinumpage.php">View More</a></button>



      </div>

      <div class="gold">

        <img src="gold.png" alt="" width="50%" height="50%">
        <hr>
        <ul>
          <li>Lorem ipsum dolor sit amet, consectetur .</li>
          <li>Lorem ipsum dolor sit amet, consectetur .</li>
          <li>Lorem ipsum dolor sit amet, consectetur .</li>
          <li>Lorem ipsum dolor sit amet, consectetur .</li>
          <li>Lorem ipsum dolor sit amet, consectetur .</li>
        </ul>
        <hr>
        <button><a href="goldpage.php">View More</a></button>


      </div>

    </div>
  </center>






  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>