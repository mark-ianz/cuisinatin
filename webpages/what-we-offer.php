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
	<meta property="og:image" content="https://cuisinatin.netlify.app/images/favicon/favicon-black.svg" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
	<link rel="shortcut icon" href="../images/favicon/favicon-white.svg" type="image/x-icon">
	<link rel="stylesheet" href="../styles/nav-bar.css">
	<link rel="stylesheet" href="../styles/general.css">

	<link rel="stylesheet" href="../styles/footer.css">
	<link rel="stylesheet" href="../styles/what-we-offer.css">
	<title>Cuisinatin | Filipino Cuisines</title>
</head>

<body>
	<?php
	define('nav', TRUE);
	include('./include/nav.php');
	?>
	<main>
		<div class="main-container">
			<div class="content">
				<div class="image-container first">
					<img src="../images/fork-knife-svgrepo-com.svg">
				</div>
				<div class="description">
					<p class="content-title">
						Culinary Community and Sharing
					</p>
					<p>
						We offer a space for food enthusiasts, both Filipinos and those interested in Filipino cuisine, to connect and share their love for Filipino dishes.
					</p>
				</div>
			</div>
			<div class="content">
				<div class="image-container second">
					<img src="../images/data-cloud-svgrepo-com.svg">
				</div>
				<div class="description">
					<p class="content-title">
						Recipe Repository
					</p>
					<p>
						We offer a recipe repository for users to easily search and contribute their favorite recipes, whether they're traditional, regional specialties, or modern twists on Filipino classics.
					</p>
				</div>
			</div>
			<div class="content">
				<div class="image-container third">
					<img src="../images/collaborate-svgrepo-com.svg">
				</div>
				<div class="description">
					<p class="content-title">
						Cultural Insights and Education
					</p>
					<p>
						We offer content that educates users about the cultural aspects and uniqueness of Filipino cuisine.
					</p>
				</div>
			</div>
		</div>
	</main>
	<?php
	define('footer', TRUE);
	include('./include/footer.php')
	?>
	<script src="../scripts/nav-bar.js"></script>
</body>

</html>