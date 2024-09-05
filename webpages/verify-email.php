<?php
  if (!isset($_SESSION)) {
    session_start();
  }

  include_once ('../connection/config.php');
  $conn = connect();

  if (!isset ($_SESSION ['code-verify'])) {
    header("Location: ./signup.php");
  }

  if (isset ($_POST ['cancel'])) {
    unset (
      $_SESSION ['code-verify'],
      $_SESSION ['temp-fname'],
      $_SESSION ['temp-lname'],
      $_SESSION ['temp-email'],
      $_SESSION ['temp-password'],
      $_SESSION ['temp-profile-pic'],
      $_SESSION ['try-counter']

    );
    header("Location: ./signup.php");
  }

  if (!isset ($_SESSION ['try-counter'])) {
    $_SESSION ['try-counter'] = 0;
  }

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
    <link rel="shortcut icon" href="./images/favicon/favicon-white.svg" type="image/x-icon">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/login-signup.css">
    <title>Cuisinatin | Filipino Cuisines</title>
</head>
<body>
  <!-- MAIN CONTAINER -->
  <div class="main-container">

    <!-- BACKGROUND IMAGE SECTION -->
    <div class="image-section">
      <img src="../images/login-background.jpg" alt="Error" class="background-image">
    </div>

    <!-- SECTION -->
    <div class="form-container signup-section">

      <!-- CONTAINER -->
      <div class="container signup-container">
        <!-- TOP SIDE OF CONTAINER -->
        <div class="top-side">
          <div class="logo-container">
            <a href="./feed.php">
              <img src="../images/logo/logo-white.svg" class="logo">
            </a>
          </div>
        </div>
      
        <!-- MIDDLE SIDE OF CONTAINER (INPUT) -->
        <?php if ($_SESSION ['try-counter'] < 5) { ?>
          <div class="middle-side">
            <p class="title">
              Verify Email
            </p>
            <form action="<?php $_SERVER ['PHP_SELF'] ?>" class="js-signup-form" method="post">
              <div class="input-container">
                <p>Enter the code that we sen't on <span class="bold"><?php echo $_SESSION ['temp-email'] ?></span></p>
                <input type="text" name="code" placeholder="Input code" required maxlength="6">
              </div>
              <p class="error-message js-error-message"></p>						
              <button type="submit" name="submit" class="submit-button">Submit</button>
            </form>
            <form action="<?php $_SERVER ['PHP_SELF'] ?>" method="post">
              <button type="submit" name="cancel" class="submit-button">Cancel</button>
            </form>
          </div>
        <?php } else { ?>
          <p>Max tries has been reached.</p>
          <p>You will be redirected to feed in 5 seconds.</p>
          <?php
            unset (
              $_SESSION ['code-verify'],
              $_SESSION ['temp-fname'],
              $_SESSION ['temp-lname'],
              $_SESSION ['temp-email'],
              $_SESSION ['temp-password'],
              $_SESSION ['temp-profile-pic'],
              $_SESSION ['try-counter']
            );
            header("Refresh: 5; url=./feed.php");
            exit;
          ?>
        <?php } ?>
      </div>
    </div>
  </div>
  <script src="../scripts/sub-pages/verify-email.js"></script>
  <script src="../util/function.js"></script>
</body>
</html>
<?php
  if (isset ($_POST ['submit'])) {
    $code_input = $_POST ['code'];

    if ($code_input == $_SESSION ['code-verify']) {
      $first_name = $_SESSION ['temp-fname'];
      $last_name = $_SESSION ['temp-lname'];
      $email = $_SESSION ['temp-email'];
      $password = $_SESSION ['temp-password'];
      $pf_pic = $_SESSION ['temp-profile-pic'];

      $sql = "INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `profile_pic`)
        VALUES (NULL, '$first_name', '$last_name', '$email', '$password', '$pf_pic');";

      $conn->query($sql) or die ($conn->error);

      /* FOR AUTO LOGIN AFTER SIGNING UP */
      $sql = "SELECT * FROM users WHERE email = '$email'";

      $user = $conn->query($sql) or die ($conn->error);

      $row = $user->fetch_assoc();

      $_SESSION ['access'] = $row ['access'];
      $_SESSION ['user_id'] = $row ['user_id'];
      $_SESSION ['first_name'] = $row ['first_name'];
      $_SESSION ['last_name'] = $row ['last_name'];
      $_SESSION ['email'] = $row ['email'];
      $_SESSION ['profile_pic'] = $row ['profile_pic'];

      unset (
        $_SESSION ['code-verify'],
        $_SESSION ['temp-fname'],
        $_SESSION ['temp-lname'],
        $_SESSION ['temp-email'],
        $_SESSION ['temp-password'],
        $_SESSION ['temp-profile-pic']
      );
      if (isset($_SESSION ['redirect_url'])) {
        header("Location: ".$_SESSION ['redirect_url']);
        unset ($_SESSION ['redirect_url']);
      } else {
        header("Location: ./feed.php");
      } 
    } else {
      $_SESSION ['try-counter']++;
      $error_message = "Incorrect code";
      echo '<script>displayError ('.'"'.$error_message.'"'.')</script>';
    }
  }
?>