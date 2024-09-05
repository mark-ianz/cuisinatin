<<<<<<< HEAD
<?php
	if (!isset($_SESSION)) {
		session_start();
	};

	include_once('../connection/config.php');

	$conn = connect();

	$sql = "SELECT * FROM users";
	$user = $conn->query($sql) or die ($conn->error);
	$row = $user->fetch_assoc();
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
	<link rel="stylesheet" href="../styles/contact-us.css">
	<title>Cuisinatin | Filipino Cuisines</title>
</head>

<body>
	<?php
		define('nav', TRUE);
		include ('./include/nav.php');
	?>
	<main>
		<div class="main-container">
			<div class="left-side">
				<p class="form-title">
					Let's stay connected
				</p>
				<p>
					We value your feedback and inquiries. If you have any questions, comments, or suggestions, please don't hesitate to get in touch with us.
				</p>
			</div>
			<form class="form-container" action="<?php $_SERVER ['PHP_SELF'] ?>" method="post">
				<p class="form-title">
					Contact us
				</p>
				<div>
					<label for="name">
						Name:
					</label>
					<input class="text-input" type="text" name="name" value ="<?php 
						if (isset ($_SESSION ['first_name']) || isset ($_SESSION ['last_name'])) {
							echo $_SESSION ['first_name'].' '.$_SESSION ['last_name'];
						} 
					?>" required>
				</div>
				<div>
					<label for="email">
						Email:
					</label>
					<input class="text-input" type="email" name="email" value ="<?php if (isset ($_SESSION ['email'])) {echo $_SESSION ['email'];} ?>" required>
				</div>
				<div>
					<label for="message">
						Message
					</label>
					<textarea class="text-input" name="message" rows="7" required></textarea>
				</div>
				<div class="submit-container">
					<input type="submit" name="submit" value="Send Message">
				</div>
			</form>
		</div>
	</main>
	<footer>
		<div class="footer-container">
			<div>
				<a href="../index.html">
					<img src="../images/logo/logo-white.svg" class="logo">
				</a>
			</div>
			<div class="footer-desc-container">
				<p>
					Cuisinatin is a free website about authentic Filipino recipes, celebrating the rich heritage of flavors and traditions. Join us and immerse yourself in the world of Filipino cuisine.
				</p>
				<a href="https://www.facebook.com/cuisinatin" target="_blank">
					@Cuisinatin
				</a>
			</div>
			<div class="footer-icon-container">
				<a href="https://www.facebook.com/cuisinatin" target="_blank">
					<img src="../images/facebook-logo.png" class="footer-icon">
				</a>
				<a href="mailto:cuisinatin@gmail.com">
					<img src="../images/google-logo.png" class="footer-icon">
				</a>
				<a href="https://www.instagram.com/cuisinatin/" target="_blank">
					<img src="../images/instagram-solid.webp" class="footer-icon">
				</a>
			</div>
		</div>
	</footer>
	<?php
		if (isset ($_POST['submit'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$message = $_POST['message'];

			$sql = "INSERT INTO `messages` (`message_id`, `name`, `email`, `message`) 
				VALUES (NULL, '$name', '$email', '$message')";
			
			$conn->query($sql) or die ($conn->error);
			echo '<script>alert ("Thanks for the message!\\nWe received it and will get back to you as soon as possible.")</script>';
		}
	?>
</body>
=======
<?php
	if (!isset($_SESSION)) {
		session_start();
	};

	include_once('../connection/config.php');

	$conn = connect();

	$sql = "SELECT * FROM users";
	$user = $conn->query($sql) or die ($conn->error);
	$row = $user->fetch_assoc();
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
	<link rel="stylesheet" href="../styles/contact-us.css">
	<title>Cuisinatin | Filipino Cuisines</title>
</head>

<body>
	<?php
		define('nav', TRUE);
		include ('./include/nav.php');
	?>
	<main>
		<div class="main-container">
			<div class="left-side">
				<p class="form-title">
					Let's stay connected
				</p>
				<p>
					We value your feedback and inquiries. If you have any questions, comments, or suggestions, please don't hesitate to get in touch with us.
				</p>
			</div>
			<form class="form-container" action="<?php $_SERVER ['PHP_SELF'] ?>" method="post">
				<p class="form-title">
					Contact us
				</p>
				<div>
					<label for="name">
						Name:
					</label>
					<input type="text" name="name" value ="<?php 
						if (isset ($_SESSION ['first_name']) || isset ($_SESSION ['last_name'])) {
							echo $_SESSION ['first_name'].' '.$_SESSION ['last_name'];
						} 
					?>" required>
				</div>
				<div>
					<label for="email">
						Email:
					</label>
					<input type="email" name="email" value ="<?php if (isset ($_SESSION ['email'])) {echo $_SESSION ['email'];} ?>" required>
				</div>
				<div>
					<label for="message">
						Message
					</label>
					<textarea name="message" rows="7" required></textarea>
				</div>
				<div class="submit-container">
					<input type="submit" name="submit" value="Send Message">
				</div>
			</form>
		</div>
	</main>
	<footer>
		<div class="footer-container">
			<div>
				<a href="../index.html">
					<img src="../images/logo/logo-white.svg" class="logo">
				</a>
			</div>
			<div class="footer-desc-container">
				<p>
					Cuisinatin is a free website about authentic Filipino recipes, celebrating the rich heritage of flavors and traditions. Join us and immerse yourself in the world of Filipino cuisine.
				</p>
				<a href="https://www.facebook.com/cuisinatin" target="_blank">
					@Cuisinatin
				</a>
			</div>
			<div class="footer-icon-container">
				<a href="https://www.facebook.com/cuisinatin" target="_blank">
					<img src="../images/facebook-logo.png" class="footer-icon">
				</a>
				<a href="mailto:cuisinatin@gmail.com">
					<img src="../images/google-logo.png" class="footer-icon">
				</a>
				<a href="https://www.instagram.com/cuisinatin/" target="_blank">
					<img src="../images/instagram-solid.webp" class="footer-icon">
				</a>
			</div>
		</div>
	</footer>
	<?php
		if (isset ($_POST['submit'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$message = $_POST['message'];

			$sql = "INSERT INTO `messages` (`message_id`, `name`, `email`, `message`) 
				VALUES (NULL, '$name', '$email', '$message')";
			
			$conn->query($sql) or die ($conn->error);
			echo '<script>alert ("Thanks for the message!\\nWe received it and will get back to you as soon as possible.")</script>';
		}
	?>
	<script src="../scripts/nav-bar.js"></script>
</body>
>>>>>>> origin/main
</html>