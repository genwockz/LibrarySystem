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
	 text: "Found Succesfuly",
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
 text: "Does not exist",
 icon: "error",
 button: "Close!",
});

  </script>

  </body>
  </html>
  ';

}


if(isset($_POST['Search'])){

$bname = $_POST['nameofthebook'];


  $sql="SELECT * FROM `books` WHERE bname like '%".$bname."%'";
  $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
        R_success();


  }else  if ($bname=="") {
      $sql="SELECT * FROM `books`";
      $result = $conn->query($sql);
    }else{

      _failed();
  }





}else if(isset($_POST['Confirm'])){


                      $bookname=$_POST['book'];
                      $idnumber=$_POST['idnum'];
                      $sql="SELECT * FROM `studentinfo` WHERE idnumber like '$idnumber'";
                      $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                        // output data of each row

                    }else{
                        id_failed();
                          }


                    $sql2="SELECT * FROM `books` WHERE avail like 'yes' AND bname like '$bookname' ";
                    $result2 = $conn->query($sql2);

                    if ($result2->num_rows > 0) {
                    // output data of each row

                      $sql1 = "UPDATE books SET borrower='$idnumber',avail='No' WHERE bname='$bookname'";
                      if ($conn->query($sql1) === TRUE) {
              R_success();
          } else {
              echo "Error updating record: " . $conn->error;
          }

                    }else{
                      echo 'not available';
                      }




}else{

  $sql="SELECT * FROM `books`";
  $result = $conn->query($sql);

}




?>




<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Issue a book</title>
  <link href="css/admin_issue.css" rel="stylesheet" type="text/css">
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

        <h1 class="change">Issue a Book:</h1>
          <form method="POST" Action="admin_issue.php" class="Process">
          <ul class="_responsiveButton">
            <li><input type="text" name="nameofthebook" class="inputText">
            <li><button class="button button-accent" type="submit" name="Search">Search</button>
          </ul>
        </div>
      </section>

      <section class="search-book">

        <h1 class="change">Search Values:</h1>

    <div class="_content1">

              <table id="myTable">
              <tr>
                <td>Book name</td>
                <td>Author</td>
                <td>Floor</td>
                <td>Shelf</td>
                <td>Row</td>
                <td>Availability</td>

              </tr>
              <?php while($row = mysqli_fetch_array($result)):?>
                <tr>
                    <td><?php echo $row['bname'];?></td>
                    <td><?php echo $row['aname'];?></td>
                    <td><?php echo $row['_floor'];?></td>
                    <td><?php echo $row['shelf'];?></td>
                    <td><?php echo $row['row'];?></td>
                    <td><?php echo $row['avail'];?></td>

                </tr>
              <?php endwhile;?>
            </table>

      </div>
      <br>



      <script>
      function myFunction() {
          var table = document.getElementById("myTable");
          var row = table.insertRow(0);
          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
          cell1.innerHTML = "NEW CELL1";
          cell2.innerHTML = "NEW CELL2";
      }
      </script>


        </div>



      </section>

      <section class="footer-bg">

        <div class="_content">
        <h1 class="change">Issue a Book:</h1>
          <ul class="_responsiveButton">
            <li><input type="text" name="book" class="inputText" placeholder="Name of the book"></li>
            <li><input type="text" name="idnum" class="inputText" placeholder="Idnumber"></li>
            <li><button class="button button-accent" type="submit" name="Confirm">Submit</button>
          </ul>

              </form>
        </div>

      </section>



</div>

<script type="text/javascript">

 var a = document.getElementById("navButton");
// function openPopup(){
//
//   a.style.transform = translateX(0);
//
// }

function open(){
  alert('hello');


}


</script>

</body>
</html>
