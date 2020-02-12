
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="CSS/leanevent.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="CSS/leanevent.css" media="screen and (max-width:480px) "/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
</head>
<body>
		<header>
		<div class="column"><img src="images1/logo-blanco.png" alt="pic" class="logo"></div>
		<div class="column" id="c2"><strong>LEANEVENTOS</strong></div>
		<pre><nav class="na"><strong>
		<a href="IndiviHome.php">Inicio</a>    <a href="IndiviProfile_1.php" class="active">Individual</a></strong>    

	</nav></pre>
	</header> 
<div class="container">
	<img src="images1/bannercontacto.jpg" alt="pic" class="imall">
	<div class="text-block1"> 
	    	<h1>PERIL </h1>
	    	<p>INICIO PERIL</p>
  	</div>
</div>
	

	
	<br><br><br><br><br><br><br>

	<div id="pro"><h3>Tu Informacion del Peril</h3></div>

	<div class="column" id="pro1">
		<span  class="fontawe">
  			<i class="fas fa-book"></i>
		</span>
		Nombres del Inscrito<br><br>
		<span  class="fontawe">
  			<i class="fas fa-book"></i>
		</span>
		Apellidos del Inscrito<br><br>
		<span  class="fontawe">
  			<i class="fas fa-user"></i>
		</span>
		Nombre del Usuario<br><br>
	</div> 

	<div class="column" id="pro2">
		<span  class="fontawe">
  			<i class="fas fa-map-marker-alt"></i>
		</span>
		198 West 21th Street,<br>
		 Suite 721 New York NY 10016<br><br>
		<span  class="fontawe">
  			<i class="fas fa-phone"></i>
		</span>
		+1235 2355 98<br><br>
		<span  class="fontawe">
  			<i class="far fa-paper-plane"></i>
		</span>
		nombredecorreo@gmail.com
	</div> 

	<div class="column" id="pro3">
		<img src="images1/user.png" width="150" height="170">
		
	</div>

	<br><br><br><br><br><br><br> <br><br><br><br><br><br><br> 
	<center>

<?php
$servername = "utacloud";
$username = "rachanan_rachana";
$password = "rachananpatil";
$dbname = "rachanan_leanevent";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
	echo "Connected";
}

$sql="SELECT * FROM indivi_profile";
var_dump($sql);

$result=mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result))

     {



?>
	

	<form action="IndiviProfile_1.php" method="post" id="ae1">

		<h3>Estar en contacto</h3><hr>

		<div class="column" id="ae2">
			<p>Nombres</p>
			<input type="text" name="first" value="<?php echo $row ['fname']; ?>" placeholder="Tu Nombre"><br><br>
			<p>Apellidos</p>
			<input type="text" name="last" value="<?php echo $row ['lname']; ?>" placeholder="Tu Apellido">
		</div>

		<div class="column" id="ae3">
			<img src="images1/user.png" width="150" height="170"><br>
			<input type="submit" value="Seleccionar Foto" id="ae4" class="button">
		</div>

		<div style="clear:both;">&nbsp;</div>

		<div id="ae5">
			<p>Correo</p>
			<input type="text" name="email" value="<?php echo $row ['mail']; ?>" placeholder="Tu correo electronico"><br>
		</div>

		<div class="column" id="ae6">
			<p>Telefono</p>
			<input type="text" name="phone" value="<?php echo $row ['phone']; ?>" placeholder="Telefono">
		</div>

		<div class="column" id="ae7">
			<p>Usuario</p>
			<input type="text" name="user" value="<?php echo $row ['username']; ?>" placeholder="Nombre de Usuario">
		</div>

		<div class="column" id="ae8">
			<p>Contrasena</p>
			<input type="text" name="pass" value="<?php echo $row ['password']; ?>" placeholder="Contrasena">
		</div>

		<div style="clear:both;">&nbsp;</div>
		<p>Note:</p>
		<p>Solo puede cambiar los datos(Telefono, Contrasena y Foto)</p>

		<div align="center"  id="ae9">
			<input type="submit" name="save" value="Guardar Cambios" id="ae10" class="button">
		</div>


	</form>
<?php

}
if(isset($_POST['save'])){

	$fi=$_POST['first'];
	$la=$_POST['last'];
	$em=$_POST['email'];
	$ph=$_POST['phone'];
	$us=$_POST['user'];
	$pa=$_POST['pass'];

$sql_1="UPDATE indivi_profile SET fname = '$fi', lname='$la',mail = '$em', phone='$ph',username = '$us', password='$pa' WHERE indivi_profile.fname='$fi'";

	$result_1=mysqli_query($conn,$sql_1);
	var_dump($result_1);
	if($result_1){
		echo $success="New Record updated";

	}
	else{
		echo $failure="Not updated".mysqli_error($conn);	
	}

}
?>


</center>



<br><br><br><br><br><br><br>

<center id="hpf">
	Copyright &copy; 2019 All rights reserved! This web is made with <i class="far fa-heart"></i> by Diaz Apps
	</center>
</body>
</html>

