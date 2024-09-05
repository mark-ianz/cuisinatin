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


<?php
  /* GET RATINGS */
  $post_id = $cuisineRow['cuisine_id'];
  $sql = "SELECT * FROM `ratings` WHERE post_id = '$post_id'";
  $ratings= $conn->query($sql) or die ($conn->error);
  $ratingsRow = $ratings->fetch_assoc();

  $totalRater = $ratings->num_rows;
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
            <?php
              /* GET AVE RATING */
              $sql5 = "SELECT AVG(rating)
              FROM ratings WHERE post_id = '$post_id';";

              $query = $conn->query($sql5) or die ($conn->error);
              $aveArr = $query->fetch_assoc();
              $aveRating = $aveArr ['AVG(rating)'];
              
              if ($totalRater == 0) {
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
            <img src="../images/ratings/rating-<?php echo ($aveRating * 10); ?>.png" class="rating">
          </div>
          <p class="counter"><?php echo $totalRater ?></p>
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
        <?php
          /* GET LIKES */
          $cuisineID = $cuisineRow ['cuisine_id'];
          $sql = "SELECT sum(amount) as 'total_likes' FROM likes WHERE post_id = '$cuisineID'";
          $query = $conn->query($sql) or die ($conn->error);
          $data = $query->fetch_assoc();
          $post_likes = $data ['total_likes'];
          if (!isset ($post_likes)) {
            $post_likes = 0;
          };
        ?>
        <a href="./posts.php?id=<?php echo $cuisineID ?>" class="counter">
          <?php echo $post_likes?> likes
        </a>
        <a href="./posts.php?id=<?php echo $cuisineID ?>" class="counter">
          <?php echo $commentCount ?> comments
        </a>
      </div>
    </div>
  </div>
</div>
