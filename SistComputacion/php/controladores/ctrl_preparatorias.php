<?php 


//func = insertaPrepAlum_cu; params = cuAlum, nombrePrep,promedio, comoConocioItam,tomoTutoria
function insertaPrepAlum_cu(){
	global $msql;
	$conn = $msql->conn;
	$params = array("cuAlum","nombrePrep", "promedio", "comoConocioItam","tomoTutoria");
	try{
		if( issetArrPost( $params ) ){

			$stmt = $msql->sqlPrepPost("SELECT idAlum FROM alumnos WHERE cu =:cuAlum",
									array("cuAlum"));
			$stmt->execute();

			if($stmt->rowCount() > 0){
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				$_POST["idAlum"] = $row["idAlum"];

				$stmt = $msql->sqlPrepPost("SELECT * FROM preparatorias 
									WHERE idAlum =:idAlum AND nombrePrep =:nombrePrep",
									array("idAlum", "nombrePrep"));
				$stmt->execute();
				if($stmt->rowCount() == 0){

					$params = array("idAlum", "nombrePrep", "promedio", "comoConocioItam","tomoTutoria");
					$stmt = $msql->sqlPrepPost("INSERT INTO preparatorias(idAlum, nombrePrep, 
								promedio, comoConocioItam, tomoTutoria)
							VALUES (:idAlum, :nombrePrep,:promedio, :comoConocioItam,:tomoTutoria)", $params);

					$stmt->execute();
					$res = jsonOK("Insercion exitosa");
				}
				else
					$res = jsonErr("Relacion alumno preparatoria ya existente");

			}
			else
				$res = jsonErr("Alumno no existente");

		}
		else 
			$res = jsonErr("Error en parametros");
	}
	catch(PDOException $e){
		//$res = jsonErr($e->getMessage());
		//$res = jsonErr($e);
		$res = $e;
	}

	return $res;
}

function preparatorias(){
	global $msql;
	$res = $msql->cons('select * from preparatorias');
	return json($res);
}

//func = preparatoria_cu ; params = cuAlum; //tupla asociada al alumno de la cu
function preparatoria_cu(){
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
				$stmt = $msql->sqlPrepPost("select * from preparatorias
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
//func=borraPreparatoria; params=cuAlum,nombrePrep
function borraPreparatoria(){


	global $msql;
	$conn = $msql->conn;
	$params = array("cuAlum", "nombrePrep");
	try{
		if( issetArrPost( $params ) ){

            $stmt = $msql->sqlPrepPost("SELECT * from alumnos where cu = :cuAlum", 
									array("cuAlum"));
			$stmt->execute();

			if($stmt->rowCount() > 0){
				$alum = $stmt->fetch(PDO::FETCH_ASSOC);
				$_POST["idAlum"] = $alum["idAlum"];
				$params = array( "nombrePrep", "idAlum");
                $stmt = $msql->sqlPrepPost("DELETE FROM preparatorias 
                                            where idAlum =:idAlum and nombrePrep =:nombrePrep", $params);

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