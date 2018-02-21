<?php
  $name = "$_POST[name]";
  $pass = "$_POST[password]";
  $email = "$_POST[email]";
  
  $i = 0;

  $conn = mysqli_connect("localhost", "root", "7rawfish", "users");

  if (!$conn) {
    die("ayy lmao\n");
  }

  // this is the correct syntax for insert command
  $info = "INSERT INTO info VALUES ('$name','$pass','$email')";
  $query = "SELECT * FROM info";
  
//  $prof_info = "INSERT INTO profile VALUES ('$name')";

// this is where i need to put the checking for doubles
  if ($result = mysqli_query($conn, $query)) {
    print("wot m8\n");
    while (($row = mysqli_fetch_row($result))) {
      print("woah dere\n");
      if ($row[$i] == $email) {
	print("double value\n");
	die("double\n");
      }
      $i = $i + 1;
    }
  }
  if ((mysqli_query($conn, $info)) == "$email") {
    print("double value\n");
//  require("double_user.html");
  }
  print("signed up\n");
  //   require("registered.html");

  mysqli_close($conn);

?>
