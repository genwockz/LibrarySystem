<?php
$server="localhost";
$username="root";
$password="adminroot";
$dbname="LibrarySystem";
$conn = mysqli_connect($server,$username,$password,$dbname);
if(!conn){
  die("Connection Failed:".mysqli_connect_error());
  }
	echo "connected";



  //create a database for the 1st time

  	// $sql="CREATE DATABASE LibrarySystem";
    //
  	// 	if(mysqli_query($conn,$sql)){
  	// 		echo "Created Succesfuly";
  	// 	}else{
  	// 		echo "ERROR:".mysqli_error($conn);
  	// 	}


  //create a table in your db or variables
  //
  // $sql ="CREATE TABLE admins(
  // id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  // username VARCHAR(30) NOT NULL,
  // password VARCHAR(30) NOT NULL
  // )";
  // if(mysqli_query($conn,$sql)){
  // 	echo "Succesfuly added";
  // }else{
  // 	echo "error".mysqli_error($conn);
  //
  // }

  mysqli_query($conn,"INSERT INTO admins(username,password)VALUES('Administrator/Gen','c@rc3d0')");
  if(mysqli_affected_rows($conn) > 0){
echo "<p>Student Added</p>";
echo '<a href="studentform.php">Go Back</a>';
} else {
echo "student NOT Added<br />";
echo mysqli_error ($conn);
}

mysqli_close($conn);




?>
