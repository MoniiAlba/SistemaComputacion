<?php 
//require 'bd.php';
//require 'util.php';
//$msql = new bd;

function alumnos(){
	global $msql;
	$res = $msql->cons('select * from alumnos');
	return jsonArr($res);
}

function alumno_id(){
	global $msql;
	$conn = $msql->conn;
	if( isset( $_POST['id'] ) ){

		$id = $_POST['id'];
		$stmt = $conn->prepare("select * from alumnos where idAlum = :id");
		$stmt->bindParam(':id',$id);
		$stmt->execute();
		$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$res = json($res);

	}
	else
		$res = jsonErr("Error en parametros");

	return $res;

}

function alumno_cu(){
	global $msql;
	$conn = $msql->conn;
	if( isset( $_POST['cu'] ) ){

		$cu = $_POST['cu'];
		$stmt = $conn->prepare("select * from alumnos where cu = :cu");
		$stmt->bindParam(':cu',$cu);
		$stmt->execute();
		$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$res = jsonArr($res);

	}
	else
		$res = jsonErr("Error en parametros");

	return $res;
	//echo 'hola cu';

}

function insertaAlumno(){
	global $msql;
	$conn = $msql->conn;
	$params = array("cu", "beca", "nombre", "apellidoP", "apellidoM", "programa",
				"email", "estado", "calle", "colonia", "delegacion", 
				"cp", "numExt", "numInt","pais","ciudad");
	
	try{
		if( issetArrPost( $params ) ){

			$stmt = $msql->sqlPrepPost("SELECT * from alumnos where cu = :cu", 
									array("cu"));
			$stmt->execute();

			if($stmt->rowCount() == 0){
				$stmt = $conn->prepare("INSERT INTO alumnos (cu, beca, nombre, apellidoP, apellidoM, programa,
								email, estado, calle, colonia, delegacion, cp, numExt, numInt,pais, ciudad)
								VALUES (:cu, :beca, :nombre, :apellidoP, :apellidoM, :programa,
								:email, :estado, :calle, :colonia, :delegacion, :cp,
								:numExt, :numInt, :pais, :ciudad)");

				foreach ($params as $param )
					$stmt->bindParam(":".$param, $_POST[$param]);

				$stmt->execute();
				$idAlum = $conn->lastInsertId();
				$res = json(array("idAlum" => $idAlum));
			}
			else
				$res = jsonErr("alumno ya existente");
		}
		else
			$res = jsonErr("parametros insuficientes");
	}
	catch(PDOException $e){
		//$res = jsonErr($e->getMessage());
		//$res = $e;
		$res = jsonErr($e->getMessage());
	}

	return $res;
	//echo var_dump(issetArrPost($params));
}

//func = updateAlum_cu; params = "cu", "beca", "nombre", "apellidoP",
 			//"apellidoM", "programa","email", "telefono", "estado",
  			//"calle", "colonia", "delegacion","cp", "numExt", "numInt"; 
function updateAlum_cu(){
	global $msql;
	$conn = $msql->conn;
	$params = array("cu", "beca", "nombre", "apellidoP", "apellidoM", "programa",
				"email", "telefono", "estado", "calle", "colonia", "delegacion", 
				"cp", "numExt", "numInt");
	
	try{
		if( issetArrPost( $params ) ){

			$stmt = $msql->sqlPrepPost("SELECT * from alumnos where cu = :cu", 
									array("cu"));
			$stmt->execute();

			if($stmt->rowCount() > 0){
				$stmt = $conn->prepare("UPDATE alumnos  SET beca =:beca, 
					nombre =:nombre, apellidoP = :apellidoP, 
					 apellidoM = :apellidoM,  programa = :programa, 
					 email = :email,  telefono = :telefono, 
					 estado = :estado,  calle = :calle, 
					 colonia =:colonia,  delegacion = :delegacion, 
					 cp = :cp,  numExt = :numExt, 
					 numInt = :numInt WHERE cu = :cu");

				foreach ($params as $param )
					$stmt->bindParam(":".$param, $_POST[$param]);

				$stmt->execute();
				$res = jsonOk("exito");
			}
			else
				$res = jsonErr("alumno no existente");
		}
		else
			$res = jsonErr("parametros insuficientes");
	}
	catch(PDOException $e){
		//$res = jsonErr($e->getMessage());
		$res = $e;
	}

	return $res;
}

//func = eliminaAlumno; param: cuAlum; // elimina alumno
function eliminaAlumno(){


	global $msql;
	$conn = $msql->conn;
	$params = array("cuAlum");
	try{
		if( issetArrPost( $params ) ){

            $stmt = $msql->sqlPrepPost("DELETE FROM alumnos where cu = :cuAlum", 
									array("cuAlum"));
			$stmt->execute();

			$res = jsonOk("Operación realizada");

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
//func = bajaAlumno; param = cu;
function bajaAlumno(){
	global $msql;
	$conn = $msql->conn;
	$params = array("cu");
	
	try{
		if( issetArrPost( $params ) ){

			$stmt = $msql->sqlPrepPost("SELECT * from alumnos where cu = :cu", 
									array("cu"));
			$stmt->execute();

			if($stmt->rowCount() > 0){
				$stmt = $msql->sqlPrepPost("UPDATE alumnos  SET dadoDeBaja = 1
				 WHERE cu = :cu",$params);

				$stmt->execute();
				$res = jsonOk("exito");
			}
			else
				$res = jsonErr("alumno no existente");
		}
		else
			$res = jsonErr("parametros insuficientes");
	}
	catch(PDOException $e){
		$res = jsonErr($e->getMessage());
		//$res = $e;
	}

	return $res;
}
//func= alumnos_nombreCompleto; param = nommbre, apellidoP, apellidoM;**
function alumnos_nombreCompleto(){
    global $msql;
	$conn = $msql->conn;
	$posibles = array("nombre","apellidoP", "apellidoM");
	$params = array();
	foreach($posibles as $pos)
		if(isset($_POST[$pos]))
		$params[] = $pos;
	try{
		if( count($params) > 0){
			$aux = "";
			$tam = count($params);
			for($i = 0; $i < $tam ; $i++){
				$aux = $aux.$params[$i]." = :".$params[$i]." ";
				if($i != ($tam - 1))
					$aux = $aux . " and ";
			}
			$stmt = $msql->sqlPrepPost("SELECT * from alumnos 
			where ".$aux, $params);
			$stmt->execute();
			$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$res = jsonArr($res);

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
//func = alumnos_estado; param = estado
function alumnos_estado(){
    global $msql;
	$conn = $msql->conn;
	$params = array("estado");
	try{
		if( issetArrPost( $params ) ){

			$stmt = $msql->sqlPrepPost("SELECT * from alumnos where estado = :estado", 
									array("estado"));
			$stmt->execute();
			$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$res = jsonArr($row);

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
//func = alumnoInfo_cu; param = cu
function alumnoInfo_cu(){
    global $msql;
	$conn = $msql->conn;
	$params = array("cu");
	try{
		if( issetArrPost( $params ) ){
			$res = array();
			//Act extra
			$stmt = $msql->sqlPrepPost("select ae.nombre as Actividad, ae.tipo as Tipo
			from actividadesExtra ae, alumnos a 
			where a.idAlum = ae.idAlum and a.cu = :cu", 
									array("cu"));
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$res[] = $row;

			//Empresa
			$stmt = $msql->sqlPrepPost("select ae.puesto as Puesto,
			ae.fechaIni as FechaDeInicio,
			e.rfc as Rfc,
			e.telefono as Telefono,
			e.estado as Estado,
			e.nombre as Nombre,
			e.calle as Calle,
			e.colonia as Colonia,
			e.delegacion as Delegacion,
			e.cp as Cp,
			e.numExt as NumeroExterior,
			e.numInt as NumeroInterior,
			e.giro as Giro
			from empresas e, alumnos_empresas ae, alumnos a
			where a.idAlum = ae.idAlum and ae.idEmp = e.idEmp
			and a.cu = :cu", 
									array("cu"));
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$res[] = $row;

			//Escuelas alternas
			$stmt = $msql->sqlPrepPost("select ae.carrera as Carrera, e.nombre as Universidad
			from alumnos_escuelas ae, escuelasAlternas e, alumnos a
			where ae.idEsc = e.idEsc and ae.idAlum = a.idAlum 
			and a.cu =:cu",array("cu"));
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$res[] = $row;

			//Estancias
			$stmt = $msql->sqlPrepPost("select ae.anio as Fecha, e.universidad as Universidad,
			e.pais as Pais, e.ciudad as Ciudad
			from alumnos_estancias ae, estancias e, alumnos a
			where ae.idAlum = a.idAlum and ae.idEst = e.idEst
			and a.cu = :cu",array("cu"));
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$res[] = $row;

			//Comentarios
			$stmt = $msql->sqlPrepPost("select c.comentario as Comentario, c.asunto as Asunto
			from comentarios c, alumnos a
			where c.idAlum = a.idAlum and a.cu = :cu",array("cu"));
			$stmt->execute();
			$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$res[] = $row;

			//Preparatoria
			$stmt = $msql->sqlPrepPost("select 
			p.nombrePrep as Preparatoria,
			p.promedio as Promedio,
			p.comoConocioItam as ComoConocioItam,
			p.tomoTutoria as TomoTutoria
			from preparatorias p , alumnos a
			where p.idAlum = a.idAlum and a.cu=:cu",array("cu"));
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$res[] = $row;

			//Sanciones
			$stmt = $msql->sqlPrepPost("select 
			s.descripcion as Descripcion,
			s.area as Area,
			s.problemasReglamento as Reglamento
			from sanciones s, alumnos a
			where s.idAlum = a.idAlum and
			a.cu=:cu",array("cu"));
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$res[] = $row;

			//Telefonos
			$stmt = $msql->sqlPrepPost("SELECT
			t.descripcion as Descripcion,
			t.telefono as Telefono
			FROM telefonosAlumnos t, alumnos a
			where t.idAlum = a.idAlum and
			a.cu = :cu",array("cu"));
			$stmt->execute();
			$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$res[] = $row;

			
			 



			
			$res = jsonArr($res);
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


 ?>