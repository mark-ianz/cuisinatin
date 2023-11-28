<?php
  if (isset ($_POST['submit'])) {
    session_start();
    session_destroy();
    echo $_SERVER ['PHP_SELF'];
  }
  header("Location: ./feed.php");
?>