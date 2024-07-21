<?php
session_start();
include 'connect.php';
$sql = "Select * from registered_customer";
$result = mysqli_query($conn, $sql);


$arch_mail = $_GET['arch_mail'];


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
          

       .container {
        display: inline;
    }
    
    /* Style for the image */
    .image {
        width:  40vw;
        height: 45vh;
        object-fit: cover;  
        border-radius: 10px;
        margin: 20px;
        transition: transform 0.3s ease;
    }
    .image:hover {
        cursor: -moz-zoom-in; 
    cursor: -webkit-zoom-in; 
    cursor: zoom-in; 
     transform: scale(1.1);

    }
      
    </style>

</head>

<body>

    <?php include "navbar.php";
    include 'connect.php';

    $result = mysqli_query($conn, "SELECT * FROM images WHERE owner_mail='$arch_mail'");

    while ($row = mysqli_fetch_assoc($result)) {

        ?>
        <div class="container">

            <img class="image" src="<?php echo $row['file_name']; ?>" alt="">
            

        </div>

    <?php
    }



    ?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>