<?php
if (!isset($_SESSION)) {
	session_start();
};

include_once('../connection/config.php');

$conn = connect();
$sort = $_GET ['sort'];

switch ($sort) {
  case 'best':
    $sql = "SELECT * FROM cuisines ORDER BY likes + total_ratings DESC";
    break;
  case 'likes':
    $sql = "SELECT * FROM cuisines ORDER BY likes DESC";
    break;
  case 'rating':
    $sql = "SELECT * FROM cuisines ORDER BY total_ratings DESC";
    break;
  case 'new':
    $sql = "SELECT * FROM cuisines ORDER BY date_posted DESC";
    break;
  case 'main-dishes':
    $sql = "SELECT * FROM cuisines WHERE cuisine_type = 'Filipino Main Dishes'";
    break;
  case 'soups-stews':
    $sql = "SELECT * FROM cuisines WHERE cuisine_type = 'Filipino Soups and Stews'";
    break;
  case 'desserts':
    $sql = "SELECT * FROM cuisines WHERE cuisine_type = 'Filipino Desserts'";
    break;
  default:
    $sql = "SELECT * FROM cuisines";
}


  $cuisine = $conn->query($sql) or die($conn->error);
  $cuisineRow = $cuisine->fetch_assoc();
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

	<link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../styles/feed.css">
	<title>Cuisinatin | Filipino Cuisines</title>
</head>

<body>
	<?php
	define('nav', TRUE);
	include('./include/nav.php');
	?>
	<main>
		<div class="main-container">
			<div class="feed-container">
				<div class="feed-nav">
					<div class="create-post-container">
						<button class="create-post-button">
							<?php if (isset($_SESSION['user_id'])) { ?>
								<a href="./users/profile.php?id=<?php echo $_SESSION['user_id'] ?>">
									<img src="../images/user-solid-white.svg" class="author-picture">
								</a>
							<?php } else { ?>
								<img src="../images/user-solid-white.svg" class="author-picture">
							<?php } ?>
						</button>
						<a href="./add-recipe.html" class="create-post-input-container">
							<input type="text" placeholder="Create Post" class="create-post-input">
						</a>
					</div>
					<div class="sort-container">
						<p>
							Sort by:
						</p>
						<div class="sort-buttons-container">
							<a href="./sort-by.php?sort=best">
								<button class="<?php if($sort == 'best') { echo "active-";} ?>sort-button">
									<img src="../images/medal-regular.svg">
									<p>
										Best
									</p>
								</button>
							</a>
							<a href="./sort-by.php?sort=likes">
								<button class="<?php if($sort == 'likes') { echo "active-";} ?>sort-button">
									<img src="../images/heart-regular.svg">
									<p>
										Likes
									</p>
								</button>
							</a>
							<a href="./sort-by.php?sort=rating">
								<button class="<?php if($sort == 'rating') { echo "active-";} ?>sort-button">
									<img src="../images/star-regular.svg">
									<p>
										Rating
									</p>
								</button>
							</a>
							<a href="./sort-by.php?sort=new">
								<button class="<?php if($sort == 'new') { echo "active-";} ?>sort-button">
									<img src="../images/sparkles-regular.svg">
									<p>
										New
									</p>
								</button>
							</a>
							<div class="dropdown feed-dropdown">
								<div class="nav-list">
									<p>
										Cuisines
									</p>
									<img src="../images/caret-down-solid.svg" class="caret-down">
								</div>
								<ul class="dropdown-list sort-dropdown">
									<a href="./sort-by.php?sort=main-dishes">
										<li>
											Filipino Main Dishes
										</li>
									</a>
									<a href="./sort-by.php?sort=soups-stews">
										<li>
											Filipino Soups and Stews
										</li>
									</a>
									<a href="./sort-by.php?sort=desserts">
										<li>
											Filipino Desserts
										</li>
									</a>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="feed-list">
					<?php if (isset ($cuisineRow)) { do { ?>
						<div class="post-container">
							<div class="image-container">
								<a href="./posts.php?id=<?php echo $cuisineRow['cuisine_id'] ?>">
									<img src="">
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
												<img src="../images/ratings/rating-<?php
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

																														echo ($aveRating * 10); ?>.png" class="rating">
											</div>
											<p class="rating-counter"><?php echo $cuisineRow['total_ratings'] ?></p>
										</div>
									</div>
								</a>
								<div class="author-info">
									<div class="flex-row">
										<a href="./users.php?id=<?php echo $cuisineRow['author_id'] ?>">
											<img src="" class="author-picture">
										</a>
										<div>
											<a href="./users.php?id=<?php echo $cuisineRow['author_id'] ?>">
												Author: <?php
																$authorID = $cuisineRow['author_id'];
																$sql = "SELECT * FROM users WHERE user_id = $authorID";
																$user = $conn->query($sql) or die($conn->error);
																$userRow = $user->fetch_assoc();

																if (isset($userRow['first_name'], $userRow['last_name'])) {
																	echo $userRow['first_name'] . ' ' . $userRow['last_name'];
																} else {
																	echo "Inavlid name";
																}
																?>
											</a>
											<p>
												<?php echo $cuisineRow['date_posted'] ?>
											</p>
										</div>
									</div>
									<div class="flex-row">
										<button class="like-button">
											<img src="../images/heart-regular.svg" class="like-image">
										</button>
										<p class="like-counter">
											<?php echo $cuisineRow['likes'] ?>
										</p>
									</div>
								</div>
							</div>
						</div>
					<?php } while ($cuisineRow = $cuisine->fetch_assoc()); } else { ?>
          <?php echo "No cuisine matched your search."; }?>
				</div>
			</div>
			<?php
			define('side-content', TRUE);
			include('./include/side-content.php');
			?>
		</div>
	</main>
	<script src="../scripts/nav-bar.js"></script>
</body>
</html>