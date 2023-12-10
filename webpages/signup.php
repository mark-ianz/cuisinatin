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

  echo $_SESSION ['redirect_url'] = $_SERVER ['HTTP_REFERER'];
?>

<?php
  $error_message = "";
  if (isset ($_POST ['submit'])) {
    try {
      $first_name = $_POST ['fname'];
      $last_name = $_POST ['lname'];
      $email = $_POST ['email'];
      $password = password_hash($_POST ['password'], PASSWORD_DEFAULT);

      $first_letter = returnFirstLetter($first_name);
      $pf_pic = "images/author-profile/PF_IMG_LETTER_".$first_letter.".png";
      $sq1 = $_POST ['sq1'];
      $sq2 = $_POST ['sq2'];
      $sq3 = $_POST ['sq3'];
      $sa1 = strtolower($_POST ['sa1']);
      $sa2 = strtolower($_POST ['sa2']);
      $sa3 = strtolower($_POST ['sa3']);
  
      $sql = "INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `profile_pic`, `sq1`, `sq2`, `sq3`, `sa1`, `sa2`, `sa3`)
        VALUES (NULL, '$first_name', '$last_name', '$email', '$password', '$pf_pic', '$sq1', '$sq2', '$sq3', '$sa1', '$sa2', '$sa3');";
  
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
      
      if (isset($_SESSION ['redirect_url'])) {
        header("Location: ".$_SESSION ['redirect_url']);
        unset ($_SESSION ['redirect_url']);
      } else {
        header("Location: ./feed.php");
      }
    }
    catch (mysqli_sql_exception) {
      $error_message = "Email is already taken.";
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
            <div class="security-question-container">
              <div class="flex-row">
                <select name="sq1" required class="select-security-question js-question-1">
                  <option value="">
                    Security question #1
                  </option>
                  <option value="What was your childhood nickname?">  
                    What was your childhood nickname?
                  </option>
                  <option value="What is the first name of your bestfriend in high school?">
                    What is the first name of your bestfriend in high school?
                  </option>
                  <option value="In what city were you born?">
                    In what city were you born?
                  </option>
                  <option value="What is the name of your favorite pet?">
                    What is the name of your favorite pet?
                  </option>
                  <option value="What is the name of the street where you grew up?">
                    What is the name of the street where you grew up?
                  </option>
                  <option value="What is your mother's maiden name?">
                    What is your mother's maiden name?
                  </option>
                  <option value="What high school did you attend?">
                    What high school did you attend?
                  </option>
                  <option value="What is your date of birth?">
                    What is your date of birth?
                  </option>
                  <option value="Who is your favorite superhero?">
                    Who is your favorite superhero?
                  </option>
                  <option value="What year did you enter college?">
                    What year did you enter college?
                  </option>
                  <option value="Set a code of your choice">
                    Set a code of your choice
                  </option>
                </select>
                <input type="text" name="sa1" class="answer-input js-answer-1" placeholder="Input your answer" required maxlength="100">
              </div>
              <div class="flex-row">
                <select name="sq2" required class="select-security-question js-question-2">
                  <option value="">
                    Security question #2
                  </option>
                  <option value="What was your childhood nickname?">
                    What was your childhood nickname?
                  </option>
                  <option value="What is the first name of your bestfriend in high school?">
                    What is the first name of your bestfriend in high school?
                  </option>
                  <option value="In what city were you born?">
                    In what city were you born?
                  </option>
                  <option value="What is the name of your favorite pet?">
                    What is the name of your favorite pet?
                  </option>
                  <option value="What is the name of the street where you grew up?">
                    What is the name of the street where you grew up?
                  </option>
                  <option value="What is your mother's maiden name?">
                    What is your mother's maiden name?
                  </option>
                  <option value="What high school did you attend?">
                    What high school did you attend?
                  </option>
                  <option value="What is your date of birth?">
                    What is your date of birth?
                  </option>
                  <option value="Who is your favorite superhero?">
                    Who is your favorite superhero?
                  </option>
                  <option value="What year did you enter college?">
                    What year did you enter college?
                  </option>
                  <option value="Set a code of your choice">
                    Set a code of your choice
                  </option>
                </select>
                <input type="text" name="sa2" class="answer-input js-answer-2" placeholder="Input your answer" required maxlength="100">
              </div>
              <div class="flex-row">
                <select name="sq3" required class="select-security-question js-question-3">
                  <option value="">
                    Security question #3
                  </option>
                  <option value="What was your childhood nickname?">
                    What was your childhood nickname?
                  </option>
                  <option value="What is the first name of your bestfriend in high school?">
                    What is the first name of your bestfriend in high school?
                  </option>
                  <option value="In what city were you born?">
                    In what city were you born?
                  </option>
                  <option value="What is the name of your favorite pet?">
                    What is the name of your favorite pet?
                  </option>
                  <option value="What is the name of the street where you grew up?">
                    What is the name of the street where you grew up?
                  </option>
                  <option value="What is your mother's maiden name?">
                    What is your mother's maiden name?
                  </option>
                  <option value="What high school did you attend?">
                    What high school did you attend?
                  </option>
                  <option value="What is your date of birth?">
                    What is your date of birth?
                  </option>
                  <option value="Who is your favorite superhero?">
                    Who is your favorite superhero?
                  </option>
                  <option value="What year did you enter college?">
                    What year did you enter college?
                  </option>
                  <option value="Set a code of your choice">
                    Set a code of your choice
                  </option>
                </select>
                <input type="text" name="sa3" class="answer-input js-answer-3" placeholder="Input your answer" required maxlength="100">
              </div>
            </div>
            <p class="error-message js-error-message"></p>						
            <button type="submit" name="submit" class="signup-button js-signup-button">Signup</button>
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
    echo $_SERVER ['HTTP_REFERER'];
    echo '<script>displayError ('.'"'.$error_message.'"'.')</script>';
  }
?>
