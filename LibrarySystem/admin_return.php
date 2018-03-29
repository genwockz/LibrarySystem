<?php
$server="localhost";
$username="root";
$password="adminroot";
$dbname="LibrarySystem";
$conn = mysqli_connect($server,$username,$password,$dbname);
if(!conn){
  die("Connection Failed:".mysqli_connect_error());
}


function id_success(){
  echo '
	<html>
<head>
<script src="sw.js"></script>
</head>
<body>
<script type="text/javascript">

	 swal({
	 title: "Welcome",
	 text: "Login Succesfuly",
	 icon: "success",
	 button: "Close!",
	 });

</script>

</body>
</html>
';
}



function id_failed(){
  echo '
  <html>
  <head>
  <script src="sw.js"></script>
  </head>
  <body>
  <script type="text/javascript">

  swal({
 title: "Opppps ! Snap :(",
 text: "Student ID number doesnt exist",
 icon: "error",
 button: "Close!",
});

  </script>

  </body>
  </html>
  ';

}

function R_success(){
  echo '
	<html>
<head>
<script src="sw.js"></script>
</head>
<body>
<script type="text/javascript">

	 swal({
	 title: "Welcome",
	 text: "Return Succesfuly",
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
 text: "The Student didnt issue this book",
 icon: "error",
 button: "Close!",
});

  </script>

  </body>
  </html>
  ';

}


if(isset($_POST['Return'])){


$idnumber = $_POST['idnumber'];
$bname = $_POST['book'];

  $sql="SELECT * FROM `books` WHERE avail like 'No' AND bname like '$bname'";
  $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row


    $sql2="SELECT * FROM `books` WHERE avail like 'No' AND bname like '$bname' ";
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
    // output data of each row

      $sql1 = "UPDATE books SET borrower='N/A',avail='yes' WHERE bname='$bname'";
      if ($conn->query($sql1) === TRUE) {
        R_success();
        } else {
        echo "Error updating record: " . $conn->error;
        }

        }



}else{

      _failed();
  }





}

?>




<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Find a book</title>
  <link href="css/admin1.css" rel="stylesheet" type="text/css">
    <script src="js/sw.js"></script>
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

        <h1 class="change">Return a book</h1>
          <form method="POST" Action="" class="Process">
          <ul class="_responsiveButton">
            <li><input type="text" name="idnumber" class="inputText" placeholder="ID number">
            <li><input type="text" name="book" class="inputText" placeholder="Name of the book">
            <li><button class="button button-accent" type="submit" name="Return">Return</button>
          </ul>
        </div>
      </section>



</body>
</html>
