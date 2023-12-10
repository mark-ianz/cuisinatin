<?php
  if (!isset ($_SESSION)) {
    session_start();
  }

  include_once ('../connection/config.php');
  $conn = connect();

  $id = $_GET ['id'];

  $sql = "SELECT * FROM `users` WHERE user_id = '$id'";
  $user = $conn->query($sql) or die ($conn->error);
  $table = $user->num_rows;
  if ($table == 0) {
    if (isset ($_SESSION ['redirect_url'])) {
      header("Location: ".$_SESSION['redirect_url']);
    } else {
      header("Location: ./feed.php");
    }
  }
  $row = $user->fetch_assoc();
?>

<?php
  $sql = "SELECT * FROM cuisines WHERE author_id = '$id'";
  $cuisines = $conn->query($sql) or die($conn->error);
  $cuisineRow = $cuisines->fetch_assoc();
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
  <link rel="stylesheet" href="../styles/users.css">
	<title>Cuisinatin | Filipino Cuisines</title>
</head>
<body>
  <?php
    define('nav', TRUE);
    include ('./include/nav.php');
  ?>
  <main>
    <div class="main-container js-main-container">
      <div class="mc-left">
        <div class="mc-left-top">
          <img src="../<?php echo $row ['profile_pic'] ?>" class="author-profile">
        </div>
        <div class="mc-left-bottom js-mc-left-bottom">
          <p class="headline">
            <?php echo $row ['first_name'].' '.$row ['last_name'] ?>
          </p>
          <?php if (isset ($_SESSION ['user_id']) && $_SESSION ['user_id'] == $id) { ?>
            <a href="./edit-users.php?id=<?php echo $id ?>" target="_blank">
              <div class="edit-container">
                <p class="cont-info">
                  Edit your profile
                </p>
                <img src="../images/edit.svg">
              </div>
            </a>
          <?php } ?> 
          <div class="user-info">
            <div class="info-cont">
              <p class="cont-title">Likes</p>
              <p class="cont-info"><?php echo $row ['likes'] ?></p>
            </div>
            <div class="info-cont">
              <p class="cont-title">Gender</p>
              <?php if ($row ['gender'] != null) { ?>
                <p class="cont-info">
                  <?php
                  echo $row ['gender'];
                  ?>
                </p>
              <?php } else if (isset ($_SESSION ['user_id']) && $_SESSION ['user_id'] == $id) { ?>
                <a href="./edit-users.php?id=<?php echo $id ?>" target="_blank">
                  <div class="edit-container">
                    <p class="cont-info">
                      Not set
                    </p>
                    <img src="../images/edit.svg">
                  </div>
                </a>
              <?php } else {?>
                <p class="cont-info">
                  Not set
                </p>
              <?php } ?>
            </div>
            <div class="info-cont">
              <p class="cont-title">Birthdate</p>
              <?php if ($row ['birthdate'] != null) { ?>
                <p class="cont-info">
                  <?php
                    echo date_format(date_create($row ['birthdate']), 'F d, Y');
                  ?>
                </p>
              <?php } else if (isset ($_SESSION ['user_id']) && $_SESSION ['user_id'] == $id) { ?>
                <a href="./edit-users.php?id=<?php echo $id ?>" target="_blank">
                  <div class="edit-container">
                    <p class="cont-info">
                      Not set
                    </p>
                    <img src="../images/edit.svg">
                  </div>
                </a>
              <?php } else {?>
                <p class="cont-info">
                  Not set
                </p>
              <?php } ?>
            </div>
            <div class="info-cont location">
              <img src="../images//location.svg" class="location-logo">
                <!--  -->
                  <?php if ($row ['province'] != null) { ?>
                    <p class="title">From <span class="bold">
                      <?php
                        echo $row ['province'];
                      ?>, Philippines </span>
                    </p>
                  <?php } else if (isset ($_SESSION ['user_id']) && $_SESSION ['user_id'] == $id) { ?>
                    <a href="./edit-users.php?id=<?php echo $id ?>" target="_blank">
                      <div class="edit-container">
                        <p class="cont-info">
                          Not set
                        </p>
                        <img src="../images/edit.svg">
                      </div>
                    </a>
                  <?php } else {?>
                    <p class="cont-info">
                      Not set
                    </p>
                  <?php } ?>
                <!--  -->
              </p>
            </div>
          </div>
          <p class="gray">Joined on <?php echo date_format(date_create($row ['date_joined']), 'F d, Y') ?></p>
        </div>
      </div>
      <div class="mc-right">
        <p class="headline white">
          <?php echo $row ['first_name'].' '.$row['last_name'] ?>'s Profile
        </p>
        <div class="about-cont js-about-cont">
          <p class="sub-title">
            About Me
          </p>
          <?php if ($row ['about'] != null) { ?>
            <p class="about">
              <?php echo $row ['about'];?>
            </p>
          <?php } else if (isset ($_SESSION ['user_id']) && $_SESSION ['user_id'] == $id) { ?>
            <a href="./edit-users.php?id=<?php echo $id ?>" target="_blank">
              <div class="edit-container">
                <p class="cont-info">
                  Not set
                </p>
                <img src="../images/edit.svg">
              </div>
            </a>
          <?php } else {?>
            <p class="cont-info">
              Not set
            </p>
          <?php } ?>
          </p>
        </div>
        <div class="view-post-cont">
          <p class="sub-title orange js-post-text">
            View Posts
          </p>
          <img src="../images/arrow-down.svg" class="arrow arrow-down js-show-posts">
          <img src="../images/arrow-up.svg" class="arrow arrow-up js-hide-posts">
        </div>
        <div class="view-content js-view-content">
          <button class="scroll-button scroll-left js-scroll-left" type="button">
            <img src="../images/arrow-left.svg" class="scroll-image">
          </button>
          <div class="card-container js-card-container">
            <?php do { ?>
              <div class="card js-card">
                <div class="image-container">
                  <a href="./posts.php?id=<?php echo $cuisineRow['cuisine_id'] ?>">
                    <img src="../<?php echo $cuisineRow['cuisine_image'] ?>">
                  </a>
                </div>
                <div class="description-container">
                  <a href="./posts.php?id=<?php echo $cuisineRow['cuisine_id'] ?>">
                    <div class="food-info">
                      <div class="flex-column no-gap">
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
                      <div class="flex-column likes gap-10">
                        <?php
                          $cuisineID = $cuisineRow ['cuisine_id'];
                          $sql = "SELECT * FROM `comments` WHERE post_id = '$cuisineID'";
                          $comments= $conn->query($sql) or die ($conn->error);
                          $commentsRow = $comments->fetch_assoc();
                          $commentCount = mysqli_num_rows($comments);
                        ?>
                        <p class="counter">
                          <?php echo $cuisineRow['likes']?> <img src="../images/heart-regular.svg" class="px-15 counter-img">
                        </p>
                        <p class="counter">
                          <?php echo $commentCount ?> <img src="../images/comment-regular.svg" class="px-15 counter-img">
                        </p>
                      </div>
                    </div>
                  </a>
                  <div class="author-info">
                    <p>
                      Posted on:
                      <?php echo date_format(date_create($cuisineRow ['date_posted']) ,'F d, Y') ?>
                    </p>
                  </div>
                </div>
              </div>
            <?php } while ($cuisineRow = $cuisines->fetch_assoc()) ?>
          </div>
          <button class="scroll-button scroll-right js-scroll-right" type="button">
            <img src="../images/arrow-right.svg" class="scroll-image">
          </button>
        </div>
        
      </div>
      <a href="<?php if (isset ($_SESSION ['redirect_url'])) {
        echo $_SESSION ['redirect_url'];} else {
          echo "./feed.php";
        }; ?>" class="close-button">
        <p class="white">x</p>
      </a>
    </div>
  </main>
  <script src="../scripts//sub-pages/users.js"></script>
</body>
</html>