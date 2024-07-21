<?php
session_start();
include 'connect.php';
$sql = "Select * from registered_customer";
$result = mysqli_query($conn, $sql);




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
    .profiles {

      display: flex;
    }

    .profile {
      background-color: #B9D9EB;
      width: 28vw;
      height: fit-content;
      padding: 1%;
      margin: 1%;
      border: 1px solid azure;
      border-radius: 10px;
      font-weight: 700;
      font-size: large;
    }

    .dp img {
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: 700;
      font-size: large;

      width: 13vw;
      /* Adjust size as needed */
      height: 26vh;
      /* Adjust size as needed */
      border-radius: 50%;
      /* To make it circular */
      margin-right: 10px;
      /* Space between picture and name */
      border: 4px solid darkgreen;
    }

    .buttons {
      display: flex;
      justify-content: space-evenly;
    }

    .buttons a {
      width: 10vw;
      height: fit-content;
      border-radius: 10px;
      padding: 2%;
      text-decoration: none;
    }

    #appoint {
      background-color: green;
      color: white;
    }

    #pastWork {
      background-color: #e32636;
      color: white;
    }

    #carouselExampleCaptions img
    {
      height: 82vh;
      background-size: cover;

    }
  </style>

</head>

<body>

<?php include "navbar.php"; ?>

<!-- Slider -->

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="Architecture_PastWork\vs-56.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="Architecture_PastWork\vs-5.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="Architecture_PastWork\vs-000.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<!-- sliderEnd -->


  <div class="profiles">

    <?php 
    include 'connect.php';
    $result = mysqli_query($conn, "SELECT * FROM registered_architecture JOIN catalogue ON registered_architecture.arch_mail=catalogue.cat_mail");

    while ($row = mysqli_fetch_assoc($result)) {

      $arch_mail = $row['arch_mail'];

      ?>
      <div class='profile'>
        <center>
          <div class='dp'><img src='Architecture_Photo\<?php echo $row['arch_photo']; ?>' alt='arch_photo'></div>
          <hr>
          <div class='info'>
            <p><b>Name : </b><?php echo $row['arch_name']; ?></p>
            <hr>
            <p><b>DOB : </b><?php echo $row['arch_dob']; ?></p>
            <hr>
            <p><b>Expected Fees : </b> <?php echo $row['cat_amt']; ?></p>
            <hr>
            <p><b>Catalogue : </b><a href="Architecture_catelogue\<?php echo $row['cat_copy']; ?>" target="_blank">Click
                Here To View</a></p>
            <hr>
            <div class='buttons'>
              <a id="appoint" href=''>Appoint</a>
              <a id="pastWork" href="pastWork.php?arch_mail=<?php echo $row['arch_mail']; ?>">See Past Work</a>
            </div>
          </div>
        </center>
      </div>

      <?php
    }
    ?>
  </div>










  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>