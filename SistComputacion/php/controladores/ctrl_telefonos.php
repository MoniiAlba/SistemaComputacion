<?php

//regresa todos los telefonos
function telefonos(){
	global $msql;
	$res = $msql->cons("select * from telefonosAlumnos");
	return json($res);
}

//func = telefonos_cu ;params= cuAlum; regresa telefonos de alumno
function telefonos_cu(){
    global $msql;
	$conn = $msql->conn;
	$params = array("cuAlum");
	try{
		if( issetArrPost( $params ) ){

			$stmt = $msql->sqlPrepPost("SELECT * from alumnos where cu = :cuAlum", 
									array("cuAlum"));
			$stmt->execute();

			if($stmt->rowCount() > 0){
				$alum = $stmt->fetch(PDO::FETCH_ASSOC);
				$_POST["idAlum"] = $alum["idAlum"];
				$params = array("idAlum");
				$stmt = $msql->sqlPrepPost("SELECT *
					FROM telefonosAlumnos where idAlum = :idAlum", $params);

				$stmt->execute();
				$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$res = json( $row );

			}
			else
				$res = jsonErr("Alumno no existente");

		}
		else 
			$res = jsonErr("Error en parametros");
	}
	catch(PDOException $e){
		$res = jsonErr($e->getMessage());
		//$res = $e;
	}

	return $res;
}

//params: cuAlum, descripcion (casa, celular), telefono
function insertaTelefono(){


	global $msql;
	$conn = $msql->conn;
	$params = array("cuAlum","descripcion", "telefono");
	try{
		if( issetArrPost( $params ) ){

            $stmt = $msql->sqlPrepPost("SELECT * from alumnos where cu = :cuAlum", 
									array("cuAlum"));
			$stmt->execute();

			if($stmt->rowCount() > 0){
				$alum = $stmt->fetch(PDO::FETCH_ASSOC);
				$_POST["idAlum"] = $alum["idAlum"];
				$params = array("descripcion", "telefono", "idAlum");
				$stmt = $msql->sqlPrepPost("INSERT INTO telefonosAlumnos(idAlum, descripcion,
						telefono)
						VALUES (:idAlum, :descripcion, :telefono)", $params);

				$stmt->execute();
				$res = jsonOk("Insercion exitosa");

			}
			else
				$res = jsonErr("Alumno no existente");

		}
		else 
			$res = jsonErr("Error en parametros");
	}
	catch(PDOException $e){
		$res = jsonErr($e->getMessage());
		//$res = $e;
	}

	return $res;


}

//params: cuAlum,  telefono
function borraTelefono(){


	global $msql;
	$conn = $msql->conn;
	$params = array("cuAlum", "telefono");
	try{
		if( issetArrPost( $params ) ){

            $stmt = $msql->sqlPrepPost("SELECT * from alumnos where cu = :cuAlum", 
									array("cuAlum"));
			$stmt->execute();

			if($stmt->rowCount() > 0){
				$alum = $stmt->fetch(PDO::FETCH_ASSOC);
				$_POST["idAlum"] = $alum["idAlum"];
				$params = array( "telefono", "idAlum");
                $stmt = $msql->sqlPrepPost("DELETE FROM telefonosAlumnos 
                                            where idAlum =:idAlum and telefono =:telefono", $params);

				$stmt->execute();
				$res = jsonOk("Operacion exitosa");

			}
			else
				$res = jsonErr("Alumno no existente");

		}
		else 
			$res = jsonErr("Error en parametros");
	}
	catch(PDOException $e){
		$res = jsonErr($e);
		//$res = $e;
	}

	return $res;


}

?>