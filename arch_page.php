<?php
session_start();
include 'connect.php';
$sql = "Select * from registered_architecture";
$result = mysqli_query($conn, $sql);

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: arch_login.php");
  exit;
}


$showAlert = false;
$showError = false;

if (isset($_POST["submit"])) {


  $name = $_POST["name"];
  $des = $_POST["des"];
  $mail = $_SESSION["arch_mail"];
  $amt = $_POST["amt"];

  #To Upload Catelogue

  $catelogue = rand(1000, 10000) . "-" . $_FILES["file"]["name"];


  $tname = $_FILES["file"]["tmp_name"];  #temporary file name to store file


  $uploads_dir = 'C:\xampp\htdocs\EasyConstruct\Architecture_catelogue';   #upload directory path


  move_uploaded_file($tname, $uploads_dir . '/' . $catelogue);   #TO move the uploaded file to specific location


  # ________________________________*****__________________________________


  #To Upload Thumbnail

  $thumbnail = rand(1000, 10000) . "-" . $_FILES["file2"]["name"];


  $tname = $_FILES["file2"]["tmp_name"];   #temporary file name to store file


  $uploads_dir = 'C:\xampp\htdocs\EasyConstruct\Architecture_thumbnail'; #upload directory path


  move_uploaded_file($tname, $uploads_dir . '/' . $thumbnail); #TO move the uploaded file to specific location


  $sql = "INSERT INTO `catalogue`(`cat_mail`, `cat_name`, `cat_desc`, `cat_amt`, `cat_copy`, `cat_thumb`) VALUES ('$mail','$name','$des','$amt','$catelogue','$thumbnail')";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    echo "<script>alert('Catelogue Uploaded Successfully.')</script>";
    ?>
    <META http-equiv="refresh" content="0; URL=http://localhost/EasyConstruct/arch_page.php">
    <?php
  } else {
    $showError = "Passwords do not match";
  }

}




$statusMsg = '';

if (isset($_POST['submit1'])) {
  // File upload configuration
  
$mail = $_SESSION['arch_mail'];

  $targetDir = "Architecture_PastWork/";
  $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

  $images_arr = array();
  foreach ($_FILES['images']['name'] as $key => $val) {
    $image_name = $_FILES['images']['name'][$key];
    $tmp_name = $_FILES['images']['tmp_name'][$key];
    $size = $_FILES['images']['size'][$key];
    $type = $_FILES['images']['type'][$key];
    $error = $_FILES['images']['error'][$key];

    // File upload path
    $fileName = basename($_FILES['images']['name'][$key]);
    $targetFilePath = $targetDir . $fileName;

    // Check whether file type is valid
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    if (in_array($fileType, $allowTypes)) {
      // Store images on the server
      if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $targetFilePath)) {
        $images_arr[] = $targetFilePath;

        $sql = "INSERT into images (file_name,owner_mail,uploaded_on) VALUES ('" . $targetFilePath . "','$mail', NOW())";
        $insert = mysqli_query($conn, $sql);
        if ($insert) {
          $count = $key + 1;
          $statusMsg = " " . $count . " image file has been uploaded successfully.";
        } else {
          $statusMsg = "Failed to upload image";
        }

      } else {
        $statusMsg = "Sorry, there was an error uploading your file.";
      }
    } else {
      $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
    }
  }
  header("location: arch_page.php");
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
    body {
      background: url("img.png");
      background-size: cover;
    }

    .status__msg {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 2%;
      padding: 5px;
      border-radius: 10px;
      background-color: yellow;
      color: black;
      font-weight: bold;
    }
    .status__msg p{
      display: flex;
      justify-content: center;
      align-items: center;

    }

    #btnRefresh
    {
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 10px;
      background-color: lightgreen;
      color: black;
      font-weight: bold;
      height: fit-content;
    }

    .main {
      display: flex;
      justify-content: space-evenly;
      margin: 20px;
    }

    .upload_cats {
      width: 40vw;
      height: fit-content;
      border: 1px solid black;
      border-radius: 10px;
      padding: 15px;
      backdrop-filter: blur(12px);
    }

    .upload_cats label {
      color: black;
      font-weight: 500;
      font-size: large;
      margin-top: 10px;
      margin-bottom: 10px;
    }

    .upload_cats input {
      width: 20vw;
      height: fit-content;
      border: 1px solid black;
      border-radius: 10px;
      color: black;
      font-weight: bold;
      font-size: large;
      margin-bottom: 10px;
    }

    .upload_imgs {
      width: 30vw;
      height: fit-content;
      border: 1px solid black;
      border-radius: 10px;
      padding: 20px;
      backdrop-filter: blur(8px);
    }

    .upload_imgs label {
      color: black;
      font-weight: 500;
      font-size: large;
      margin-top: 10px;
      margin-bottom: 10px;
    }

    .upload_imgs input {
      width: 20vw;
      height: fit-content;
      border: 1px solid black;
      border-radius: 10px;
      color: black;
      font-weight: bold;
      font-size: large;
      margin-bottom: 10px;
    }

    .main h4 {
      font-weight: 800;
      font-size: larger;
    }

    .reset_login #btn {
      width: 10vw;
      border-radius: 10px;
      padding: 5px;
      margin-top: 10px;
      margin-bottom: 10px;
      background-color: green;
      color: white;
      font-weight: bolder;
      cursor: pointer;

    }
  </style>

</head>

<body>

  <?php include "navbar_arch.php"; ?>

  <?php if (!empty($statusMsg)) { ?>
    <center class="status__msg">
      <p ><?php echo $statusMsg; ?></p>
      <button id="btnRefresh" type="button">Refresh page</button>
    </center>
  <?php } ?>



  <center>
    <div class="main">
      <section class="upload_cats">
        <h4>Upload Your Catelogue</h4>
        <hr>
        <img src="catalogue.png" alt="" height="45%" width="45%">
        <hr>

        <form action="arch_page.php" method="post" enctype="multipart/form-data">



          <div class="form-group">
            <label for="mail"><b>Email ID :</b></label>
            <input type="text" value="<?php echo "$_SESSION[arch_mail]"; ?>" class="form-control" id="mail" name="mail"
              aria-describedby="emailHelp" style="cursor:no-drop;" disabled>
          </div>

          <div class="form-group">
            <label for="name"><b>Catalogue Name :</b></label>
            <input type="text" class="form-control" id="name" name="name">
          </div>

          <div class="form-group">
            <label for="des"><b>Description :</b></label>
            <textarea name="des" class="form-control" id="" cols="" rows="5"></textarea>
          </div>

          <div class="form-group">
            <label for="amt"><b>Range Of Amount :</b></label>
            <input type="text" class="form-control" id="" name="amt">
          </div>

          <div class="form-group">
            <label for="file"><b>Upload Catelogue : </b></label>
            <input type="file" class="form-control" accept="application/pdf,application/pptx,application/docx" id="file"
              name="file" style="border: none; ">
          </div>

          <div class="form-group">
            <label for="file2"><b>Upload Thumbnail : </b></label>
            <input type="file" class="form-control" id="file" name="file2" style="border: none; ">
          </div>

          <hr>

          <div class="reset_login">
            <button type="submit" value="" id="btn" name="submit">Submit</button>
          </div>
        </form>


      </section>

      <section class="upload_imgs">
        <h4>Upload Your Past Work</h4>
        <hr>
        <img src="image.png" alt="" height="45%" width="45%">
        <hr>

        <div class="form__field">

          <form action="arch_page.php" method="post" enctype="multipart/form-data">
            <input type="file" name="images[]" class="form__field__img" multiple>

            <hr>

            <div class="reset_login">
              <button type="submit" value="" id="btn" name="submit1">Submit</button>
            </div>
          </form>
        </div>

      </section>
    </div>
  </center>







  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
  const refreshBtn = document.getElementById("btnRefresh");

function handleClick() {
  window.location.reload();
}

refreshBtn.addEventListener("click", handleClick);
</script>
</body>

</html>