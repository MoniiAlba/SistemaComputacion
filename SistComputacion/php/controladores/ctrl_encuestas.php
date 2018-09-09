<?php
require_once 'ctrl_alumnos.php';
require_once 'ctrl_telefonos.php';
require_once 'ctrl_preparatorias.php';

function insertarEncuestas(){
	global $msql;
	$conn = $msql->conn;
	$params = array("id");
	try{
		if( issetArrPost( $params ) ){
            $datos = file_get_contents('https://script.google.com/macros/s/AKfycbzJ0H7RAEgtFc71VqwNh87hlEXgo54uUpjOo0RD9tmklX8OjL23/exec?id='
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
                    "beca" => $dato["Porcentaje de ayuda financiera"],
                    "nombre"=>$dato["Nombre"],
                    "apellidoP"=>$dato["Apellido Paterno"],
                    "apellidoM"=>$dato["Apellido Materno"],
                    "programa"=>$dato["Programa inscrito"],
                    "email"=>$dato["Email"],
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
                    $id = json_decode(insertaAlumno(), true);
                    if(array_key_exists("idAlum", $id)){
                        $obj = array(
                            "cuAlum"=>$dato["Clave unica"],
                            "descripcion"=>"Telefono domicilio",
                            "telefono"=>$dato["Telefono domicilio"]);
                        $_POST = $obj;
                        insertaTelefono();
                        $_POST["descripcion"] = "Telefono movil";
                        $_POST["telefono"] = $dato["Telefono movil"];
                        insertaTelefono();
                        $obj= array(
                            "cuAlum"=>$dato["Clave unica"],
                            "nombrePrep"=>$dato["Preparatoria de procedencia"],
                            "promedio"=>"",
                            "comoConocioItam"=>"",
                            "tomoTutoria"=>"");
                        $_POST = $obj;
                        insertaPrepAlum_cu();

                    }
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