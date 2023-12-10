<?php
  if (!isset ($_SESSION)) {
    session_start();
  }

  include_once ('../connection/config.php');
  include_once ('./util/functions.php');
  $conn = connect();

  $id = $_GET ['id'];

  if (!(isset ($_SESSION ['user_id']) && $_SESSION['user_id'] == $id)) {
    if (isset ($_SERVER ['HTTP_REFERER'])) {
      header("Location: ".$_SERVER ['HTTP_REFERER']);
    } else {
      header("Location: ./feed.php");
    }
  } 

  $sql = "SELECT * FROM `users` WHERE user_id = '$id'";
  $user = $conn->query($sql) or die ($conn->error);
  $table = $user->num_rows;
  if ($table == 0) {
    if (isset ($_SESSION ['redirect_url'])) {
      header("Location: ".$_SESSION['redirect_url']);
    } else {
      header("Location: ./feed.php");
    }
  }
  $row = $user->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta property="og:image" content="https://cuisinatin.netlify.app/images/favicon/favicon-black.svg" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
	<link rel="shortcut icon" href="../images/favicon/favicon-white.svg" type="image/x-icon">
	<link rel="stylesheet" href="../styles/nav-bar.css">
	<link rel="stylesheet" href="../styles/general.css">
  <link rel="stylesheet" href="../styles/users.css">
  <link rel="stylesheet" href="../styles/edit-users.css">
	<title>Cuisinatin | Filipino Cuisines</title>
</head>
<body>
  <?php
    define('nav', TRUE);
    include ('./include/nav.php');
  ?>
  <main>
    <form action="./edit-users.php?id=<?php echo $id ?>" method="post" class="main-container js-form" enctype="multipart/form-data">
    <!--  -->
      <div class="modal-bg js-modal">
        <div class="modal-container">
          <p class="title">
            Update your profile
          </p>
          <p>
            Do you really want to update your profile?
          </p>
          <div class="option">
            <button type="submit" name="submit">
              Update!
            </button>
            <button type="button" class="js-cancel">
              No, never mind
            </button>
          </div>
        </div>
      </div>
    <!--  -->
      <div class="mc-left">
        <div class="mc-left-top">
          <img src="../<?php echo $row ['profile_pic'] ?>" class="author-profile">
        </div>
        <div class="mc-left-bottom">
          <div class="flex-row upload">
            <label for="profile-pic">
              Upload a new profile picture!
            </label>
            <input type="file" name="profile-pic" class="upload-file">
          </div>
          <div class="flex-row names">
            <input type="text" name="first-name" class="headline" value="<?php echo $row ['first_name']?>" required>
            <input type="text" name="last-name" class="headline" value="<?php echo $row ['last_name']?>" required>
          </div>
          <div class="user-info">
            <div class="info-cont">
              <p class="cont-title">Likes</p>
              <p class="cont-info"><?php echo $row ['likes'] ?></p>
            </div>
            <div class="info-cont">
              <p class="cont-title">Gender</p>
              <select name="gender">
                <option <?php if ($row ['gender'] == "Male") {echo "selected";}?> value="Male">
                  Male
                </option>
                <option <?php if ($row ['gender'] == "Female") {echo "selected";}?> value="Female">
                  Female
                </option>
              </select>
            </div>
            <div class="info-cont">
              <p class="cont-title">Birthdate</p>
              <input type="date" name="birthdate" 
                value="<?php if (isset ($row ['birthdate'])) {echo $row ['birthdate'];} ?>">
            </div>
            <div class="info-cont location">
              <img src="../images//location.svg" class="location-logo">
              <select name="location">
                <?php
                  $currentProvince = $row ['province'];
                  generateProvinces($currentProvince)
                ?>
              </select>
            </div>
          </div>
          <p class="gray">Joined on <?php echo date_format(date_create($row ['date_joined']), 'F d, Y') ?></p>
        </div>
      </div>
      <div class="mc-right">
        <p class="headline white">
          Edit your profile
        </p>
        <div class="about-cont">
          <p class="sub-title">
            About Me
          </p>
          <textarea placeholder="Add a description about you..." spellcheck="false" name="about" cols="30" rows="10"><?php if (isset ($row ['about'])) {echo $row['about'];} ?></textarea>
          </p>
        </div>
        <div class="js-error-message"></div>
        <div class="flex-column">
          <button type="button" class="submit js-submit">
            Update profile!
          </button>
        </div>
        
      </div>
      <a href="./users.php?id=<?php echo $id ?>" class="close-button"> 
        <p class="white">x</p>
      </a>
    </form>
  </main>
  <script src="../scripts/sub-pages/edit-users.js"></script>
</body>
</html>

<?php
  if (isset ($_POST ['submit'])) {
    /* INFO */
    $fname = $_POST ['first-name'];
    $lname = $_POST ['last-name'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $location = $_POST ['location'];
    $about = trim($_POST ['about']);

    if ($about == "") {
      $about = null;
    }
    if ($location == "") {
      $location = null;
    }

    if (isset ($_FILES ['profile-pic']) && !empty ($_FILES ['profile-pic']['name'])) {
      $file = $_FILES ['profile-pic'];
      $file_name = $file['name'];
      $tmp_name = $file ['tmp_name'];
      
      $file_name_seperator = explode('.', $file_name);
      $extension = end($file_name_seperator);
      $allowed_extension = ['jpeg', 'jpg', 'png'];

      if (in_array($extension, $allowed_extension)) {
        $image_name = "PF_IMG_".strtoupper(uniqid()).'.'.$extension;
        $upload_image = "images/author-profile/".$image_name;
        $folder_upload = "../".$upload_image;
        move_uploaded_file($tmp_name, $folder_upload);

        $sql = "UPDATE `users` SET `first_name` = '$fname', `last_name` = '$lname', `gender` = '$gender', `birthdate` = '$birthdate', `province` = '$location', `profile_pic` = '$upload_image', `about` = '$about' 
          WHERE `users`.`user_id` = '$id'";
      } else {
        echo "<script>displayError (\"Only PNG/JPG/JPEG files are allowed.\")</script>";
      }
    } else {
      $sql = "UPDATE `users` SET `first_name` = '$fname', `last_name` = '$lname', `gender` = '$gender', `birthdate` = '$birthdate', `province` = '$location', `about` = '$about'
        WHERE `users`.`user_id` = '$id'";
    }

    $_SESSION ['access'] = $row ['access'];
    $_SESSION ['user_id'] = $row ['user_id'];
    $_SESSION ['first_name'] = $row ['first_name'];
    $_SESSION ['last_name'] = $row ['last_name'];
    $_SESSION ['email'] = $row ['email'];
    $_SESSION ['profile_pic'] = $row ['profile_pic'];
    echo '<script>location.href = "./users.php?id='.$id.'"</script>';
    $conn->query($sql) or die ($conn->error);
    $conn->close();
  }
  
?>