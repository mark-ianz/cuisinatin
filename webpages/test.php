<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="<?php $_SERVER ['PHP_SELF'] ?>" method="post">
    <input type="date" name="birthdate" value="aaaa">
    <input type="submit" value="Submit" name="submit">
  </form>
</body>
</html>

<?php
  if (isset ($_POST ['submit'])) {
    if ($_POST ['birthdate'] == '') {
      $birthdate = null;
      if (!$birthdate) {
        echo "null";
      }
    }
  }

?>