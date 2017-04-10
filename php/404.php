<?php

include('connect.php');

session_start();

if (!$conn) {
  echo "Error: Unable to connect to MySQL." . PHP_EOL;
  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
  exit;
}

$username = sanitize($conn, $_POST['username']);
$message = sanitize($conn, $_POST['message']);

if (empty($username) || empty($message)) {
    header("Location: https://www.apcombined.com");
    exit();
}

$sql = "INSERT INTO messages (`name`, `message`) VALUES ('" . $username . "', '$message')";
mysqli_query($conn, $sql);
header("Location: https://www.apcombined.com/");

function sanitize($link, $string) {
  $result = trim($string);
  $result = htmlspecialchars($result);
  $result = mysqli_real_escape_string($link, $result);
  return $result;
}

?>
