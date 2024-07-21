<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EaseConstruct</title>
  <link rel="stylesheet" href="style.css">
  <!-- Google Fonts Links For Icon -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
</head>

<body>
  

  <header>
    <nav class="navbar">
      <a class="logo" href="index.php">EaseConstruct<span>.</span></a>
      <ul class="menu-links">
        <span id="close-menu-btn" class="material-symbols-outlined">close</span>
        <li><a href="#">Home</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">About us</a></li>
        <li><a href="#">Contact us</a></li>
      </ul>
      <span id="hamburger-btn" class="material-symbols-outlined">menu</span>
    </nav>
  </header>

  <section class="hero-section">
    <div class="content">
      <h2>Design Your Home With EaseConstruct.</h2>
      <p style="  font-weight:500;">Welcome to our EaseConstruct. , Discover the art of interior design and construction excellence. Let us bring your dream space to life with our expert craftsmanship. Explore our services and embark on a journey to transform your surroundings today!</p>
      <a href="customer_login.php"><button><b>As Customer</b></button></a>
      <a href="arch_login.php"><button><b>As Architecture</b></button></a>

    </div>
  </section>

  <script>
    const header = document.querySelector("header");
    const hamburgerBtn = document.querySelector("#hamburger-btn");
    const closeMenuBtn = document.querySelector("#close-menu-btn");

    // Toggle mobile menu on hamburger button click
    hamburgerBtn.addEventListener("click", () => header.classList.toggle("show-mobile-menu"));

    // Close mobile menu on close button click
    closeMenuBtn.addEventListener("click", () => hamburgerBtn.click());
  </script>

</body>

</html>