<?php
session_start();
if ($_SESSION["loggedin"]) {
  header("Location: index.html");
  exit;
} else {
  // Show error
}
?>
