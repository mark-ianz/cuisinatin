<?php
  if (!isset($_SESSION)) {
    session_start();
	};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="https://cuisinatin.netlify.app/images/favicon/favicon-black.svg"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./images/favicon/favicon-white.svg" type="image/x-icon">
    <link rel="stylesheet" href="./styles/nav-bar.css">
    <link rel="stylesheet" href="./styles/general.css">
    <title>Cuisinatin | Filipino Cuisines</title>
    
    <link rel="stylesheet" href="./styles/home.css"> <!-- STYLE FOR FEED LAYOUT -->
</head>
<body>
  <?php
    define('nav', TRUE);
    include ('./webpages/include/nav.php');
  ?>
  <main>
      <div class="main-container">
          <div class="text-container">
              <div class="title-text-container">
                  <!-- <img src="./images/logo/logo-white.svg" class="home-logo"> -->
                  <h1>
                      FILIPINO
                  </h1>
                  <h1 class="food-menu">FOOD MENU</h1>
              </div>
              <div class="sub-text-container">
                  <p class="sub-text">
                      Welcome to Cuisinatin, where the heart and soul of Filipino cuisine come alive. Our platform is a vibrant celebration of Filipino culinary traditions, a place where food enthusiasts from around the world come together to share their love for all things Filipino.
                  </p>
              </div>
          </div>
          <a href="./webpages/feed.php">
            <button class="explore-button">
              <p class="border">
                Explore your appetite now!
              </p>
            </button>
          </a>
      </div>
  </main>
</body>
</html>