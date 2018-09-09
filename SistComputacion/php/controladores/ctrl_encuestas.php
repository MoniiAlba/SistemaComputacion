<?php
require_once 'ctrl_alumnos.php';

function insertarEncuestas(){
	global $msql;
	$conn = $msql->conn;
	$params = array("id");
	try{
		if( issetArrPost( $params ) ){
            $datos = file_get_contents('https://script.google.com/macros/s/AKfycbxY96kmv9rHGLenpunJUXvphGGPRjN3fY-_HChz_zXBEQHIhXAr/exec?id='
                        .$_POST["id"]);

            if($datos === FALSE) { 
                $res = jsonErr("Error de forms");
            }
            else
            {   
                $res = array();
                $datos = json_decode($datos, true);

                foreach($datos as $dato){
                    $obj = array(
                    "cu"=>$dato["Clave unica"],
                    "beca" => "",
                    "nombre"=>$dato["Nombre"],
                    "apellidoP"=>$dato["Apellido Paterno"],
                    "apellidoM"=>$dato["Apellido Materno"],
                    "programa"=>"",
                    "email"=>"",
                    "estado"=>"",
                    "calle"=>"",
                    "colonia"=>"",
                    "delegacion"=>"", 
                    "cp"=>"",
                    "numExt"=>"",
                    "numInt"=>"",
                    "pais"=>"",
                    "ciudad"=>"");
                    $_POST = $obj;
                    $id = insertaAlumno();
                    $res[] = $id;
                }
            
                return jsonArr($res); 
            }

		}
		else 
			$res = jsonErr("Error en parametros");
	}
	catch(PDOException $e){
		//$res = jsonErr($e->getMessage());
		$res = $e;
	}

	return $res;
}
?>