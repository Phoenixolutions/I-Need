<?php
  $logged_in = false;
  $name = "$_POST[email]";
  $pass = "$_POST[password]";
  
  $sel = "SELECT * FROM info";

  $conn = mysqli_connect("localhost", "root", "7rawfish", "users");
  if (!$conn) {
    die("failed\n");
  }

  $query = mysqli_query($conn, $sel);
  if (!$query) {
    die("query failed\n");
  }

  // Search table in mysql database
  while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    // when username and passwords match, loop ends
    if ($name == $row["email"] && $pass == $row["password"]) {
      $logged_in = true;
      session_start();
      $_SESSION["username"] = $name;
      //print("Logged in as $name");
      // need to convert other documents as well
      require("image.php");
      break;
    }
  }
  // if no match found, login fails, and user is kicked out to login failed page
  if (!$logged_in) {
    //require("failed_log_in.html");
    die("");
  }

  // anything else that goes after starts here
  mysqli_close($conn);
?>