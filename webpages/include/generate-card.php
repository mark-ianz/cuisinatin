<?php
  if (!defined('feed-card')) {
    header("Location: ../feed.php");
    exit ();
  }

  include_once ('../connection/config.php');
  
  $authorID = $cuisineRow['author_id'];
  $sql = "SELECT * FROM users WHERE user_id = $authorID";
  $user = $conn->query($sql) or die($conn->error);
  $userRow = $user->fetch_assoc();
?>

<div class="post-container">
  <div class="image-container">
    <a href="./posts.php?id=<?php echo $cuisineRow['cuisine_id'] ?>">
      <img src="../<?php echo $cuisineRow['cuisine_image'] ?>">
    </a>
  </div>
  <div class="description-container">
    <a href="./posts.php?id=<?php echo $cuisineRow['cuisine_id'] ?>">
      <div class="food-info">
        <p class="food-name">
          <?php echo $cuisineRow['cuisine_name'] ?>
        </p>
        <div class="flex-row">
          <div class="rating-container">
            <?php /* GET AVE RATING */
            if ($cuisineRow['total_ratings'] == 0) {
              $aveRating = 0;
            } else {
              $aveRating = ($cuisineRow['total_ratings'] / $cuisineRow['user_rate_count']);
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
            }
            ?>
            <img src="../images/ratings/rating-<?php echo ($aveRating * 10); ?>.png" class="rating">
          </div>
          <p class="counter"><?php echo $cuisineRow['total_ratings'] ?></p>
        </div>
      </div>
    </a>
    <div class="author-info">
      <div class="flex-row">
        <a href="./users.php?id=<?php echo $cuisineRow['author_id'] ?>">
          <img src="../<?php echo $userRow['profile_pic'] ?>" class="author-picture">
        </a>
        <div>
          <a href="./users.php?id=<?php echo $cuisineRow['author_id'] ?>">
            Author: <?php
                    if (isset($userRow['first_name'], $userRow['last_name'])) {
                      echo $userRow['first_name'] . ' ' . $userRow['last_name'];
                    } else {
                      echo "Inavlid name";
                    }
                    ?>
          </a>
          <p>
            Date posted:
            <?php echo date_format(date_create($cuisineRow ['date_posted']) ,'F d, Y') ?>
          </p>
        </div>
      </div>
      <div class="flex-row likes">
        <?php
          $cuisineID = $cuisineRow ['cuisine_id'];
          $sql = "SELECT * FROM `comments` WHERE post_id = '$cuisineID'";
          $comments= $conn->query($sql) or die ($conn->error);
          $commentsRow = $comments->fetch_assoc();
          $commentCount = mysqli_num_rows($comments);
        ?>
        <a href="./posts.php?id=<?php echo $cuisineID ?>" class="counter">
          <?php echo $cuisineRow['likes']?> likes
        </a>
        <a href="./posts.php?id=<?php echo $cuisineID ?>" class="counter">
          <?php echo $commentCount ?> comments
        </a>
      </div>
    </div>
  </div>
</div>