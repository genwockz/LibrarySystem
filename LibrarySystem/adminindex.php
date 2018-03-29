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
 text: "Incorrect username or password",
 icon: "error",
 button: "Close!",
});

  </script>

  </body>
  </html>
  ';

}

if(isset($_POST['Confirm'])){

                $username=$_POST['username'];
                $password=$_POST['password'];






                    $sql="SELECT * FROM `admins` WHERE username like '$username' AND password like '$password'";
                    $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                      // output data of each row
                        while($row = $result->fetch_assoc()) {

                         echo '<script type="text/javascript">
                              window.location.href = "admin1.php";
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

  <title>LibrarySystem</title>
  <link href="css/admin.css" rel="stylesheet" type="text/css">
  <script src="js/sw.js"></script>

</head>
<body>

  <header>
      <!--LOGO  -->
  </header>


  <section class="home-hero">
    <div class="_content">
    <h1 class="change">Log in as:</h1>
    <form method="POST" Action="" class="Process">
      <ul class="_responsiveButton">
        <li><input type="text" name="username" class="inputText"  placeholder="Username">
        <li><input type="password" name="password" class="inputText"  placeholder="Password">
        <li><button class="button button-accent" type="submit" name="Confirm">Confirm</button>
      </ul>
    </form>
    </div>
  </section>



</body>
</html>
