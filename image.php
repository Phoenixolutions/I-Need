<?php

  session_start();
  $user = $_SESSION["username"];
  print($_SESSION["username"]);
  // home page would not require this

  $query = "SELECT email FROM info INNER JOIN users.profile WHERE profile.username=info.username AND email='$user'";
  $image_query = "SELECT image FROM profile INNER JOIN users.info WHERE profile.username=info.username";
//  echo "$query";

  $conn = mysqli_connect("localhost","root","7rawfish","users");
  
  if (!$conn) {
    die("wot");
  }
  
  $result = mysqli_query($conn, $query);
  
// loop until the correct image is found
  $i = 0;
  echo $i;
  while ($row = mysqli_fetch_row($result)) {
    echo $i;
    // probably have to make another query here
    if ($row[$i] == $user) {
      $image_result = mysqli_query($conn, $image_query);
      $image = mysqli_fetch_field($image_result);
      // row contains the email, not the username
      break;
    }
    $i = $i + 1;
    echo $i;
  }

  echo "<img src='$image' alt='pupper' width='200' height='200'>";
  echo "<form action='log_out.php' method='post'><input type='submit' value='Log Out'></form>";

/*
  <?php

  $query = "SELECT image FROM profile";

  $conn = mysqli_connect("localhost","root","7rawfish","users");
  
  if (!$conn) {
    die("wot");
  }
  
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_row($result);

  echo "<img src='$row[0]' alt='pupper' width='200' height='200'>";

  ?>
*/

?>