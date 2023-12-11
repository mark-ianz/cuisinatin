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
					<?php
						define('create-post-container', TRUE);
						include ('./include/create-post-container.php');
					?>
					<?php 
						define('sort-container', TRUE);
						include ('./include/sort-container.php');
					 ?>
				</div>
				<div class="feed-list">
					<?php
						define('feed-card', TRUE);
					?>
					<?php if (isset ($cuisineRow)) { do { ?>
						<?php
							include ('./include/generate-card.php');
						?>
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