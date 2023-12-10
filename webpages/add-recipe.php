<?php
	if (!isset($_SESSION)) {
		session_start();
	};

	include_once('../connection/config.php');
  $conn = connect();

  if (isset ($_SESSION ['redirect_url'])) {
    unset ($_SESSION ['redirect_url']);
  }
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
    <form class="main-container" method="post" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
      <div class="input-container">
        <label for="cuisine-name" class="container-title">
          Cuisine Name
        </label>
        <input type="text" 
          <?php
            if (isset ($_POST ['cuisine-name'])) {
              echo "value=".$_POST ['cuisine-name'];
            }
          ?>
        name="cuisine-name" placeholder="Input cusine name" class="recipe-name-input" required>
      </div>
      <div class="input-container">
        <label for="recipe-desc" class="container-title">
          Cuisine description
        </label>
        <textarea class="recipe-desc-input"
            <?php
              if (isset($_POST['recipe-desc'])) {
                echo "value=".$_POST['recipe-desc'];
              }
            ?>
        name="recipe-desc" rows="3" placeholder="Input cuisine description" required></textarea>
      </div>
      <div class="add-recipe-container">
        <label for="recipe-input" class="container-title">
          Add a recipe
        </label>
        <div class="add-recipe-input-container">
          <input type="text" name="recipe-input" class="add-recipe-input" placeholder="Input recipe">
          <input type="button" value="Add" class="add-recipe">
        </div>
        <ul class="recipe-list"></div>
      <div class="add-procedure-container">
        <label for="procedure-input" class="container-title">
          Add Procedure
        </label>
        <div class="add-procedure-input-container">
          <input type="text" name="procedure-input" class="add-procedure-input" placeholder="Input procedure ">
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
          <input type="radio" name="cuisine-type" value="Filipino Main Dishes" required>
        </div>
        <div class="selection-type-container">
          <label for="soups-and-stews">
            Filipino Soups and Stews
          </label>
          <input type="radio" name="cuisine-type" value="Filipino Soups and Stews" >
        </div>
        <div class="selection-type-container">
          <label for="desserts">
            Filipino Desserts
          </label>
          <input type="radio" name="cuisine-type" value="Filipino Desserts" >
        </div>
      </div>
      <div class="input-photo-submit">
        <div class="submit-photo-container">
          <p>
            Select a photo of the cuisine
          </p>
          <input type="file" name="cuisine-image" required>
        </div>
        <div class="js-error-message"></div>
        <div class="submit-container">
          <a href="./feed.php">
            <input type="button" value="Go to feed" class="submit-button">
          </a>
          <input type="submit" name="submit" value="Submit" class="submit-button">
        </div>
      </div>
    </form>
  </main>
  <script src="../scripts/nav-bar.js"></script>
  <script src="../scripts/sub-pages/add-recipe.js"></script>
</body>
</html>
<?php
  $conn = connect();
  if (isset($_POST['submit'])) {
    if (isset ($_SESSION ['user_id'])) {
      /* REQUIRED TO PUT AT LEAST 3 OR MORE RECIPES OR PROCEDURE */
      function countRecipeProcedure () {
        global $error;
        if (!(isset ($_POST ['recipe']) && count(($_POST ['recipe'])) > 3 )) {
          echo "<script>displayError (\"Input more than (3) recipes.\")</script>";
          $error = true;
        };
  
        if (!(isset ($_POST ['procedure']) && count(($_POST ['procedure'])) > 3 )) {
          echo "<script>displayError (\"Input more than (3) procedures.\")</script>";
          $error = true;
        };

        if ($error) {
          return false;
        } else {
          return true;
        }
      }
      if (countRecipeProcedure() == false) {
        return;
      }

      /* WILL PROCESS THE SUBMISSION */
      $userID = $_SESSION ['user_id'];
      $cuisine_name = $_POST ['cuisine-name'];
      $description = $_POST ['recipe-desc'];
      $cuisine_type = $_POST ['cuisine-type'];

      $file = $_FILES ['cuisine-image'];
      $file_name = $file['name'];
      $tmp_name = $file ['tmp_name'];
      
      $file_name_seperator = explode('.', $file_name);
      $extension = end($file_name_seperator);
      $allowed_extension = ['jpeg', 'jpg', 'png'];

      $recipes = implode(',', $_POST ['recipe']);
      $procedures = implode(',', $_POST ['procedure']);

      if (in_array($extension, $allowed_extension)) {
        $image_name = "CUISINE_IMG_".strtoupper(uniqid()).'.'.$extension;
        $upload_image = "images/cuisines/".$image_name;
        $folder_upload = "../".$upload_image;
        move_uploaded_file($tmp_name, $folder_upload);

        $sql = "INSERT INTO `cuisines` (`cuisine_id`, `author_id`, `cuisine_name`, `cuisine_description`, `recipes`, `procedures`, `cuisine_type`, `cuisine_image`, `likes`, `total_ratings`, `user_rate_count`, `date_posted`) 
          VALUES (NULL, '$userID', '$cuisine_name', '$description', '$recipes', '$procedures', '$cuisine_type', '$upload_image', '0', '0', '0', current_timestamp())";
        $conn->query($sql) or die ($conn->error);
        echo "<script>location.href = \"./feed.php\"</script>";
      } else {
        echo "<script>displayError (\"Only PNG/JPG/JPEG files are allowed.\")</script>";
        return;
      }
    } else {
      $_SESSION ['redirect_url'] = $_SERVER ['REQUEST_URI'];
      echo '<script>displayModal();</script>';
    }
  }
?>