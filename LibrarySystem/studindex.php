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
	 text: "Login Succesfuly",
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
 text: "Student ID number doesnt exist",
 icon: "error",
 button: "Close!",
});

  </script>

  </body>
  </html>
  ';

}

if(isset($_POST['Confirm'])){

                $idnumber=$_POST['idnumber'];

                    $sql="SELECT * FROM `studentinfo` WHERE idnumber like '$idnumber'";
                    $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                      // output data of each row
                        while($row = $result->fetch_assoc()) {

                         echo '<script type="text/javascript">
                              window.location.href = "stud1.php";
                              </script>
                         ';
                         mysqli_close($conn);
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

  <title>Student</title>
  <link href="css/stud.css" rel="stylesheet" type="text/css">
    <script src="js/sw.js"></script>
</head>
<body>




  <header>
      <!--LOGO  -->
  </header>


  <section class="home-hero">
    <div class="_content">
    <h1 class="change">Input ID number:</h1>
      <form method="POST" Action="" class="Process">
      <ul class="_responsiveButton">
        <li><input type="text" name="idnumber" class="inputText">
        <li><button class="button button-accent" type="submit" name="Confirm">Confirm</button>
      </ul>
    </form>
    </div>
  </section>



</body>
</html>
