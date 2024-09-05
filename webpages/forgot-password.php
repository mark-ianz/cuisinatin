<?php
  if (!isset($_SESSION)) {
    session_start();
  }

  if (isset ($_SESSION ['user_id'])) {
    header("Location: feed.php");
  }
  include_once ('../connection/config.php');
  $conn = connect();

  define('mail', TRUE);
  include_once ('../util/mail.php');
  //Load Composer's autoloader
  require '../PHPMailer/src/PHPMailer.php';
  require '../PHPMailer/src/SMTP.php';
  require '../PHPMailer/src/Exception.php';
  require '../vendor/autoload.php'; 

  if (!isset ($_SESSION ['to-submit-code'])) {
    $_SESSION ['to-submit-code'] = false;
  }

  if (!isset ($_SESSION ['fp-try-counter'])) {
    $_SESSION ['fp-try-counter'] = 0;
  } else {
    $tryCounter = $_SESSION ['fp-try-counter'];
  }

  if (!isset ($_SESSION ['to-submit-code'])) {
    $_SESSION ['to-submit-code'] = false;
  } else {
    $toSubmitCode = $_SESSION ['to-submit-code'];
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
    <div class="form-container login-section">

      <!-- CONTAINER -->
      <div class="container forgot-container">
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
          <?php if (!$toSubmitCode) { ?>
            <p class="title">
              Forgot Password
            </p>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
              <div class="input-container">
                <input type="email" name="email" placeholder="Enter your email" required>
              </div>
              <button type="submit" name="submit-email" class="submit-button">Submit</button>
            </form>
          <?php } else if ($tryCounter > 5) { ?>
            <p>Max tries has been reached.</p>
            <p>You will be redirected to feed in 5 seconds.</p>
            <?php
              unset (
                $_SESSION ['to-submit-code'],
                $_SESSION ['fp-email'],
                $_SESSION ['fp-code-verify'],
                $_SESSION ['fp-try-counter']
              );
              header("Refresh: 5; url=./feed.php");
              exit;
            ?>
          <?php } else { ?>
            <p class="title">
              Verification Code
            </p>
            <p>
              Enter the code that we sent on <?php echo $_SESSION ['fp-email'] ?>
            </p>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
              <div class="input-container">
                <input type="text" name="code" placeholder="Input code" required>
              </div>
              <p class="error-message js-error-message"></p>
              <button type="submit" name="submit-code" class="submit-button">Submit</button>
            </form>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <script src="../scripts/sub-pages/forgot-password.js"></script>
</body>
</html>
<?php
  if (isset ($_POST ['submit-email'])) {
    $email = $_POST ['email'];
    $_SESSION ['to-submit-code'] = true;
    $code = rand(100000,999999);

    $_SESSION ['fp-email'] = $email;
    $_SESSION ['fp-code-verify'] = $code;
    /* sendCode($email, $code); */
    header("Location: ".$_SERVER ['PHP_SELF']);
  }

  if (isset ($_POST ['submit-code'])) {
    $code_input = $_POST ['code'];
    $code = $_SESSION ['fp-code-verify'];

    if ($code_input == $code) {
      unset (
        $_SESSION ['fp-code-verify'],
        $_SESSION ['fp-try-counter']
      );
    } else {
      $_SESSION ['fp-try-counter']++;
      $error_message = "Incorrect code";
      echo '<script>displayError ('.'"'.$error_message.'"'.')</script>';
    }
  }
?>