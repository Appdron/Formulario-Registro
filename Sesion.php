<!Doctype html>
<html>
<head>
<link rel="stylesheet"href="../Estilos/Estilo_1.css"/>

<head>
<body bgcolor="blue">
<?php
session_Start();
//include ("Conexion.php");
$host="localhost";
$user="Gonzalo";
$pw="gocaocampero";
$bd="registro_actividades_espirituales";
$Telefono=$_POST['F_Telefono'];
$Pasw=$_POST['F_Pasword'];
if (isset($Telefono)&&!empty($Telefono)&&isset($Pasw)&&!empty($Pasw)) 
{
	$conexion=mysqli_connect($host,$user,$pw)or die("error". $mysqli->connect_errno);
	if($conexion==true)//o simplemente if($conexion)
	{
//echo " conectando al servidor... espere un momento<br>";
		$BaseDatos=mysqli_select_db($conexion,$bd)or die("error con la base de datos  ".$mysqli->connect_errno);
		if ($BaseDatos==true) 
		{
			# code...
			//echo "Conectando a la base de datos... aguarde<br>";
			$seleccionar=mysqli_query($conexion,"SELECT Telefono,Pasword FROM Usuarios_registro_ae where Telefono='$Telefono'");
	    		$vector=mysqli_fetch_array($seleccionar);
		    	if ($vector['Telefono']==$Telefono &&$vector['Pasword']==$Pasw) 
		    	{
		    	  	//echo "<img src='../imagenes/spinner-ani48.gif'>";
		    	  	$_SESSION['PasarPasw']=$Pasw;
		    		echo "<meta http-equiv=Refresh content=\"0; url=Panel_Principal.php\" />";
		    		
		    	}
		    	else
		    	{
		    		echo "Error...El usuario no existe";
		    		echo "<meta http-equiv=Refresh content=\"0; url=error.php\" />";
		    	}
		}
		else{echo "no se ha podido conectar a la base de datos...";}
	}
	else
	{
		echo "no se ha conectado";
	}
	mysqli_close($conexion);
}
else
{
	echo "Uno de los campos de texto esta vacio";
	echo "<meta http-equiv=Refresh content=\"0; url=Error.html\" />";
}

?>

</body>
</html>
