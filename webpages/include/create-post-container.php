<?php
  if (!defined('create-post-container')) {
    header("Location: ../feed.php");
    exit ();
  }

  include_once ('../connection/config.php');

?>

<div class="create-post-container">
  <button class="create-post-button">
    <?php if (isset($_SESSION['user_id'])) { ?>
      <a href="./users.php?id=<?php echo $_SESSION['user_id'] ?>">
        <img src="../<?php echo $_SESSION['profile_pic'] ?>" class="author-picture">
      </a>
    <?php } else { ?>
      <img src="../images/author-profile/default.webp" class="author-picture">
    <?php } ?>
  </button>
  <a href="
							<?php if (isset($_SESSION['user_id'])) {
                echo "./add-recipe.php";
              } else {
                echo "./login.php";
              } ?>" class="create-post-input-container">
    <input type="text" placeholder="Create Post" class="create-post-input">
  </a>
</div>