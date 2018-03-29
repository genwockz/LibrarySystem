<?php
$server="localhost";
$username="root";
$password="adminroot";
$dbname="LibrarySystem";
$conn = mysqli_connect($server,$username,$password,$dbname);
if(!conn){
  die("Connection Failed:".mysqli_connect_error());
}


function _success(){
  echo '
	<html>
<head>
<script src="sw.js"></script>
</head>
<body>
<script type="text/javascript">

	 swal({
	 title: "Welcome",
	 text: "Added Succesfuly",
	 icon: "success",
	 button: "Close!",
	 });

</script>

</body>
</html>
';
}



function _failed(){
  echo '
  <html>
  <head>
  <script src="sw.js"></script>
  </head>
  <body>
  <script type="text/javascript">

  swal({
 title: "Opppps ! Snap :(",
 text: "Please fill all the textfields",
 icon: "error",
 button: "Close!",
});

  </script>

  </body>
  </html>
  ';

}


if(isset($_POST['Add'])){


  $idnumber=$_POST['idnumber'];
  $lname=$_POST['surname'];
  $fname=$_POST['name'];



if($idnumber==""||$lname==""||$fname=="" ){
_failed();
}else{


$sql="SELECT * FROM `studentinfo` WHERE idnumber like '$idnumber'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
if($idnumber==$row["idnumber"]){
  echo '
  <html>
  <head>
  <script src="sw.js"></script>
  </head>
  <body>
  <script type="text/javascript">

  swal({
 title: "Opppps ! Snap :(",
 text: "The ID number is already existing!",
 icon: "error",
 button: "Close!",
});

  </script>

  </body>
  </html>
  ';
}

}
}else{


  //add to db
  mysqli_query($conn,"INSERT INTO studentinfo(fname,lname,idnumber)VALUES('$fname','$lname','$idnumber')");

  if(mysqli_affected_rows($conn) > 0){
  _success();
  } else {
    echo '
    <html>
    <head>
    <script src="sw.js"></script>
    </head>
    <body>
    <script type="text/javascript">

    swal({
    title: "Opppps ! Snap :(",
    text: "Error adding the student",
    icon: "error",
    button: "Close!",
    });

    </script>

    </body>
    </html>
    ';
  echo mysqli_error ($conn);
  }

  mysqli_close($conn);

  }




}









}





?>





<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Find a book</title>
  <link href="css/admin1.css" rel="stylesheet" type="text/css">
</head>

<body>
  <label for="menuToggle" class="menuicon">&#9776;</label>


  <input type="checkbox" id="menuToggle">
  <input type="checkbox" id="menuToggle2">

<nav class="nav-button" id="navButton">
  <ul>
    <li><a href="admin1.php">Find a Book</a></li>
    <li><a href="admin_addstud.php">Add Students</a></li>
    <li><a href="admin_addbook.php">Add Books</a></li>
    <li><a href="admin_issue.php">Issue Books</a></li>
    <li><a href="admin_return.php">Return Books</a></li>
    <li><a href="admin_view.php">View Books</a></li>
    <li><a href="index.php">Log out</a></li>
  </ul>
    <label for="menuToggle" title="Close this navigation bar" class="nav-close-button">x</label>
</nav>

<div class="container-all">

      <header>
          <!--LOGO  -->
      </header>


      <section class="home-hero">
        <div class="container-hamburger">

        </div>
        <div class="_content">

        <h1 class="change">Add a Student</h1>
          <form method="POST" Action="" class="Process">
          <ul class="_responsiveButton">
            <li><input type="text" name="surname" class="inputText" placeholder="Surname">
            <li><input type="text" name="name" class="inputText" placeholder="First Name">
            <li><input type="text" name="idnumber" class="inputText" placeholder="ID number">
            <li><button class="button button-accent" type="submit" name="Add">ADD</button>
          </ul>
        </form>
        </div>
      </section>



</body>
</html>
