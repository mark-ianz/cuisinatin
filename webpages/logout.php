<<<<<<< HEAD
<?php
  if (isset ($_POST['submit'])) {
    session_start();
    session_destroy();
  }
  if (isset ($_SERVER ['HTTP_REFERER'])) {
    header("Location: ".$_SERVER ['HTTP_REFERER']);
  } else {
    header("Location: ./feed.php");
  }
=======
<?php
  if (isset ($_POST['submit'])) {
    session_start();
    session_destroy();
  }
  if (isset ($_SERVER ['HTTP_REFERER'])) {
    header("Location: ".$_SERVER ['HTTP_REFERER']);
  } else {
    header("Location: ./feed.php");
  }
>>>>>>> origin/main
?>