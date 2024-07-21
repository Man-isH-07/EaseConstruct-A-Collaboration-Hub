<?php
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    

    <title>Navbar</title>

    <style>
        

        nav {
            width: 100vw;
            height: 10vh;
            display: flex;
            background-color: rgb(255, 201, 201);
            color: black;
            display: flex;
           
            align-items: center;
            border: none;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .navb-logo a {
            width: 40vw;
            text-decoration: none;
            font-size: xx-large;
            font-weight: bolder;
            color: black;
        }

        .tags {
            width: 60vw;
            display: flex;
            justify-content: space-evenly;
            list-style: none;
            gap: 10%;
        }

        .tags a {
            display: flex;
            color: black;
            align-items: center;
            text-decoration: none;
           
            font-size: larger;
            font-weight: 600;
        }

        .tags a:hover {

            font-weight: 700;
            transition: all 0.2s ease;

        }

        .profile-pic {
            width: 30px;
            /* Adjust size as needed */
            height: 30px;
            /* Adjust size as needed */
            border-radius: 50%;
            /* To make it circular */
            margin-right: 10px;
            /* Space between picture and name */
        }

        .user-info span {
            vertical-align: middle;
            /* Align text vertically with image */
        }
    </style>
</head>

<body>
   
<?php include "our_ref_nav.php"; ?>
    <nav>

        <div class="container-fluid" style="display: flex; justify-content:space-between;">

            <div class="navb-logo">
                <a href="#">EaseConstruct</a>
            </div>
            <div class="tags">
                <a href="customer_page.php">Home</a>
                <a href="">Services</a>
                <a href="logout.php">LOGOUT</a>   
                <a href="" style="cursor:no-drop;"><?php echo "$_SESSION[cus_mail]" ?></a>     

            </div>

        </div>
    </nav>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>