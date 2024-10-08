<<<<<<< HEAD
<?php
  if (!isset($_SESSION)) {
    session_start();
  }

  if (isset ($_SESSION ['user_id'])) {
    header("Location: feed.php");
  }

  include_once ('../connection/config.php');
  include_once ('./util/functions.php');
  $conn = connect();
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
    <div class="form-container login-section">

      <!-- CONTAINER -->
      <div class="container login-container">
        <!-- TOP SIDE OF CONTAINER -->
        <div class="top-side">
          <div class="logo-container">
            <a href="./feed.php">
              <img src="../images/logo/logo-white.svg" class="logo">
            </a>
          </div>
        </div>
      
        <!-- MIDDLE SIDE OF CONTAINER (INPUT) -->
        <div class="middle-side">
          <p class="title">
            Log in
          </p>
          <form class="js-login-form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="input-container">
              <input type="text" 
                <?php
                  if (isset($_POST['email'])) {
                    echo "value=".$_POST['email'];
                  }
                ?>
              name="email" class="js-email" placeholder="Email" required>
              <input type="password" name="password" class="js-password" placeholder="Password" required>
            </div>
            <p class="error-message js-error-message"></p>
            <button type="submit" name="submit" class="submit-button js-login-button">Login</button>
            <div class="password-info">
              <div class="show-password">
                <input type="checkbox" name="show-password" class="js-show-password-checkbox">
                <label for="show-password" class="js-show-password-label">
                  Show Password
                </label>
              </div>
              <a href="./forgot-password.php" class="forgot-password">
                Forgot password?
              </a>
            </div>
          </form>
        </div>

        <!-- BOTTOM SIDE OF CONTAINER (OPTIONS) -->
        <div class="bot-side">
          <p>
            Don't have an account yet?
          </p>
          <a href="./signup.php">
            Sign up now!
          </a>
        </div>
      </div>
    </div>
  </div>
  <script src="../scripts/sub-pages/login.js"></script>  
</body>
</html>
<?php
  if (isset ($_POST['submit'])) {
    $email = $_POST ['email'];
    $password = $_POST ['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";

    $user = $conn->query($sql) or die ($conn->error);

    $row = $user->fetch_assoc();

    $total = $user->num_rows;

    if (isset ($row ['email'])) {
      if ($email == $row ['email'] && password_verify($password, $row ['password'])) {
        $_SESSION ['access'] = $row ['access'];
        $_SESSION ['user_id'] = $row ['user_id'];
        $_SESSION ['first_name'] = $row ['first_name'];
        $_SESSION ['last_name'] = $row ['last_name'];
        $_SESSION ['email'] = $row ['email'];
        $_SESSION ['profile_pic'] = $row ['profile_pic'];

        echo "<script>location.href = \"./feed.php\"</script>";
      } else {
        echo '<script>displayError ("Incorrect password.")</script>';
      }
    } else {
      echo '<script>displayError ("Incorrect email.")</script>';
    }
  }
=======
<?php
  if (!isset($_SESSION)) {
    session_start();
  }

  if (isset ($_SESSION ['user_id'])) {
    header("Location: feed.php");
  }

  include_once ('../connection/config.php');
  include_once ('./util/functions.php');
  $conn = connect();
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
    <div class="login-section">

      <!-- CONTAINER -->
      <div class="login-container">
        <!-- TOP SIDE OF CONTAINER -->
        <div class="top-side">
          <div class="logo-container">
            <a href="./feed.php">
              <img src="../images/logo/logo-white.svg" class="logo">
            </a>
          </div>
        </div>
      
        <!-- MIDDLE SIDE OF CONTAINER (INPUT) -->
        <div class="middle-side">
          <p class="title">
            Log in
          </p>
          <form class="js-login-form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="input-container">
              <input type="text" 
                <?php
                  if (isset($_POST['email'])) {
                    echo "value=".$_POST['email'];
                  }
                ?>
              name="email" class="js-email" placeholder="Email" required>
              <input type="password" name="password" class="js-password" placeholder="Password" required>
            </div>
            <p class="error-message js-error-message"></p>
            <button type="submit" name="submit" class="login-button js-login-button">Login</button>
            <div class="password-info">
              <div class="show-password">
                <input type="checkbox" name="show-password" class="js-show-password-checkbox">
                <label for="show-password" class="js-show-password-label">
                  Show Password
                </label>
              </div>
              <a href="" class="forgot-password">
                Forgot password?
              </a>
            </div>
          </form>
        </div>

        <!-- BOTTOM SIDE OF CONTAINER (OPTIONS) -->
        <div class="bot-side">
          <p>
            Don't have an account yet?
          </p>
          <a href="./signup.php">
            Sign up now!
          </a>
        </div>
      </div>
    </div>
  </div>
  <script src="../scripts/sub-pages/login.js"></script>  
</body>
</html>
<?php
  if (isset ($_POST['submit'])) {
    $email = $_POST ['email'];
    $password = $_POST ['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";

    $user = $conn->query($sql) or die ($conn->error);

    $row = $user->fetch_assoc();

    $total = $user->num_rows;

    if (isset ($row ['email'])) {
      if ($email == $row ['email'] && password_verify($password, $row ['password'])) {
        $_SESSION ['access'] = $row ['access'];
        $_SESSION ['user_id'] = $row ['user_id'];
        $_SESSION ['first_name'] = $row ['first_name'];
        $_SESSION ['last_name'] = $row ['last_name'];
        $_SESSION ['email'] = $row ['email'];
        $_SESSION ['profile_pic'] = $row ['profile_pic'];

        if (isset ($_SESSION ['redirect_url'])) {
          header("Location: ".$_SESSION ['redirect_url']);
        } else {
          header("Location: ./feed.php");
        }
      } else {
        echo '<script>displayError ("Incorrect password.")</script>';
      }
    } else {
      echo '<script>displayError ("Incorrect email.")</script>';
    }
  }
>>>>>>> origin/main
?>