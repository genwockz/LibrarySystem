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
	 text: "Book Added Succesfuly",
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

    $floor=$_POST['slct1'];
    $shelf=$_POST['slct2'];
    $bookname=$_POST['bookname'];
    $authorname=$_POST['authorname'];
    $row=$_POST['row'];
    $avail="yes";
    $borrower="N/A";

  if($floor==""||$floor=="Choose what floor"||$shelf==""||$shelf=="Shelf"||$shelf=="shelf"||$bookname==""||$authorname==""||$row==""||$row==0||$row>6 ){
  _failed();
  }else{

  //
  // $sql="SELECT * FROM `books` WHERE idnumber like '$idnumber'";
  // $result = $conn->query($sql);
  //
  // if ($result->num_rows > 0) {
  // // output data of each row
  // while($row = $result->fetch_assoc()) {
  // if($idnumber==$row["idnumber"]){
  //   echo '
  //   <html>
  //   <head>
  //   <script src="sw.js"></script>
  //   </head>
  //   <body>
  //   <script type="text/javascript">
  //
  //   swal({
  //  title: "Opppps ! Snap :(",
  //  text: "The ID number is already existing!",
  //  icon: "error",
  //  button: "Close!",
  // });
  //
  //   </script>
  //
  //   </body>
  //   </html>
  //   ';
  // }
  //
  // }
  // }else{


    //add to db
    mysqli_query($conn,"INSERT INTO books(bname,aname,_floor,shelf,row,avail,borrower)VALUES('$bookname','$authorname','$floor','$shelf','$row','$avail','$borrower')");

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

    // }




  }













}

?>


<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Find a book</title>
  <link href="css/admin_book.css" rel="stylesheet" type="text/css">
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

        <h1 class="change">Add a Book</h1>
        <form method="POST" Action="" class="Process">
                <ul class="_responsiveButton">
                  <li><input type="text" name="bookname" class="inputText" placeholder="Book name">
                  <li><input type="text" name="authorname" class="inputText" placeholder="Author Name">
                  <li>
                    <select id="slct1" name="slct1" class="floor" onchange="populate(this.id,'slct2')">
                          <option value="">Choose what floor</option>
                          <option value="3">Third Floor</option>
                          <option value="2">Second Floor</option>
                    </select>
                  </li>
                  <li>
                    <select id="slct2" class="floor" name="slct2"></select>
                  </li>
                  <li><input type="number" name="row" class="inputText" placeholder="row in the shelf" min="1" max="6">
                  <li><button class="button button-accent" type="submit" name="Add">ADD</button>
                </ul>
          <form>
        </div>
      </section>

<script type="text/javascript">

function populate(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	s2.innerHTML = "";
	if(s1.value == "Chevy"){
		var optionArray = ["|","camaro|Camaro","corvette|Corvette","impala|Impala"];
	} else if(s1.value == "2"){
		var optionArray = ["shelf|Shelf","1|1","2|2","3|3","4|4","5|5","5|5","6|6","7|7","8|8","9|9","10|10","11|11","12|12","13|13","14|14","15|15","16|16","17|17","18|18","19|19","20|20","21|21","22|22","23|23","24|24","25|25"];
	} else if(s1.value == "3"){
		var optionArray = ["shelf|Shelf","1|1","2|2","3|3","4|4","5|5","5|5","6|6","7|7","8|8"];
	}
	for(var option in optionArray){
		var pair = optionArray[option].split("|");
		var newOption = document.createElement("option");
		newOption.value = pair[0];
		newOption.innerHTML = pair[1];
		s2.options.add(newOption);
	}
}

</script>


</body>
</html>
