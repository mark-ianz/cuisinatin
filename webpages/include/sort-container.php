<?php
  if (!defined('sort-container')) {
    header("Location: ../feed.php");
    exit ();
  }

  include_once ('../connection/config.php');
?>

<div class="sort-container">
  <p>
    Sort by:
  </p>
  <div class="sort-buttons-container">
    <a href="./sort-by.php?sort=best">
      <button class="<?php if ($sort == 'best') {
                        echo "active-";
                      } ?>sort-button">
        <img src="../images/medal-regular.svg">
        <p>
          Best
        </p>
      </button>
    </a>
    <a href="./sort-by.php?sort=likes">
      <button class="<?php if ($sort == 'likes') {
                        echo "active-";
                      } ?>sort-button">
        <img src="../images/heart-regular.svg">
        <p>
          Likes
        </p>
      </button>
    </a>
    <a href="./sort-by.php?sort=rating">
      <button class="<?php if ($sort == 'rating') {
                        echo "active-";
                      } ?>sort-button">
        <img src="../images/star-regular.svg">
        <p>
          Rating
        </p>
      </button>
    </a>
    <a href="./sort-by.php?sort=new">
      <button class="<?php if ($sort == 'new') {
                        echo "active-";
                      } ?>sort-button">
        <img src="../images/sparkles-regular.svg">
        <p>
          New
        </p>
      </button>
    </a>
    <div class="dropdown feed-dropdown">
      <div class="nav-list">
        <p>
        <?php
          if (isset ($sort)) {
            switch ($sort) {
              case 'main-dishes':
                echo "Filipino Main Dishes";
                break;
              case 'soups-stews':
                echo "Filipino Soups and Stews";
                break;
              case 'desserts':
                echo "Filipino Desserts";
                break;
              default:
              echo "Cuisines";
              break;
            }
          } else {
            echo "Cuisines";
          }
        ?>
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