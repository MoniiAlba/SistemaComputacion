<?php 

//func = insertaComentCu; params = cuAlum, comentario,asunto
function insertaComentCu(){
	global $msql;
	$conn = $msql->conn;
	$params = array("cuAlum","comentario","asunto");
	try{
		if( issetArrPost( $params ) ){

			$stmt = $msql->sqlPrepPost("SELECT * from alumnos where cu = :cuAlum", 
									array("cuAlum"));
			$stmt->execute();

			if($stmt->rowCount() > 0){
				$alum = $stmt->fetch(PDO::FETCH_ASSOC);
				$_POST["idAlum"] = $alum["idAlum"];
				$params = array("comentario", "idAlum","asunto");
				$stmt = $msql->sqlPrepPost("INSERT INTO comentarios(idAlum, comentario,asunto)
						VALUES (:idAlum, :comentario, :asunto)", $params);

				$stmt->execute();
				$idComm = $conn->lastInsertId();
				$res = json(array("idComentario" => $idComm));

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

//func = borraComentario; params = idComentario
function borraComentario(){


	global $msql;
	$conn = $msql->conn;
	$params = array("idComentario");
	try{
		if( issetArrPost( $params ) ){

            
			$stmt = $msql->sqlPrepPost("DELETE FROM comentarios
												where idComentario = :idComentario", $params);

			$stmt->execute();
			$res = jsonOk("Operacion exitosa");

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


function comentarios(){
	global $msql;
	$res = $msql->cons("select * from comentarios");
	return json($res);
}

//func = comentarios_cu ; params = cuAlum
function comentarios_cu(){

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
				$stmt = $msql->sqlPrepPost("select * from comentarios
												where idAlum = :idAlum", $params);

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
		//$res = jsonErr($e->getMessage());
		$res = $e;
	}

	return $res;
}



 ?>