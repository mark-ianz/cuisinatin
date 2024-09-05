<?php
  if (!isset($_SESSION)) {
    session_start();
  };

  include_once('../connection/config.php');
  include_once ('./util/functions.php');
  $conn = connect();

  /* GET POST INFO */
  $id = $_GET['id'];
  $sql = "SELECT * FROM cuisines WHERE cuisine_id = $id";
  $cuisine = $conn->query($sql) or die($conn->error);
  $table = $cuisine->num_rows;
  if ($table == 0) {
    if (isset ($_SESSION ['redirect_url'])) {
      header("Location: ".$_SESSION['redirect_url']);
    } else {
      header("Location: ./feed.php");
    }
  };
  $cuisineRow = $cuisine->fetch_assoc();
  $authorID = $cuisineRow ['author_id'];

  if (isset ($_SESSION ['redirect_url'])) {
    unset($_SESSION ['redirect_url']);
  }

  $_SESSION ['redirect_url'] = $_SERVER ['REQUEST_URI'];

  /* GET AUTHOR INFO */
  $sql2 = "SELECT * FROM users WHERE user_id = $authorID";
  $author = $conn->query($sql2) or die ($conn->error);
  $authorRow = $author->fetch_assoc();

  /* MAKE THE RECIPE AS AN ARRAY */
  $recipesArray = explode('||', $cuisineRow ['recipes']);

  /* MAKE THE PROCEDURE AS AN ARRAY */
  $proceduresArray = explode('||', $cuisineRow ['procedures']);

  /* GET TOTAL COMMENTS ON POST */
  $sql3 = "SELECT * FROM `comments` WHERE post_id = '$id'";
  $comments= $conn->query($sql3) or die ($conn->error);
  $commentsRow = $comments->fetch_assoc();
  $commentCount = mysqli_num_rows($comments);
  
  /* GET RATINGS */
  $sql4 = "SELECT * FROM `ratings` WHERE post_id = '$id'";
  $ratings= $conn->query($sql4) or die ($conn->error);
  $ratingsRow = $ratings->fetch_assoc();
  $ratingsCount = $ratings->num_rows;

  /* GET AVE RATING */
  $sql5 = "SELECT AVG(rating) FROM ratings WHERE post_id = '$id';";

  $query = $conn->query($sql5) or die ($conn->error);
  $aveArr = $query->fetch_assoc();
  $aveRating = $aveArr ['AVG(rating)'];
  
  if ($ratingsCount == 0) {
    $aveRating = 0.1;
  }
  switch ($aveRating) {
    case ($aveRating <= .25):
      $aveRating = 0;
      break;
    case ($aveRating > .25 && $aveRating < .75):
      $aveRating = .5;
      break;
    case ($aveRating > .75 && $aveRating < 1.25):
      $aveRating = 1;
      break;
    case ($aveRating > 1.25 && $aveRating < 1.75):
      $aveRating = 1.5;
      break;
    case ($aveRating > 1.75 && $aveRating < 2.25):
      $aveRating = 2;
      break;
    case ($aveRating > 2.25 && $aveRating < 2.75):
      $aveRating = 2.5;
      break;
    case ($aveRating > 2.75 && $aveRating < 3.25):
      $aveRating = 3;
      break;
    case ($aveRating > 3.25 && $aveRating < 3.75):
      $aveRating = 3.5;
      break;
    case ($aveRating > 3.75 && $aveRating < 4.25):
      $aveRating = 4;
      break;
    case ($aveRating > 4.25 && $aveRating < 4.75):
      $aveRating = 4.5;
      break;
    case ($aveRating > 4.75 && $aveRating < 5.25):
      $aveRating = 5;
      break;
    default:
      $aveRating = 5;
  };
?>

<!-- ADD COMMENT  -->
<?php
  if (isset ($_POST ['submit'])) {
    if (isset ($_SESSION ['user_id'])) {
      $session_id = $_SESSION ['user_id'];
      $comment = addslashes($_POST ['comment']); 
      trim($comment);

      date_default_timezone_set('Asia/Manila');
      // Create a new DateTime object representing the current date and time
      $current_datetime = new DateTime();

      // Get the current time as a formatted string
      $current_time = $current_datetime->format("Y-m-d H:i:s");

      $sql = "INSERT INTO `comments` (`comment_id`, `post_id`, `commenter_id`, `comment`, `date_commented`) 
        VALUES (NULL, '$id', '$session_id', '$comment', '$current_time');";
      $conn->query($sql) or die ($conn->error);
      header("Location: ./posts.php?id=".$id);
    }
  };
?>

<!-- SUBMIT RATING -->
<?php
  if (isset ($_POST ['rating-submit'])) {
    $rating = $_POST ['rating'];
    $userID = $_SESSION ['user_id'];
    $sql = "INSERT INTO `ratings` (`rating_id`, `post_id`, `user_id`, `rating`) 
      VALUES (NULL, '$id', '$userID', '$rating');";

    $conn->query($sql) or die ($conn->error);

    $sql = "UPDATE `cuisines` SET `total_ratings` = total_ratings + '$rating', `user_rate_count` = user_rate_count + '1'
      WHERE `cuisines`.`cuisine_id` = '$id'";
    $conn->query($sql) or die ($conn->error);
    header("Location: ".$_SERVER ['REQUEST_URI']);
  }
?>

<!-- CHECK IF USER ALREADY RATED -->
<?php
  $userID = null;
  if (isset ($_SESSION ['user_id'])) {
    $userID = $_SESSION ['user_id'];
  } else {
    $userID = 0;
  }

  $sql = "SELECT * FROM ratings WHERE user_id = '$userID' AND post_id = '$id'";
  $query = $conn->query($sql) or die ($conn->error);
  $userRated = $query->num_rows;
  $already_rated = false;
  if ($userRated > 0) {
    $already_rated = true;
  }
?>
<!-- SUBMIT LIKE -->

<?php
  if (isset ($_POST ['like-submit'])) {
    $userID = $_SESSION ['user_id'];
    $sql = "INSERT INTO `likes` (`like_id`, `post_id`, `user_id`, `amount`) 
    VALUES (NULL, '$id', '$userID', 1)";

    $conn->query($sql) or die ($conn->error);

    $sql = "UPDATE `users` SET `likes` = likes + 1 WHERE `user_id` = '$authorID'";
    $conn->query($sql) or die ($conn->error);

    header("Location: ".$_SERVER ['REQUEST_URI']);
  }
?>

<?php
  $sql = "SELECT sum(amount) as 'total_likes' FROM likes WHERE post_id = '$id'";
  $query = $conn->query($sql) or die ($conn->error);
  $data = $query->fetch_assoc();
  $post_likes = $data ['total_likes'];
  if (!isset ($post_likes)) {
    $post_likes = 0;
  };
?>

<!-- CHECK IF USER ALREADY LIKED -->
<?php
  $userID = null;
  if (isset ($_SESSION ['user_id'])) {
    $userID = $_SESSION ['user_id'];
  } else {
    $userID = 0;
  }

  $sql = "SELECT * FROM likes WHERE user_id = '$userID' AND post_id = '$id'";
  $query = $conn->query($sql) or die ($conn->error);
  $userRated = $query->num_rows;
  $already_liked = false;
  if ($userRated > 0) {
    $already_liked = true;
  }
?>

<!-- SUBMIT UNLIKE -->
<?php
  if (isset ($_POST ['unlike-submit'])) {
    $userID = $_SESSION ['user_id'];
    $sql = "DELETE FROM likes WHERE `user_id` = $userID";

    $conn->query($sql) or die ($conn->error);

    $sql = "UPDATE `users` SET `likes` = likes - 1 WHERE `users`.`user_id` = '$authorID'";
    $conn->query($sql) or die ($conn->error);

    header("Location: ".$_SERVER ['REQUEST_URI']);
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
  <link rel="shortcut icon" href="../../images/favicon/favicon-white.svg" type="image/x-icon">
  <link rel="stylesheet" href="../styles/nav-bar.css">
  <link rel="stylesheet" href="../styles/general.css">

  <link rel="stylesheet" href="../styles/posts.css">
  <link rel="stylesheet" href="../styles/footer.css">
  <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
  <title>Cuisinatin | Filipino Cuisines</title>
</head>
<body>
  <?php
    define('nav', TRUE);
    include ('./include/nav.php');
  ?>
  <main>
    <div class="main-container">
      <div class="left-container">
        <div class="author-container">
          <a href="./users.php?id=<?php echo $authorID ?>">
            <img src="../<?php echo $authorRow['profile_pic'] ?>" class="author-profile">
          </a>
          <div class="author-name-container">
            <p class="author-name">
              Posted by: 
              <a href="./users.php?id=<?php echo $authorID ?>">
                <b>
                  <?php echo $authorRow ['first_name'].' '.$authorRow ['last_name'];?>
                </b>
              </a>
            </p>
            <p class="date">
              Date posted: <?php echo formatDateTime($cuisineRow ['date_posted'])?>
            </p>
          </div>
        </div>
        <div class="image-container">
          <img src="../<?php echo $cuisineRow ['cuisine_image'] ?>" class="cuisine-image js-cuisine-image">
        </div>
        <div class="bottom-side">
          <div class="bottom-side-left">
            <p class="cuisine-name">
              <?php echo $cuisineRow['cuisine_name'] ?>
            </p>
            <div class="ratings">
              <p>
                <?php echo number_format($aveRating, 1) ?>
              </p>
              <img src="../images/ratings/rating-<?php echo ($aveRating * 10); ?>.png" class="rating-image">
              <p class="user-rated">
                <?php echo $ratingsCount ?> rating(s)
              </p>
            </div>
          </div>
          <div class="bottom-side-right">
            <?php
              if ($already_rated == false) { ?>
              <form class="rating-form" action="./posts.php?id=<?php echo $id ?>" method="post">
                <label for="rating">
                  Rate:
                </label>
                <select name="rating" class="rating-select">
                  <?php generateSelect(5)?>
                  <?php generateSelect(4)?>
                  <?php generateSelect(3)?>
                  <?php generateSelect(2)?>
                  <?php generateSelect(1)?>
                </select>
                <button type="<?php if (!isset ($_SESSION ['user_id'])) {
                    echo "button";
                  } else {
                    echo "submit";
                  }?>" name="rating-submit" class="submit-rating 
                  <?php if (!isset ($_SESSION ['user_id'])) {
                    echo "js-displayModal";
                  }?>">Submit
                </button>
              </form>
            <?php } else { ?>
              <p class="user-rate">
                <?php echo $ratingsRow ['rating'] ?>/5 stars
              </p>
            <?php } ?>
            <?php
              if (!$already_liked) {
            ?>
              <form class="like-form" action="./posts.php?id=<?php echo $id ?>" method="post">
                <button type="<?php if (!isset ($_SESSION ['user_id'])) {
                  echo "button";
                  } else {
                    echo "submit";
                  }?>" name="like-submit" class="like-button 
                    <?php if (!isset ($_SESSION ['user_id'])) {
                      echo "js-displayModal";
                    }?>">
                    <img src="../images/heart-regular.svg" class="like" >
                </button>
                <?php echo $post_likes ?>
              </form>
            <?php } else { ?>
              <form class="like-form" action="./posts.php?id=<?php echo $id ?>" method="post">
                <button type="<?php if (!isset ($_SESSION ['user_id'])) {
                  echo "button";
                  } else {
                    echo "submit";
                  }?>" name="unlike-submit" class="like-button 
                    <?php if (!isset ($_SESSION ['user_id'])) {
                      echo "js-displayModal";
                    }?>">
                    <img src="../images/heart-solid.svg" class="like" >
                </button>
                <?php echo $post_likes ?>
              </form>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="right-container">
        <div class="cuisine-desc-container">
          <p class="desc-name">
            <?php echo $cuisineRow['cuisine_name'] ?>
          </p>
          <p>
            <?php echo $cuisineRow['cuisine_description'] ?>
          </p>
        </div>
        <div class="recipe-procedure-container">
          <div class="desc-container">
            <p class="desc-name">
              Recipes
            </p>
            <ul class="recipe-list">
              <?php
                foreach ($recipesArray as $recipe) { ?>
                <li><?php echo $recipe ?></li>
              <?php } ?>
            </ul>
          </div>
          <div class="desc-container">
            <p class="desc-name">
              Procedures
            </p>
            <ol class="recipe-list">
              <?php
                foreach ($proceduresArray as $procedure) { ?>
                <li><?php echo $procedure ?></li>
              <?php } ?>
            </ol>
          </div>
        </div>
        <div class="comment-button-container">
          <div class="comment-container">
            <div class="comment-stats">
              <p class="total-comment js-total-comment">
                <?php echo $commentCount ?> comments
            </div>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="add-comment js-add-comment">
              <?php if (isset ($_SESSION ['user_id'])) {?>
                <a href="./users.php?id=<?php echo $_SESSION ['user_id'] ?>">
                  <img src="../<?php echo $_SESSION ['profile_pic'] ?>" class="author-profile">
                </a>
              <?php } else { ?>
                <a href="./login.php">
                  <img src="../images/author-profile/default.webp" class="author-profile">
                </a>
              <?php } ?>
              <input type="text" name="comment" class="add-comment-input js-comment-input" placeholder="Write a comment...">
              <button class="add-comment-button js-add-comment" type="submit" name="submit">
                <img src="../images/paper-plane-regular.svg">
              </button>
            </form>
            <p class="error-message js-error-message"></p>
          </div>
        </div>
      </div>
      <a href="./feed.php">
        <div class="close-button js-history-back">
          X
        </div>
      </a>
    </div>
    <div class="comment-modal-bg">
      <div class="modal-container comment-modal-container">
        <div class="title">
          Comments
        </div>
        <?php if ($commentCount > 0) { do {?>
          <?php
            /* GET USER INFO FROM THE COMMENTER */
            $commenterID = $commentsRow ['commenter_id'];
            $sql = "SELECT * FROM users WHERE user_id = '$commenterID'";
            $user = $conn->query($sql) or die ($conn->error);
            $userRow = $user->fetch_assoc();
            if ($user->num_rows <= 0) {
              $deletedUser = true;
            }
          ?>
          <div class="card">
            <?php if (!$deletedUser) { ?>
              <a href="./users.php?id=<?php echo $userRow['user_id'] ?>">
                <img src="../<?php echo $userRow['profile_pic'] ?>" alt="User Profile Picture" class="author-profile">
              </a>
            <?php } else { ?>
              <img src="../images/author-profile/default.webp" alt="User Profile Picture" class="author-profile">
            <?php } ?>
            <div class="comment-info">
              <div>
                <?php if (!$deletedUser) { ?>
                  <a href="./users.php?id=<?php echo $userRow['user_id'] ?>" class="commenter-name">
                    <?php echo $userRow ['first_name'].' '.$userRow ['last_name'] ?>
                  </a>
                <?php } else { ?>
                  <p class="commenter-name">
                    Deleted User
                  </p>
                <?php } ?>
                <p class="date-commented">
                  <?php echo formatDateTime($commentsRow['date_commented'])?>
                </p>
              </div>
              <p class="comment">
                <?php
                  echo filter_var($commentsRow ['comment'],FILTER_SANITIZE_SPECIAL_CHARS);
                ?>
              </p>
            </div>
          </div>
        <?php } while ($commentsRow = $comments->fetch_assoc())?>
        <?php } else { ?>
          <p>No comments :&#40</p>
        <?php } ?>
        <div class="close-button js-comment-cb">
          <p>x</p>
        </div>
      </div>
    </div>
    <div class="modal-bg">
      <div class="modal-container">
        <p class="title">
          Join the Cuisinatin community
        </p>
        <p>
          Oops! It looks like you need to log in to access this feature. Please log in or create an account to continue exploring all the amazing features we have to offer.
        </p>
        <div class="option">
          <a href="./login.php">
            <button>
              LOGIN
            </button>
          </a>
          <a href="./signup.php">
            <button>
              SIGNUP
            </button>
          </a>
        </div>        
        <a href="<?php echo $_SERVER ['REQUEST_URI'] ?>" class="comment-close-button">
          <p>x</p>
        </a>
      </div>
    </div>
    <div class="cuisine-image-modal-bg js-cuisine-image-modal-bg">
      <div class="image-modal-container ">
        <img src="../<?php echo $cuisineRow ['cuisine_image'] ?>" class="zoom-cuisine-image">
        <div class="close-button image-close-button js-image-cb">
          <p>x</p>
        </div>
      </div>
    </div>
  </main>
</body>
<script src="../scripts/sub-pages/posts.js"></script>
</html>

<?php
  if (isset ($_POST ['submit'])) {
    if (!isset ($_SESSION ['user_id'])) {
      $_SESSION ['redirect_url'] = $_SERVER ['REQUEST_URI'];
      echo '<script>displayModal();</script>';
    }
  };
?>
