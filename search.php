<?php
  $keyword = $_GET["keyword"];
  $i = 0;
//  $db = $_GET["'$database'"]; ???
//  $table = ???

  if ($keyword == "music") {
    $query = "SELECT * FROM services.tutoring INNER JOIN users.profile WHERE music=true";
  }
  else if ($keyword == "trainer") {
    $query = "SELECT * FROM services.fitness INNER JOIN users.profile WHERE trainer=true";
  }
  // more else-ifs
  
  // connect to mysql database "services"
  $conn = mysqli_connect("localhost","root","7rawfish","services");
  
  if (!$conn) {
    die("connect failed\n");
  }
  
  $result = mysqli_query($conn, $query);
  // run through "services" searching for matches
  while ($row = mysqli_fetch_row($result)) {
    print($row[$i]);
    $i = $i + 1;
    // if a match occurs, pull it from database into an array
/*    if () {
    
    }
*/
  }
    
  // after loop, prints contents of array to new html file
  
?>
