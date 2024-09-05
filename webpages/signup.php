<?php
  if (!isset($_SESSION)) {
    session_start();
  }

  if (isset ($_SESSION ['user_id'])) {
    header("Location: feed.php");
  }

  if (isset ($_SESSION ['code-verify'])) {
    header("Location: ./verify-email.php");
  }

  define('mail', TRUE);
  include_once ('../util/mail.php');
  //Load Composer's autoloader
  require '../PHPMailer/src/PHPMailer.php';
  require '../PHPMailer/src/SMTP.php';
  require '../PHPMailer/src/Exception.php';
  require '../vendor/autoload.php'; 

  
  include_once ('../connection/config.php');
  include_once ('./util/functions.php');
  $conn = connect();

  if (isset ($_SERVER ['HTTP_REFERER'])) {
    $_SESSION ['redirect_url'] = $_SERVER ['HTTP_REFERER'];
  }
?>

<?php
  $error_message = "";
  if (isset ($_POST ['submit'])) {

    $email = $_POST ['email'];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $user = $conn->query($sql) or die ($conn->error);

    if ($user->num_rows > 0) {
      $error_message = 'Email is already taken.';
    } else {
      $first_name = $_POST ['fname'];
      $last_name = $_POST ['lname'];
      $password = password_hash($_POST ['password'], PASSWORD_DEFAULT);
    
      $first_letter = returnFirstLetter($first_name);
      $pf_pic = "images/author-profile/PF_IMG_LETTER_".$first_letter.".png";

      $_SESSION ['temp-fname'] = $first_name;
      $_SESSION ['temp-lname'] = $last_name;
      $_SESSION ['temp-email'] = $email;
      $_SESSION ['temp-password'] = $password;
      $_SESSION ['temp-profile-pic'] = $pf_pic;

      $code = rand(100000, 999999);
      $_SESSION ['code-verify'] = $code;
      sendCode($email, $code);
      header("Location: ./verify-email.php");
    }
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
        <div class="middle-side">
          <p class="title">
            Signup
          </p>
          <form action="<?php $_SERVER ['PHP_SELF'] ?>" class="js-signup-form" method="post">
            <div class="input-container">
              <div class="flex-row">
                <input type="text"
                  <?php 
                    if (isset ($_POST ['fname'])) {
                      echo "value=".$_POST ['fname'];
                    }
                  ?>
                  name="fname" class="name-input js-first-name-input" placeholder="First Name" required maxlength="50">
                <input type="text" 
                  <?php 
                    if (isset ($_POST ['lname'])) {
                      echo "value=".$_POST ['lname'];
                    }
                  ?>
                  name="lname" class="name-input js-last-name-input" placeholder="Last Name" required maxlength="50">
              </div>
              <input type="email" 
                <?php 
                  if (isset ($_POST ['email'])) {
                    echo "value=". $_POST ['email'];
                  }
                ?>
                name="email" class="js-email-input" placeholder="Email" required maxlength="50">
              <div class="flex-row">
                <input type="password" name="password" class="js-password password-input" placeholder="Password" required minlength="8" maxlength="50">
                <input type="password" class="js-confirm-password password-input" placeholder="Confirm Password" required>
              </div>
            </div>
            <p class="error-message js-error-message"></p>						
            <button type="submit" name="submit" class="submit-button js-signup-button">Signup</button>
            <div class="password-info">
              <div class="show-password">
                <input type="checkbox" name="show-password" class="js-show-password-checkbox">
                <label for="show-password" class="js-show-password-label">
                  Show Password
                </label>
              </div>
            </div>
          </form>
        </div>

        <!-- BOTTOM SIDE OF CONTAINER (OPTIONS) -->
        <div class="bot-side">
          <p>
            Already have an account?
          </p>
          <a href="./login.php">
            Login now!
          </a>
        </div>
      </div>
    </div>
  </div>
  <script src="../scripts/sub-pages/signup.js"></script>
</body>
</html>
<?php
  if ($error_message != "") {
    echo '<script>displayError ('.'"'.$error_message.'"'.')</script>';
  }
?>
