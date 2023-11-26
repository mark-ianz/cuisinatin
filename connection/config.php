<?php
  function connect () {
    $host = 'localhost';
    $user = 'root';
    $password = '1q!2w@3e#';
    $db = 'cuisinatin';

    $conn = new mysqli($host, $user, $password, $db);

    if ($conn->connect_error) {
      echo "Connection Error :(";
    } else {
      return $conn;
    }
  };
?>