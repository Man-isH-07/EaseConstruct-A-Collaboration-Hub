<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Login</title>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-image: url('background.jpg'); /* Replace 'background.jpg' with your image */
        background-size: cover;
        background-position: center;
        height: 100vh;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .container {
        background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        max-width: 400px;
        width: 100%;
    }
    h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    input[type="text"],
    input[type="password"],
    input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    input[type="submit"] {
        background-color: #007bff;
        color: white;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #0056b3;
    }
    .navbar {
        overflow: hidden;
        background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
        padding: 10px 20px;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    .navbar a {
        float: left;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }
    .navbar a:hover {
        background-color: #ddd;
        color: black;
    }
    @media screen and (max-width: 600px) {
        .container {
            width: 80%;
        }
    }
</style>
</head>
<body>

<div class="navbar">
  <a href="#">Home</a>
  <a href="#">About</a>
  <a href="#">Contact</a>
</div>

<div class="container">
    <h2>Login</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="login" value="Login">
    </form>
</div>

<?php
// Backend PHP code for handling login
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate username and password (You may need to replace this with your actual validation logic)
    if($username == 'your_username' && $password == 'your_password') {
        // Redirect to the next page after successful login
        header("Location: welcome.php");
        exit();
    } else {
        echo '<script>alert("Invalid username or password")</script>';
    }
}
?>

</body>
</html>
