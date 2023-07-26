<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todo";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST["submit"])){

    $titre=htmlspecialchars($_POST["titre"]);

    $sql = "INSERT INTO `taches` (titre) VALUES ('$titre')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      header("location:index.html");
}else{
    echo "error";
}
mysqli_close($conn);


?>