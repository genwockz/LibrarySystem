

<?php
$server="localhost";
$username="root";
$password="adminroot";
$dbname="LibrarySystem";
$conn = mysqli_connect($server,$username,$password,$dbname);
if(!conn){
  die("Connection Failed:".mysqli_connect_error());
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
          <td>Borrower</td>
        </tr>
          <?php
          $sql="SELECT * FROM `books`";
          $result = $conn->query($sql);
           while($row = mysqli_fetch_array($result)):?>
            <tr>
                <td><?php echo $row['bname'];?></td>
                <td><?php echo $row['aname'];?></td>
                <td><?php echo $row['_floor'];?></td>
                <td><?php echo $row['shelf'];?></td>
                <td><?php echo $row['row'];?></td>
                <td><?php echo $row['avail'];?></td>
                <td><?php echo $row['borrower'];?></td>
            </tr>
          <?php endwhile;?>
      </table>
      </div>
      <br>






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
