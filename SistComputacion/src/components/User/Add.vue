<template>
  <v-container>
	  	<p class="text-xs-center display-1">Agrega un alumno</p>

    	<form>
			<v-container grid-list-sm>
				<v-layout row wrap>
					<v-flex>
						<!--PERSONAL INFORMATION-->
						<v-card class="mb-5" hover xs12 sm12 md12>
							<v-card-title>
								<span class="headline">Información personal</span>
							</v-card-title>
							<v-container xs12 sm12>
								<v-layout row wrap>

								<v-flex xs12 sm3>
									<v-text-field
										label="Clave Única"
										type="number"
										v-model="cu"
										prepend-icon=""
										required
										:counter="6"
										:error-messages="errors.collect('CU')"
										v-validate="'required|max:6'"
										data-vv-name="CU"
									></v-text-field>
								</v-flex>

								<v-flex xs12 sm3>
									<v-text-field
										label="Nombre"
										type="text"
										v-model="nombre"
										required
										:counter="30"
										:error-messages="errors.collect('Nombre')"
										v-validate="'required|max:50'"
										data-vv-name="Nombre"
									></v-text-field>
								</v-flex>

								<v-flex xs12 sm3>
									<v-text-field
										label="Apellido Paterno"
										type="text"
										v-model="apellidoP"
										required
										:counter="30"
										:error-messages="errors.collect('apellidoP')"
										v-validate="'required|max:30'"
										data-vv-name="apellidoP"
									></v-text-field>
								</v-flex>

								<v-flex xs12 sm3>
									<v-text-field
										label="Apellido Materno"
										type="text"
										v-model="apellidoM"
									></v-text-field>
								</v-flex>

								<v-flex xs12 sm3>
									<v-text-field
										label="Teléfono"
										type = "number"
										v-model="telefono"
									></v-text-field>
								</v-flex>

								<v-flex xs12 sm3>
									<v-text-field
										label="E-mail"
										type = "email"
										v-model="email"
										required
										:error-messages="errors.collect('mail')"
										v-validate="'required|email'"
										data-vv-name="mail"
									></v-text-field>
								</v-flex>

								</v-layout>
							</v-container>
						</v-card>
						<!--PERSONAL INFORMATION-->

						<!--ADDRESS-->
						<v-card class="mb-5" hover>
							<v-card-title>
								<span class="headline">Dirección</span>
							</v-card-title>
							<v-container xs12 sm6>
								<v-layout row wrap>
									<v-flex xs12 sm3>
										<v-text-field 
											label = "Calle"
											type = "text"
											v-model="calle"
										></v-text-field>
									</v-flex>

									<v-flex xs12 sm3>
										<v-text-field 
											label = "Número exterior"
											type = "number"
											v-model="numExt"
										></v-text-field>
									</v-flex>

									<v-flex xs12 sm3>
										<v-text-field 
											label = "Número interior"
											type = "number"
											v-model="numInt"
										></v-text-field>
									</v-flex>

									<v-flex xs12 sm3>
										<v-text-field 
											label = "Colonia"
											type = "text"
											v-model="colonia"
										></v-text-field>
									</v-flex>

									<v-flex xs12 sm3>
										<v-text-field 
											label = "Delegación"
											v-model="delegacion"
										></v-text-field>
									</v-flex>

									<v-flex xs12 sm3>
										<v-text-field 
											label = "Código postal"
											v-model="cp"
											type="number"
										></v-text-field>
									</v-flex>

									<v-flex xs12 sm3>
										<v-select
										:items = "states"
										label = "Estado"
										v-model="estado"
										></v-select>
									</v-flex>
								</v-layout>
							</v-container>
						</v-card>
						<!--ADDRESS-->

						<!--Preparatorias-->
                  <v-card class="mb-5" hover>
                     <v-card-title>
                        <span class="headline">Preparatoria</span>
                     </v-card-title>
                     <v-container xs12 sm6>
                        <v-layout row wrap>
                           <v-flex xs12 sm6>
										<v-text-field
										name="prepa"
										v-model="nomPrepa"
										type="text"
										label="Nombre de la preparatoria"
										>
										</v-text-field>
									</v-flex>
									<v-flex xs12 sm3>
										<v-select
										:items = 'preparatorias'
										label = "Preparatoria"
										></v-select>
									</v-flex>
									<v-flex xs12 sm6>
										<v-text-field
										name="promedio"
										v-model="promPrepa"
										type="number"
										label="Promedio de la prepa"
										>
										</v-text-field>
									</v-flex>
									<v-flex xs12 sm3>
										<v-select
										:items = 'hablaAna'
										label = "Habló con Ana"
										v-model="habloConAna"
										></v-select>
									</v-flex>
                        </v-layout>
                     </v-container>
                  </v-card>
                  <!--ESCUELA ALTERNA-->

						<!--BECAS & PROGRAMA-->
						<v-card class="mb-5" hover>
							<v-card-title>
								<span class="headline">Escolar</span>
							</v-card-title>
							<v-container xs12 sm6>
								<v-layout row wrap>
									<v-flex xs6 sm6>
										<v-select
										:items = "percentage"
										label = "Porcentaje de beca"
										v-model="beca"
										required
										:error-messages="errors.collect('beca')"
										v-validate="'required'"
										data-vv-name="beca"
										></v-select>
									</v-flex>

									<v-flex xs12 sm6>
										<v-select
										:items = "programs"
										label = "Programa"
										v-model="programa"
										required
										:error-messages="errors.collect('programa')"
										v-validate="'required'"
										data-vv-name="programa"
										></v-select>
									</v-flex>

									<v-flex xs12 sm6>
										<v-text-field
										name="tipoAct"
										v-model="tipoAct"
										type="text"
										label="Tipo de actividad"
										>
										</v-text-field>
									</v-flex>

									<v-flex xs12 sm6>
										<v-select
										:items = "actividadesExtras"
										label = "Actividad extra"
										v-model="nomAct"
										></v-select>
									</v-flex>
									
								</v-layout>
							</v-container>
						</v-card>
						<!--BECAS & PROGRAMA-->

						<!--SANCIONES-->
						<v-card hover class="mb-5">
							<v-card-title class="headline">
								<span>Sanciones</span>
							</v-card-title>
							<v-container xs12 sm6>
								<v-layout row wrap>

									<v-flex xs12 sm6>
										<v-text-field
										name="areaSancion"
										v-model="areaSancion"
										type="text"
										label="Área de sanción"
										>
										</v-text-field>
									</v-flex>

									<v-flex xs12 sm6>
										<v-text-field
										name="problemasReglamento"
										v-model="problemasReg"
										type="text"
										label="Problemas de reglamento"
										>
										</v-text-field>
									</v-flex>
									
									<v-flex sm12>
										<v-text-field
										v-model="descSancion"
										label="Descripción de sanción"
										textarea
										name="descSancion"
										>
										</v-text-field>
									</v-flex>
								</v-layout>
							</v-container>
						</v-card>
						<!--SANCIONES-->

                  <!--ESTANCIAS-->
                  <v-card class="mb-5" hover>
                     <v-card-title>
                        <span class="headline">Estancias</span>
                     </v-card-title>
                     <v-container xs12 sm6>
                        <v-layout row wrap>
                           <v-flex xs12 sm6>
										<v-text-field
										name="nomUni"
										v-model="nomUni"
										type="text"
										label="Nombre de universidad"
										>
										</v-text-field>
									</v-flex>
									<v-flex xs12 sm6>
										<v-text-field
										name="nomPais"
										v-model="nomPais"
										type="text"
										label="Nombre del país"
										>
										</v-text-field>
									</v-flex>
                        </v-layout>
                     </v-container>
                  </v-card>
                  <!--ESTANCIAS-->

						<!--ESCUELA ALTERNA-->
                  <v-card class="mb-5" hover>
                     <v-card-title>
                        <span class="headline">Escuela alterna</span>
                     </v-card-title>
                     <v-container xs12 sm6>
                        <v-layout row wrap>
                           <v-flex xs12 sm6>
										<v-text-field
										name="nomEsc"
										v-model="nomEsc"
										type="text"
										label="Nombre de la escuela"
										>
										</v-text-field>
									</v-flex>
                        </v-layout>
                     </v-container>
                  </v-card>
                  <!--ESCUELA ALTERNA-->

						<!--COMENTARIOS-->
						<v-container fluid>
							<v-layout row>
							<v-flex>
								<v-text-field
									name="comentarios"
									label="Comentarios"
									textarea
									v-model="comentarios"
								></v-text-field>
							</v-flex>
							</v-layout>
						</v-container>
						<!--COMENTARIOS-->
					</v-flex>

					<v-container xs12 sm6 class="text-xs-center mt-3">
						<v-btn large color="green" dark @click="submit">submit</v-btn>
						<v-btn large color="red" dark @click="clear">clear</v-btn>
					</v-container>

				</v-layout>
			</v-container>
		</form>
  </v-container>
</template>

<script>

export default {
  	data(){
    	return{
			api: 'http://localhost/SistemaComputacion/SistComputacion/php/',
			//Variables let = alum{};
			cu:'',
			beca:'',
			nombre:'',
			apellidoP:'',
			apellidoM:'',
			programa:'',
			email:'',
			telefono:'',
			estado:'',
			calle:'',
			colonia:'',
			delegacion:'',
			cp:'',
			numExt:'',
			numInt:'',
			//Variables let actExtra = {};
			tipoAct:'',
			nomAct:'',
			//Variables let sanciones = {};
			descSancion:'',
			areaSancion:'',
			problemasReg:'',
			//Variables let estancias = {};
			nomUni:'',
			nomPais:'',
			//Variables let coment = {};
			comentarios:'',
			//Variables let prepa = {};
			nomPrepa:'',
			promPrepa:'',
			habloConAna:'',
			//Variables let escuelaAlterna = {};
			nomEsc:'',
			preparatorias: [],

			array : [],

			hablaAna:[
				{text: 'Sí', value: 'yes'},
				{text: 'No', value: 'no'}
			],

			actividadesExtras:[
				{text: 'Guitarra', value:'Guitarra'},
				{text: 'Piano', value:'Piano'},
				{text: 'Teatro', value:'Teatro'},
				{text: 'Porras', value:'Porras'},
				{text: 'Laboratorio de desarrollo web', value:'Laboratorio de desarrollo web'},
				{text: 'Laboratorio de videojuegos', value:'Laboratorio de videojuegos'},
				{text: 'Salsa con colmillo', value:'Salsa con colmillo'},
				{text: 'Otro', value: 'Otro'}
			],

			percentage: [
				{ text: '0' , value: 0 },
				{ text: '10' , value: 10 },
				{ text: '20' , value: 20 },
				{ text: '30' , value: 30 },
				{ text: '40' , value: 40  },
				{ text: '50' , value: 50  },
				{ text: '60' , value: 60  },
				{ text: '70' , value: 70  },
				{ text: '80' , value: 80  },
				{ text: '90' , value: 90  },
				{ text: 'Bailléres' , value: 100 }
			],

			programs:[
				{ text: 'Ingeniería en Computación', value: 'Ingeniería en Computación'},
				{ text: 'Lic. en Administración e Ing. en Computación', value: 'Lic. en Administración e Ing. en Computación'},
				{ text: 'Ing. en Computación e Ing. Industrial', value: 'Ing. en Computación e Ing. Industrial'},
				{ text: 'Ing. en Computación y Lic. en Matemáticas aplicadas', value: 'Ing. en Computación y Lic. en Matemáticas aplicadas'},
				{ text: 'Ing. en Computación e Ing. en Mecátronica', value: 'Ing. en Computación e Ing. en Mecátronica'},
				{ text: 'Ing. en Computación e Ing. en Negocios', value: 'Ing. en Computación e Ing. en Negocios'},
				{ text: 'Ing. en Computación e Ing. en Telecomunicaciones', value: 'Ing. en Computación e Ing. en Telecomunicaciones'},
				{ text: 'Ing. en Computación e Ing. en Telemática', value: 'Ing. en Computación e Ing. en Telemática'}
			],
		
			states:[
				{ text: 'Aguascalientes', value: 'Aguascalientes'},
				{ text: 'Baja California', value: 'Baja California'},
				{ text: 'Baja California Sur', value: 'Baja California Sur'},
				{ text: 'Campeche', value: 'Campeche'},
				{ text: 'Coahuila de Zaragoza', value: 'Coahuila de Zaragoza'},
				{ text: 'Colima', value: 'Colima'},
				{ text: 'Chiapas', value: 'Chiapas'},
				{ text: 'Chihuahua', value: 'Chihuahua'},
				{ text: 'Durango', value: 'Durango'},
				{ text: 'Guanajuato', value: 'Guanajuato'},
				{ text: 'Guerrero', value: 'Guerrero'},
				{ text: 'Hidalgo', value: 'Hidalgo'},
				{ text: 'Jalisco', value: 'Jalisco'},
				{ text: 'México', value: 'México'},
				{ text: 'Michoacán de Ocampo', value: 'Michoacán de Ocampo'},
				{ text: 'Morelos', value: 'Morelos'},
				{ text: 'Nayarit', value: 'Nayarit'},
				{ text: 'Nuevo León', value: 'Nuevo León'},
				{ text: 'Oaxaca', value: 'Oaxaca'},
				{ text: 'Puebla', value: 'Puebla'},
				{ text: 'Santiago de Querétaro', value: 'Santiago de Querétaro'},
				{ text: 'Quintana Roo', value: 'Quintana Roo'},
				{ text: 'San Luis Potosí', value: 'San Luis Potosí'},
				{ text: 'Sinaloa', value: 'Sinaloa'},
				{ text: 'Sonora', value: 'Sonora'},
				{ text: 'Tabasco', value: 'Tabasco'},
				{ text: 'Tamaulipas', value: 'Tamaulipas'},
				{ text: 'Tlaxcala', value: 'Tlaxcala'},
				{ text: 'Veracruz', value: 'Veracruz'},
				{ text: 'Yucatán', value: 'Yucatán'},
				{ text: 'Zacatecas', value: 'Zacatecas'}
			]
    	}
  	},
  	methods:{

		getPreparatorias(){
			var vm = this;
			var data = JSON.stringify({
				dominio:'preparatorias',
				func:'preparatorias'
				});
				var xhttp = new XMLHttpRequest();

			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200){
						var res = JSON.parse(this.response);
						console.log("Prepa req enviado")
						console.log(res)
						for(var i = 0; i<res.length ;i++)
						vm.preparatorias.push(res[i].nombrePrep) 
						vm.preparatorias.push('Preparatoria de vue')

						console.log(vm.preparatorias)
				}
			}
			xhttp.open('POST', this.api, true);
			xhttp.withCredentials = true;
			xhttp.send(data);
		},
      sendData(json){
         var vm = this;
         var data = JSON.stringify(json);
			var xhttp = new XMLHttpRequest();

         xhttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
					var res = JSON.parse(this.response);
					console.log(res);
					vm.clear();
            }
         }
         xhttp.open('POST', 'http://alumnoscomputacion.itam.mx/php/', true);
			xhttp.send(data);
      },
	 	submit(){
       	var vm = this;
      	this.$validator.validateAll().then((result) => {
				if (result) {
					let alum = {
						'func':'insertaAlumno',
						'dominio': 'alumnos',
						'nombre': vm.nombre,
						'cu': vm.cu,
						'beca': vm.beca,
						'apellidoP': vm.apellidoP,
						'apellidoM': vm.apellidoM,
						'programa': vm.programa,
						'email': vm.email,
						'telefono': vm.telefono,
						'estado': vm.estado,
						'calle': vm.calle,
						'colonia': vm.colonia,
						'delegacion': vm.delegacion,
						'cp': vm.cp,
						'numExt': vm.numExt,
						'numInt': vm.numInt
					};
					let actExtra = {
						'dominio': 'actExtra',
						'func' : 'insertaActividad',
						'cuAlum' : vm.cu,
						'nombre': vm.nomAct,
						'tipo': vm.tipoAct
					};
					let sanciones = {
						'dominio': 'sanciones',
						'func': 'insertaSancion',
						'cuAlum': vm.cu,
						'descripcion': vm.descSancion,
						'area': vm.areaSancion,
						'problemasReglamento': vm.problemasReg
					};
					let universidad = {
						'dominio': 'estancias',
						'func': 'insertaUniversidad',
						'nomUni': vm.nomUni,
						'nomPais': vm.nomPais
					};
					//necesito el id de la universidad
					/*let registraEstAlum = {
						'dominio': 'estancias',
						'func': 'registraEstanciaAlumno',
						'cuAlum' : vm.cu,
						'idEst' : id,
						'anio' : anio,
						'semestre' : semestre
					}*/
					let coment = {
						'dominio': 'comentarios',
						'func': 'insertaComentCu',
						'comentarios': vm.comentarios,
						'cuAlum' : vm.cu
					};
					//not yet
					/*let materias = {
						'dominio' : 'materias',
						'func' : 'insertaMateria',
						'cMateria' : vm.cMateria,
						'folio' : vm.folioMat,
						'numCreditos' : vm.numCreds,
						'nombre' : vm.nomMat,
						'semestre' : vm.semestre
					};
					let registraMatAlum = {
						'dominio' : 'materias',
						'func' : 'registraMatAlum',
						'cuAlum' : vm.cu,
						'cMateria' : vm.cMat,
						'estatusFin' : vm.etatusFin,
						'calificacion' : vm.calif
					};*/
					let prepa = {
						'dominio' : 'preparatorias',
						'func' : 'insertaPrepAlum_cu',
						'cuAlum' : vm.cu,
						'nombrePrep' : vm.nomPrepa,
						'promedio' : vm.promPrepa,
						'habloConAna' : vm.habloConAna
					};
					/*let empresa = {

					};*/
					let escuelaAlterna = {
						'dominio' : 'escuelasAlt',
						'func' : 'insertaEscuelaAlt',
						'nombre' : vm.nomEsc
					};
					//necesito id de escuela
					/*let insertaEscuela = {
						'dominio' : 'escuelasAlt',
						'func' : 'registraAlumEscAlt',
						'cuAlum' : vm.cu,
						''
					};*/

					vm.sendData(alum);
					vm.sendData(actExtra);
					vm.sendData(sanciones);
					vm.sendData(universidad);
					vm.sendData(coment);
					vm.sendData(prepa);
					vm.sendData(escuelaAlterna);
					
				}else{
					alert('Correct them errors!');
				}
      	});
	 	},
	 	clear(){
			this.cu = '';
			this.nombre = '';
			this.beca = '';
			this.apellidoP = '';
			this.apellidoM = '';
			this.programa = '';
			this.email = '';
			this.telefono = '';
			this.estado = '';
			this.calle = '';
			this.colonia = '';
			this.delegacion = '';
			this.cp = '';
			this.numExt = '';
			this.numInt = '';
			this.comentarios = '';
			//Variables let actExtra = {};
			this.tipoAct = '';
			this.nomAct = '';
			//Variables let sanciones = {};
			this.descSancion = '',
			this.areaSancion = '',
			this.problemasReg = '',
			//Variables let estancias = {};
			this.nomUni = '',
			this.nomPais = '',
			//Variables let prepa = {};
			this.nomPrepa = '',
			this.promPrepa = '',
			this.habloConAna = '',
			//Variables let escuelaAlterna = {};
			this.nomEsc = ''
	 	}
	  },
	  mounted () {
    this.getPreparatorias()
  }
}
</script>

<style scoped>

</style>
