<?php 


$funcionesRegistradas = array(
					"alumnos" => array("alumnos", "alumno_id", "alumno_cu", "insertaAlumno",
					"updateAlum_cu", "eliminaAlumno","bajaAlumno"),
					"auth" => array("logout", "nuevoUsuario"),
					"authPublico" => array("auth","tengoSesion"),
					"actExtra" => array("insertaActividad", "actividadesExtra"),
					"sanciones" => array("insertaSancion", "sanciones"),
					"estancias" => array("insertaUniversidad", "universidades","registraEstanciaAlumno",
						"estancias", "registraMateriaRev_cu", "materiasDeAlum_cu","borraUniversidad"),
					"comentarios" => array("insertaComentCu","comentarios"
					, "comentarios_cu","borraComentario"),
					"materias" => array("insertaMateria", "materias", "registraMatAlum"),
					"preparatorias" => array("insertaPrepAlum_cu", "preparatorias", 
					"preparatoria_cu","borraPreparatoria"),
					"empresas" => array("empresas", "insertaEmpresa", "registraAlumEmpresa_cu","empresaDeAlum_cu"),
					"escuelasAlt" => array("insertaEscuelaAlt", "escuelasAlt","registraAlumEscAlt",
						"escuelaDeAlum_cu"),
						"telefonos" => array("insertaTelefono", "telefonos","borraTelefono", 
						"telefonos_cu")
				);

$rutasRegistradas = array("alumnos" => "controladores/ctrl_alumnos.php",
						  "auth" => "auth.php",
						  "authPublico" => "auth.php",
							"actExtra" => "controladores/ctrl_actividadesExtra.php",
							"sanciones" => "controladores/ctrl_sanciones.php",
							"estancias" => "controladores/ctrl_estancias.php",
							"comentarios" => "controladores/ctrl_comentarios.php",
							"materias" => "controladores/ctrl_materias.php",
							"preparatorias" => "controladores/ctrl_preparatorias.php",
							"empresas" => "controladores/ctrl_empresas.php",
							"escuelasAlt" => "controladores/ctrl_escuelasAlternas.php",
							"telefonos" => "controladores/ctrl_telefonos.php");

$bdConfig = array( "servername" => "localhost",
					"username" => "root",
					"password" => "",
					"dbName" =>"alumnoscompu");



 ?>