<?php
	if (!isset($_SESSION)) {
		session_start();
	};

	include_once('../connection/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta property="og:image" content="https://cuisinatin.netlify.app/images/favicon/favicon-black.svg" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="../images/favicon/favicon-white.svg" type="image/x-icon">
  <link rel="stylesheet" href="../styles/nav-bar.css">
  <link rel="stylesheet" href="../styles/general.css">

  <link rel="stylesheet" href="../styles/add-recipe.css">
  <title>Cuisinatin | Filipino Cuisines</title>
</head>

<body>
  <?php
		define('nav', TRUE);
		include ('./include/nav.php');
	?>
  <main>
    <h1>
      Add your own Recipe!
    </h1>
    <form class="main-container" action="./feed.html">
      <div class="input-container">
        <label for="recipe-name" class="container-title">
          Add Recipe Name
        </label>
        <input type="text" name="recipe-name" placeholder="Cuisine name" class="recipe-name-input" required>
      </div>
      <div class="input-container">
        <label for="recipe-desc" class="container-title">
          Add description
        </label>
        <textarea class="recipe-desc-input" name="recipe-desc" rows="3" placeholder="Cuisine description" required></textarea>
      </div>
      <div class="add-recipe-container">
        <label for="recipe-input" class="container-title">
          Add a recipe
        </label>
        <div class="add-recipe-input-container">
          <input type="text" name="recipe-input" class="add-recipe-input" placeholder="Input recipe">
          <input type="button" value="Add" class="add-recipe">
        </div>
        <ul class="recipe-list"></ul>
      </div>
      <div class="add-procedure-container">
        <label for="procedure-input" class="container-title">
          Add Procedure
        </label>
        <div class="add-procedure-input-container">
          <input type="text" name="procedure-input" class="add-procedure-input" placeholder="Add a Procedure ">
          <input type="button" value="Add" class="add-procedure">
        </div>
        <ol class="procedure-list"></ol>
      </div>
      <div class="type-of-recipe">
        <p class="container-title">
          Type of Recipe
        </p>
        <div class="selection-type-container">
          <label for="main-dishes">
            Filipino Main Dishes
          </label>
          <input type="radio" name="dish-type" value="main-dishes" required>
        </div>
        <div class="selection-type-container">
          <label for="soups-and-stews">
            Filipino Soups and Stews
          </label>
          <input type="radio" name="dish-type" value="soups-and-stews" required>
        </div>
        <div class="selection-type-container">
          <label for="desserts">
            Filipino Desserts
          </label>
          <input type="radio" name="dish-type" value="desserts" required>
        </div>
      </div>
      <div class="input-photo-submit">
        <div class="submit-photo-container">
          <p>
            Select a photo of the cuisine
          </p>
          <input type="file" name="" accept="image/*" required>
        </div>
        <div class="submit-container">
          <a href="./feed.html">
            <input type="button" value="Go to feed" class="submit-button">
          </a>
          <input type="submit" value="Submit" class="submit-button">
        </div>
      </div>
    </form>
  </main>
  <script src="../scripts/nav-bar.js"></script>
</body>
</html>