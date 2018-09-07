<?php 
require 'config.php';
require 'bd.php';
require 'util.php';
//equire 'auth.php';
//require 'controladores/ctrl_alumnos.php';
ini_set('default_charset', 'utf-8');
$msql = new bd($bdConfig);

limpiaParams(); // Sólo limpia $_GET o $_POST
session_start();// Allow from any origin

header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Origin: http://localhost:8080");
header("Access-Control-Allow-Headers: Content-Type, *");


$json = file_get_contents('php://input'); 
$_POST = json_decode($json, true);
if(isset($_POST['func'])){
	if(in_array( $_POST['func'] , $funcionesRegistradas["authPublico"])){
		require_once("auth.php");
		echo $_POST['func']();
	}
	elseif(isset($_SESSION['login'])){

		if( isset($_POST["dominio"]) ){
		
			if( array_key_exists($_POST["dominio"], $funcionesRegistradas) and 
				in_array( $_POST["func"], $funcionesRegistradas[$_POST["dominio"]] ) ){
				require_once($rutasRegistradas[$_POST["dominio"]]);
				echo $_POST["func"]();
			}
			else
				echo jsonErr("funcion o dominio no existente");
		}
		else
			echo jsonErr("Sin dominio especificado");

	}
	else{
		//echo "prueba9";
		echo jsonErr('Acceso denegado');
	}
	//echo '\n session : '.session_id();
}
else
	echo jsonErr("Sin funcion especificada");
//echo jsonErr('Acceso denegado');
//echo 'hola fin';
//print_r( $_POST);



 ?>
