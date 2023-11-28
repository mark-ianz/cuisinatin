<?php
	if (!defined('nav')) {
		header("Location: ../feed.php");
		exit;
	}
?>

<?php
	if (!($_SERVER['PHP_SELF'] == '/WS_Project/index.php')) {
?>
	<div class="modal-background"></div>
	<div class="navs">
		<nav class="header-navigation">
			<div class="top-left-container">
				<div class="hamburger-menu-container">
					<img src="../images/hamburger-menu.png" class="hamburger-menu">
				</div>
				<a href="../index.php">
					<img src="../images/logo/logo-white.svg" class="logo">
				</a>
			</div>
			<div class="top-right-container">
				<div class="search-container">
					<div class="search-bar-container">
						<input type="text" placeholder="Search for cuisines" class="search-bar js-search-bar">
						<button class="search-button">
							<img src="../images/search.svg" class="search-image">
						</button>
					</div>
					<button class="responsive-search-button">
						<img src="../images/search.svg" class="responsive-search-image">
					</button>
				</div>
				<?php
				if (!isset($_SESSION['user_id'])) { ?>
					<div class="login-container">
						<a href="./login.php">
							<button class="login-button">
								LOGIN
							</button>
						</a>
					</div>
				<?php } else { ?>
					<div class="login-container">
						<form action="./logout.php" method="post">
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
					<a href="../index.php">
						<img src="../images/logo/logo-white.svg" class="sidebar-logo">
					</a>
				</div>
				<div class="sidebar-search-container">
					<div class="search-nav-text">
						<b>Search</b>
					</div>
					<div class="sidebar-search-bar-container">
						<input type="text" class="sidebar-search-bar js-search-bar" placeholder="Search for cuisines">
						<button class="sidebar-search-button">
							<img src="../images/search.svg" class="sidebar-search-image">
						</button>
					</div>
				</div>
				<div class="navigations">
					<a href="../index.php">
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
							<img src="../images/caret-down-solid.svg" class="caret-down">
						</div>
						<ul class="dropdown-list">
							<a href="./sort-by.php?sort=main-dishes" class="nav-text">
								<li>
									FILIPINO MAIN DISHES
								</li>
							</a>
							<a href="./sort-by.php?sort=soups-stews" class="nav-text">
								<li>
									FILIPINO SOUPS AND STEWS
								</li>
							</a>
							<a href="./sort-by.php?sort=desserts" class="nav-text">
								<li>
									FILIPINO DESSERTS
								</li>
							</a>
						</ul>
					</div>
					<a href="./add-recipe.php">
						<div class="nav-list">
							<p class="nav-text">
								ADD A RECIPE
							</p>
						</div>
					</a>
					<a href="../webpages/what-we-offer.php">
						<div class="nav-list">
							<p class="nav-text">
								WHAT WE OFFER
							</p>
						</div>
					</a>
					<a href="./contact-us.php">
						<div class="nav-list">
							<p class="nav-text">
								CONTACT US
							</p>
						</div>
					</a>
				</div>
				<div class="sidebar-extra-navs">
					<div class="sidebar-login-signup">
						<p class="sub-text">
							<b>ACCOUNT</b>
						</p>
						<?php if (!isset ($_SESSION ['user_id'])) { ?>
							<a href="./login.php">
								<div class="nav-list">
									<p class="nav-text">
										LOGIN
									</p>
								</div>
							</a>
							<a href="./signup.php">
								<div class="nav-list">
									<p class="nav-text">
										SIGNUP
									</p>
								</div>
							</a>
						<?php } else { ?>
							<form action="./logout.php" method="post">
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
									<img src="../images/fb-logo.png" class="social-image fb-logo">
								</a>
							</div>
							<div>
								<a href="https://www.instagram.com/cuisinatin/" target="_blank">
									<img src="../images/instagram-logo.png" class="social-image ig-logo">
								</a>
							</div>
							<div>
								<a href="https://twitter.com/cuisinatin" target="_blank">
									<img src="../images/twitter-logo.png" class="social-image twitter-logo">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="sidebar-close-button-container">
				<img src="../images/close-button.png" class="sidebar-close-button">
			</div>
		</nav>
	</div>
<?php } else { ?>
	<div class="modal-background"></div>
	<div class="navs">
		<nav class="header-navigation">
			<div class="top-left-container">
				<div class="hamburger-menu-container">
					<img src="./images/hamburger-menu.png" class="hamburger-menu">
				</div>
				<a href="<?php $_SERVER['PHP_SELF'] ?>">
					<img src="./images/logo/logo-white.svg" class="logo">
				</a>
			</div>
			<div class="top-right-container">
				<div class="search-container">
					<div class="search-bar-container">
						<input type="text" placeholder="Search for cuisines" class="search-bar js-search-bar">
						<button class="search-button">
							<img src="./images/search.svg" class="search-image">
						</button>
					</div>
					<button class="responsive-search-button">
						<img src="./images/search.svg" class="responsive-search-image">
					</button>
				</div>
				<?php
				if (!isset($_SESSION['user_id'])) { ?>
					<div class="login-container">
						<a href="./webpages/login.php">
							<button class="login-button">
								LOGIN
							</button>
						</a>
					</div>
				<?php } else { ?>
					<div class="login-container">
						<form action="./webpages/logout.php" method="post">
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
					<a href="<?php $_SERVER['PHP_SELF'] ?>">
						<img src="./images/logo/logo-white.svg" class="sidebar-logo">
					</a>
				</div>
				<div class="sidebar-search-container">
					<div class="search-nav-text">
						<b>Search</b>
					</div>
					<div class="sidebar-search-bar-container">
						<input type="text" class="sidebar-search-bar js-search-bar" placeholder="Search for cuisines">
						<button class="sidebar-search-button">
							<img src="./images/search.svg" class="sidebar-search-image">
						</button>
					</div>
				</div>
				<div class="navigations">
					<a href="<?php $_SERVER['PHP_SELF'] ?>">
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
							<img src="./images/caret-down-solid.svg" class="caret-down">
						</div>
						<ul class="dropdown-list">
							<a href="./webpages/sort-by.php?sort=main-dishes" class="nav-text">
								<li>
									FILIPINO MAIN DISHES
								</li>
							</a>
							<a href="./webpages/sort-by.php?sort=soups-stews" class="nav-text">
								<li>
									FILIPINO SOUPS AND STEWS
								</li>
							</a>
							<a href="./webpages/sort-by.php?sort=desserts" class="nav-text">
								<li>
									FILIPINO DESSERTS
								</li>
							</a>
						</ul>
					</div>
					<a href="./webpages/add-recipe.php">
						<div class="nav-list">
							<p class="nav-text">
								ADD A RECIPE
							</p>
						</div>
					</a>
					<a href="./webpages/what-we-offer.php">
						<div class="nav-list">
							<p class="nav-text">
								WHAT WE OFFER
							</p>
						</div>
					</a>
					<a href="./webpages/contact-us.php">
						<div class="nav-list">
							<p class="nav-text">
								CONTACT US
							</p>
						</div>
					</a>
				</div>
				<div class="sidebar-extra-navs">
					<div class="sidebar-login-signup">
						<p class="sub-text">
							<b>ACCOUNT</b>
						</p>
						<?php if (!isset($_SESSION['user_id'])) {?>
							<a href="./webpages/login.php">
								<div class="nav-list">
									<p class="nav-text">
										LOGIN
									</p>
								</div>
							</a>
							<a href="./webpages/signup.php">
								<div class="nav-list">
									<p class="nav-text">
										SIGNUP
									</p>
								</div>
							</a>
						<?php } else {?>
							<form action="./webpages/logout.php" method="post">
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
									<img src="./images/fb-logo.png" class="social-image fb-logo">
								</a>
							</div>
							<div>
								<a href="https://www.instagram.com/cuisinatin/" target="_blank">
									<img src="./images/instagram-logo.png" class="social-image ig-logo">
								</a>
							</div>
							<div>
								<a href="https://twitter.com/cuisinatin" target="_blank">
									<img src="./images/twitter-logo.png" class="social-image twitter-logo">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="sidebar-close-button-container">
				<img src="./images/close-button.png" class="sidebar-close-button">
			</div>
		</nav>
	</div>
<?php } ?>