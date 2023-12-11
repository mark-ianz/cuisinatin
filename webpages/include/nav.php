<?php
	if (!defined('nav')) {
		ob_start();
		header('Location: ./feed.php');
		ob_end_flush();
		exit();
	}

	$root = "/WS_Project/"
?>
<div class="modal-background"></div>
<div class="navs">
	<nav class="header-navigation">
		<div class="top-left-container">
			<div class="hamburger-menu-container">
				<img src="<?php echo $root ?>/images/hamburger-menu.png" class="hamburger-menu">
			</div>
			<a href="<?php echo $root ?>/index.php">
				<img src="<?php echo $root ?>/images/logo/logo-white.svg" class="logo">
			</a>
		</div>
		<div class="top-right-container">
			<div class="search-container">
				<form action="<?php echo $root ?>webpages/result.php" method="get" class="search-bar-container">
					<input type="text" name="search" placeholder="Search for cuisines" class="search-bar">
					<button type="submit" name="submit" class="search-button">
						<img src="<?php echo $root ?>/images/search.svg" class="search-image">
					</button>
				</form>
				<button class="responsive-search-button">
					<img src="<?php echo $root ?>/images/search.svg" class="responsive-search-image">
				</button>
			</div>
			<?php
			if (!isset($_SESSION['user_id'])) { ?>
				<div class="login-container">
					<a href="<?php echo $root ?>webpages/login.php">
						<button class="login-button">
							LOGIN
						</button>
					</a>
				</div>
			<?php } else { ?>
				<div class="login-container">
					<form action="<?php echo $root ?>webpages/logout.php" method="post">
						<button type="submit" name="submit" class="login-button">
							LOGOUT
						</button>
					</form>
				</div>
			<?php } ?>
		</div>
	</nav>
	<nav class="sidebar-container">
		<div class="sidebar-content">
			<div class="sidebar-logo-container">
				<a href="<?php echo $root ?>/index.php">
					<img src="<?php echo $root ?>/images/logo/logo-white.svg" class="sidebar-logo">
				</a>
			</div>
			<div class="sidebar-search-container">
				<div class="search-nav-text">
					<b>Search</b>
				</div>
				<form action="<?php echo $root ?>webpages/result.php" method="get" class="sidebar-search-bar-container">
					<input type="text" name="search" class="sidebar-search-bar" placeholder="Search for cuisines">
					<button type="submit" name="submit" class="sidebar-search-button">
						<img src="<?php echo $root ?>/images/search.svg" class="sidebar-search-image">
					</button>
				</form>
			</div>
			<div class="navigations">
				<a href="<?php echo $root ?>/index.php">
					<div class="nav-list">
						<p class="nav-text">
							HOME
						</p>
					</div>
				</a>
				<div class="dropdown">
					<div class="nav-list">
						<p class="nav-text">
							CUISINES
						</p>
						<img src="<?php echo $root ?>/images/caret-down-solid.svg" class="caret-down">
					</div>
					<ul class="dropdown-list">
						<a href="<?php echo $root ?>webpages/sort-by.php?sort=main-dishes" class="nav-text">
							<li>
								FILIPINO MAIN DISHES
							</li>
						</a>
						<a href="<?php echo $root ?>webpages/sort-by.php?sort=soups-stews" class="nav-text">
							<li>
								FILIPINO SOUPS AND STEWS
							</li>
						</a>
						<a href="<?php echo $root ?>webpages/sort-by.php?sort=desserts" class="nav-text">
							<li>
								FILIPINO DESSERTS
							</li>
						</a>
					</ul>
				</div>
				<a href="<?php echo $root ?>webpages/add-recipe.php">
					<div class="nav-list">
						<p class="nav-text">
							ADD A RECIPE
						</p>
					</div>
				</a>
				<a href="<?php echo $root ?>webpages/what-we-offer.php">
					<div class="nav-list">
						<p class="nav-text">
							WHAT WE OFFER
						</p>
					</div>
				</a>
				<a href="<?php echo $root ?>webpages/contact-us.php">
					<div class="nav-list">
						<p class="nav-text">
							CONTACT US
						</p>
					</div>
				</a>
				<?php if (isset ($_SESSION ['user_id'])) { ?>
					<a href="<?php echo $root ?>webpages/users.php?id=<?php echo $_SESSION ['user_id'] ?>">
						<div class="nav-list">
							<p class="nav-text">
								PROFILE
							</p>
						</div>
					</a>
				<?php } ?>
			</div>
			<div class="sidebar-extra-navs">
				<div class="sidebar-login-signup">
					<p class="sub-text">
						<b>ACCOUNT</b>
					</p>
					<?php if (!isset ($_SESSION ['user_id'])) { ?>
						<a href="<?php echo $root ?>webpages/login.php">
							<div class="nav-list">
								<p class="nav-text">
									LOGIN
								</p>
							</div>
						</a>
						<a href="<?php echo $root ?>webpages/signup.php">
							<div class="nav-list">
								<p class="nav-text">
									SIGNUP
								</p>
							</div>
						</a>
					<?php } else { ?>
						<form action="<?php echo $root ?>webpages/logout.php" method="post">
							<button type="submit" class="nav-list nav-text sidebar-login-logout" name="submit">
								LOGOUT
							</button>
						</form>
					<?php } ?>
				</div>
				<div class="socials-container">
					<p class="sub-text">
						<b>FOLLOW US</b>
					</p>
					<div class="socials">
						<div>
							<a href="https://www.facebook.com/cuisinatin" target="_blank">
								<img src="<?php echo $root ?>/images/fb-logo.png" class="social-image fb-logo">
							</a>
						</div>
						<div>
							<a href="https://www.instagram.com/cuisinatin/" target="_blank">
								<img src="<?php echo $root ?>/images/instagram-logo.png" class="social-image ig-logo">
							</a>
						</div>
						<div>
							<a href="https://twitter.com/cuisinatin" target="_blank">
								<img src="<?php echo $root ?>/images/twitter-logo.png" class="social-image twitter-logo">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="sidebar-close-button-container">
			<img src="<?php echo $root ?>/images/close-button.png" class="sidebar-close-button">
		</div>
	</nav>
</div>
<script src="<?php echo $root ?>/scripts/nav-bar.js"></script>