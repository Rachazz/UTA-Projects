<!DOCTYPE html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/leanevent.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="CSS/leanevent.css" media="screen and (max-width:480px) "/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	<header>
		<div class="column"><img src="images1/logo-blanco.png" alt="pic" class="logo"></div>
		<div class="column" id="c2"><strong>LEANEVENTOS</strong></div>
		<pre><nav class="na">
		<a href="Homepage1.php">Inicio</a>    <a href="AboutUs.php">Quienes Somos</a>    <a href="http://rachananpatil.uta.cloud/lean-event/">Blog</a>    <a href="SignUp.php">Registrate</a>    <a href="ContactUs.php" class="active">Contacto</a>    <a href="Login1.php">Iniciar Sesion</a>    <a href="BuyFromUs.php">Comprar Boletos</a> 

	</nav></pre>
	</header>  
	<br><br>
	
<div class="container">
	<img src="images1/bannercontacto.jpg" alt="pic" class="imall">
	<div class="text-block1"> 
	    	<h1>CONTACTO</h1>
	    	<p>INICIO CONTACTO</p>
  		</div>
</div>
<center><div id="cu">
<p><b>Informacion del contacto</b></p>
	<div class="column">
		<span  class="fontawe">
  			<i class="fas fa-map-marker-alt"></i>
		</span>
		198 West 21th Street,<br>
		 Suite 721 New York NY 10016
	</div>
	<div class="column">
		<span  class="fontawe">
  			<i class="fas fa-phone"></i>
		</span>
		+1235 2355 98
	</div>
	<div class="column">
		<span  class="fontawe">
  			<i class="far fa-paper-plane"></i>
		</span>
		info@diazapps.com
	</div>
	<div class="column">
		<span  class="fontawe">
  			<i class="fas fa-globe"></i>
		</span>
		diazapps.com
	</div>
	<br>
	<br><br><br>
	<p>LEAN en las redes sociales</p>
	<br>
	<div class="column1">
		<img src="images1/facebook.png" alt="pic" id="culogo">
		<p id="fon">LEAN Ayuda Humanitaria</p>
	</div>
	<div class="column1">
		<img src="images1/twitter.png" alt="pic" id="culogo">
		<p id="fon">@LeanEmergente</p>
	</div>
	<div class="column1">
		<img src="images1/instagram.png" alt="pic" id="culogo">
		<p id="fon">@LeanAyudaHumanitaria</p>
	</div>
	<div class="column1">
		<img src="images1/correo.png" alt="pic" id="culogo">
		<p id="fon">lean.emergente@gmail.com</p>
	</div>
</div>
	<br>
	<br><br><br><br><br>
	
		<form action="#" method="post" id="f_cu" name="isform" onsubmit="return validate()">
			<h3 align="left">Estar en contacto</h3>
			<div class="column" id="cu1">
				<h5>Nombre</h5>
				<input type="text" name="fname" value="" placeholder="Tu Nombre">
			</div>
	  		<div class="column" id="cu2">
	  			<h5>Appellido</h5>
				<input type="text" name="lname" value="" placeholder="Tu Appellido">
	  		</div>
	  		<div style="clear:both;">&nbsp;</div>
	  		<div id="cu3">
				<h5>Correo</h5>
				<input type="text" name="mail" value="" placeholder="Tu correo electronico">
			</div>
			<div  id="cu4">
				<h5>Tema</h5>
				<input type="text" name="topic" value="" placeholder="Su asunto de este mensaje">
			</div>
			<div  id="cu5">
				<h5>Mensaje</h5>
				<input type="text" name="message" value="" placeholder="Di algo sobre nosotros" id="cu7">
			</div>
			<div id="cu6" align="center">
				<input type="submit" name="insert" value="Enviar mensaje" class="button" onclick="return validate()" >
	  		</div>
		
	    </form>
    </center>
	
<br><br><br><br><br><br><br><br><br><br><br>
<center>LEAN EN LAS REDES SOCIALES</center><br>
	<center>
		<span  style="font-size: 2em; color: yellow">
  			<i class="fab fa-twitter"></i>
		</span>
		<span style="font-size: 2em; color: yellow">
  			<i class="fab fa-facebook-f"></i>
		</span>
		<span style="font-size: 2em; color: yellow">
  			<i class="fab fa-instagram"></i>
		</span>
	</center><br><br><br><br>
	<center id="hpf">
	Copyright &copy; 2019 All rights reserved! This web is made with <i class="far fa-heart"></i> by Diaz Apps
	</center>                                                    
<script src="SCRIPT/script3.js">
</script>	

</body>
</html>

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

	if(isset($_POST['insert'])){

	$fn=$_POST['fname'];
	$ln=$_POST['lname'];
	$m=$_POST['mail'];
	$to=$_POST['topic'];
	$me=$_POST['message'];
	

$sql="INSERT INTO contactus(fname,lname,email,topic,message) VALUES ('$fn','$ln','$m','$to','$me')";
var_dump($sql);

$result=mysqli_query($conn,$sql);
	var_dump($result);
	if($result){
		echo $success="New Record inserted";

	}
	else{
		echo $failure="Not inserted".mysqli_error($conn);	
	}

}

mysqli_close($conn);

?>
