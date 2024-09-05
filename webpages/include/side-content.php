<<<<<<< HEAD
<?php
  if (!defined('side-content')) {
    header("Location: ../feed.php");
    exit ();
  }

  include_once ('../connection/config.php');

  $conn = connect();
  $sql = "SELECT * FROM users ORDER BY likes DESC";

  $user = $conn->query($sql) or die ($conn->error);
  $row = $user->fetch_assoc();
  $total_users = $user->num_rows;
?>

<div class="side-content">
  <a href="#">
    <button class="back-to-top">
      Back to Top
    </button>
  </a>
  <div class="flex-column">
    <div class="welcome-container">
      <div class="welcome-message">
        <div class="flex-row">
          <?php if (isset ($_SESSION ['user_id'])) { ?>
            <a href="./users.php?id=<?php echo $_SESSION ['user_id'] ?>">
              <img src="../<?php echo $_SESSION ['profile_pic'] ?>" class="author-picture">
            </a>
          <?php } else { ?>
            <img src="../images/author-profile/default.webp" class="author-picture">
          <?php } ?>
          <p>
            <?php 
              if (isset ($_SESSION['first_name'])) {
                echo "Welcome <span class=\"bold\">".$_SESSION ['first_name']."</span>!";
              } else {
                echo "Welcome <span class=\"bold\">guess user</span>!";
              }
            ?>
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
        <?php if (isset($_SESSION['user_id'])) { ?>
          <a href="./add-recipe.php">
            <button class="side-content-create-post">
              Create a Post
            </button>
          </a>
        <?php } else { ?>
          <a href="./login.php">
            <button class="side-content-create-post">
              Login
            </button>
          </a>
        <?php } ?>
      </div>
    </div>
    <div class="popular-authors-container">
      <div class="popular-authors">
        <p>
          Top Authors
        </p>
      </div>
      <ul class="author-list">
        <?php
          if ($total_users > 0) {?>
          <?php
            $i = 1;
            do {?>
            <li>
              <?php
                if ($i > 3) {
                  exit;
                }
                if ($i == 1) {
                  $medal = 'gold';
                } else if ($i == 2) {
                  $medal = 'silver';
                } else {
                  $medal = 'bronze';
                }
              ?>
              <a href="users.php?id=<?php echo $row ['user_id'] ?>" class="author-container">
              <img src="../images/<?php echo $medal ?>-medal.svg" class="ranking">
                <img src="../<?php echo $row ['profile_pic'] ?>" class="author-picture">
                <div class="author-stats">
                    <p class="author-name">
                        <?php echo $row['first_name'].' '.$row['last_name'] ?>
                    </p>
                    <p>
                        <?php echo $row['likes'].' likes' ?>
                    </p>
                </div>
              </a>
            </li>
          <?php $i++; } while ($row = $user->fetch_assoc()); ?>
        <?php } else { ?>
          <p>
            No users found.
          </p>
        <?php } ?>
      </ul>
    </div>
  </div>
=======
<?php
  if (!defined('side-content')) {
    header("Location: ../feed.php");
    exit ();
  }

  include_once ('../connection/config.php');

  $conn = connect();
  $sql = "SELECT * FROM users ORDER BY likes DESC";

  $user = $conn->query($sql) or die ($conn->error);
  $row = $user->fetch_assoc();
  $total_users = $user->num_rows;
?>

<div class="side-content">
  <a href="#">
    <button class="back-to-top">
      Back to Top
    </button>
  </a>
  <div class="flex-column">
    <div class="welcome-container">
      <div class="welcome-message">
        <div class="flex-row">
          <?php if (isset ($_SESSION ['user_id'])) { ?>
            <a href="./users.php?id=<?php echo $_SESSION ['user_id'] ?>">
              <img src="../<?php echo $_SESSION ['profile_pic'] ?>" class="author-picture">
            </a>
          <?php } else { ?>
            <img src="../images/author-profile/default.webp" class="author-picture">
          <?php } ?>
          <p>
            <?php 
              if (isset ($_SESSION['first_name'])) {
                echo "Welcome <span class=\"bold\">".$_SESSION ['first_name']."</span>!";
              } else {
                echo "Welcome <span class=\"bold\">guess user</span>!";
              }
            ?>
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
        <?php if (isset($_SESSION['user_id'])) { ?>
          <a href="./add-recipe.php">
            <button class="side-content-create-post">
              Create a Post
            </button>
          </a>
        <?php } else { ?>
          <a href="./login.php">
            <button class="side-content-create-post">
              Login
            </button>
          </a>
        <?php } ?>
      </div>
    </div>
    <div class="popular-authors-container">
      <div class="popular-authors">
        <p>
          Top Authors
        </p>
      </div>
      <ul class="author-list">
        <?php
          if ($total_users > 0) {?>
          <?php
            $i = 1;
            do {?>
            <li>
              <?php
                if ($i > 3) {
                  exit;
                }
                if ($i == 1) {
                  $medal = 'gold';
                } else if ($i == 2) {
                  $medal = 'silver';
                } else {
                  $medal = 'bronze';
                }
              ?>
              <a href="users.php?id=<?php echo $row ['user_id'] ?>" class="author-container">
              <img src="../images/<?php echo $medal ?>-medal.svg" class="ranking">
                <img src="../<?php echo $row ['profile_pic'] ?>" class="author-picture">
                <div class="author-stats">
                    <p class="author-name">
                        <?php echo $row['first_name'].' '.$row['last_name'] ?>
                    </p>
                    <p>
                        <?php echo $row['likes'].' likes' ?>
                    </p>
                </div>
              </a>
            </li>
          <?php $i++; } while ($row = $user->fetch_assoc()); ?>
        <?php } else { ?>
          <p>
            No users found.
          </p>
        <?php } ?>
      </ul>
    </div>
  </div>
>>>>>>> origin/main
</div>