<?php
    include_once ('../connection/config.php');

    $conn = connect ();

    $sql = "SELECT * FROM cuisines";
    $cuisine = $conn->query($sql) or die ($conn->error);

    $row = $cuisine->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="https://cuisinatin.netlify.app/images/favicon/favicon-black.svg"/>
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
    <div class="modal-background">
    </div>
    <div class="navs">
        <nav class="header-navigation">
            <div class="top-left-container">
                <div class="hamburger-menu-container">
                    <img src="../images/hamburger-menu.png" class="hamburger-menu">
                </div>
                <a href="../index.html">
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
                <div class="login-container">
                    <a href="./login.html">
                        <button class="login-button">
                            LOGIN
                        </button>
                    </a>
                </div>
            </div>    
        </nav>
        <nav class="sidebar-container">
            <div class="sidebar-content">
                <div class="sidebar-logo-container">
                    <a href="../index.html">
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
                    <a href="../index.html">
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
                            <a href="./sort-by/main-dishes.html" class="nav-text">
                                <li>
                                    FILIPINO MAIN DISHES
                                </li>
                            </a>
                            <a href="./sort-by/soups-stews.html" class="nav-text">
                                <li>
                                    FILIPINO SOUPS AND STEWS
                                </li>
                            </a>
                            <a href="./sort-by/desserts.html"  class="nav-text">
                                <li>
                                    FILIPINO DESSERTS
                                </li>
                            </a>
                      </ul>
                    </div>   
                    <a href="./add-recipe.html">
                        <div class="nav-list">
                            <p class="nav-text">
                                ADD A RECIPE
                            </p>
                        </div>
                    </a>
                    <a href="../webpages/what-we-offer.html">
                        <div class="nav-list">
                            <p class="nav-text">
                                WHAT WE OFFER
                            </p>
                        </div>
                    </a>
                    <a href="./contact-us.html">
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
                        <a href="./login.html">
                            <div class="nav-list">
                                <p class="nav-text">
                                    LOGIN
                                </p>
                            </div>
                        </a>
                        <a href="./signup.html">
                            <div class="nav-list">
                                <p class="nav-text">
                                    SIGNUP
                                </p>
                            </div>
                        </a>
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
    <main>
      <div class="main-container">
        <div class="feed-container">
            <div class="feed-nav">
                <div class="create-post-container">
                    <button class="create-post-button">
                        <a href="./users/lebron.html">
                            <img src="../images/author-profile/lebarawn-jemz.webp" class="author-picture">
                        </a>
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
                        <a href="./feed.html">
                            <button class="active-sort-button">
                                <img src="../images/medal-regular.svg">
                                <p>
                                    Best
                                </p>
                            </button>
                        </a>
                        <a href="./sort-by/likes.html">
                            <button class="sort-button">
                                <img src="../images/heart-regular.svg">
                                <p>
                                    Likes
                                </p>
                            </button>
                        </a>
                        <a href="./sort-by/rating.html">
                            <button class="sort-button">
                                <img src="../images/star-regular.svg">
                                <p>
                                    Rating
                                </p>
                            </button>
                        </a>
                        <a href="./sort-by/new.html">
                            <button class="sort-button">
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
                              <a href="./sort-by/main-dishes.html">
                                  <li>
                                      Filipino Main Dishes
                                  </li>
                              </a>
                              <a href="./sort-by/soups-stews.html">
                                  <li>
                                      Filipino Soups and Stews
                                  </li>
                              </a>
                              <a href="./sort-by/desserts.html" >
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
                <?php do {?>
                    <p>Cuisine Name: <?php echo $row ['cuisine_name']; ?></p>
                    <p>Likes: <?php echo $row ['cuisine_total_likes']; ?></p>
                    <p>Ratings: <?php echo $row ['cuisine_total_ratings']; ?></p>
                <?php } while ($row = $cuisine->fetch_assoc()); ?>
            </div>
        </div>
        <div class="side-content">
            <div class="flex-column">
                <div class="welcome-container">
                    <div class="welcome-message">
                        <div class="flex-row">
                            <img src="../images/author-profile/lebarawn-jemz.webp" class="author-picture">
                            <p>
                                Welcome <span class="bold">LeBrawn Jemz!</span>
                            </p>
                        </div>
                        <div>
                            <p>
                                Your personal <span class="bold">Cuisinatin</span> feed to view and check your favorite cuisine's recipe.
                            </p>
                        </div>
                    </div>
                    <div class="hr"></div>
                    <div>
                        <a href="../webpages/add-recipe.html">
                            <button class="side-content-create-post">
                                Create a Post
                            </button>
                        </a>
                    </div>
                </div>
                <div class="popular-authors-container">
                    <div class="popular-authors">
                        <p>
                            Top Authors
                        </p>
                    </div>
                    <ul class="author-list">
                        <li>
                            <a href="../webpages/users/lebron.html" class="author-container">
                            <img src="../images/gold-medal.svg" class="ranking">

                                <img src="../images/author-profile/lebarawn-jemz.webp" class="author-picture">
                                <div class="author-stats">
                                    <p class="author-name">
                                        LeBrawn Jemz
                                    </p>
                                    <p>
                                        249 likes
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="../webpages/users/steph.html" class="author-container">
                                <img src="../images/silver-medal.svg" class="ranking">
                                <img src="../images/author-profile/steffan-cerri.jfif" class="author-picture">
                                <div class="author-stats">
                                    <p class="author-name">
                                        Stefan Cerri
                                    </p>
                                    <p>
                                        218 likes
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="../webpages/users/jordan.html" class="author-container">
                                <img src="../images/bronze-medal.svg" class="ranking">
                                <img src="../images/author-profile/mikal-jerden.jpg" class="author-picture">
                                <div class="author-stats">
                                    <p class="author-name">
                                        Mikal Jerden
                                    </p>
                                    <p>
                                        140 likes
                                    </p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="#" class="margin-auto we">
                <button class="back-to-top">
                    Back to Top
                </button>
            </a>
        </div>
      </div>
    </main>
    <script type="module" src="../scripts/main.js"></script>
    <script type="module" src="../scripts/webpages/feed.js"></script>
</body>
</html>