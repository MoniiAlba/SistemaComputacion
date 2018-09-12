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
										v-model="alumno.cu"
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
										v-model="alumno.nombre"
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
										v-model="alumno.apellidoP"
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
										v-model="alumno.apellidoM"
									></v-text-field>
								</v-flex>

								<v-flex xs12 sm3>
									<v-text-field
										label="Teléfono"
										type = "number"
										v-model="alumno.telefono"
									></v-text-field>
								</v-flex>
								<v-flex xs12 sm3>
									<v-text-field
										label= "Celular"
										type = "number"
										v-model="alumno.celular"
									></v-text-field>
								</v-flex>

								<v-flex xs12 sm3>
									<v-text-field
										label="E-mail"
										type = "email"
										v-model="alumno.email"
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
											v-model="alumno.calle"
										></v-text-field>
									</v-flex>

									<v-flex xs12 sm3>
										<v-text-field 
											label = "Número exterior"
											type = "text"
											v-model="alumno.numExt"
										></v-text-field>
									</v-flex>

									<v-flex xs12 sm3>
										<v-text-field 
											label = "Número interior"
											type = "text"
											v-model="alumno.numInt"
										></v-text-field>
									</v-flex>

									<v-flex xs12 sm3>
										<v-text-field 
											label = "Colonia"
											type = "text"
											v-model="alumno.colonia"
										></v-text-field>
									</v-flex>

									<v-flex xs12 sm3>
										<v-text-field 
											label = "Delegación"
											v-model="alumno.delegacion"
										></v-text-field>
									</v-flex>

									<v-flex xs12 sm3>
										<v-text-field 
											label = "Código postal"
											v-model="alumno.cp"
											type="number"
										></v-text-field>
									</v-flex>

									<v-flex xs12 sm3>
										<v-select
										:items = "states"
										label = "Estado"
										v-model="alumno.estado"
										></v-select>
									</v-flex>
									<v-flex xs12 sm3>
										<v-text-field 
											label = "Pais"
											type = "text"
											v-model="alumno.pais"
										></v-text-field>
									</v-flex>
									<v-flex xs12 sm3>
										<v-text-field 
											label = "Ciudad"
											type = "text"
											v-model="alumno.ciudad"
										></v-text-field>
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
									<v-flex xs12 sm3>
										<v-text-field
										label = "Preparatoria"
										v-model="prepa.nombrePrep"
										></v-text-field>
									</v-flex>
									<v-flex xs12 sm6>
										<v-text-field
										name="promedio"
										v-model="prepa.promedio"
										type="number"
										label="Promedio de la prepa"
										>
										</v-text-field>
									</v-flex>
									<v-flex xs12 sm3>
										<v-text-field 
											label = "Como se entero del Itam"
											type = "text"
											v-model="prepa.comoConocioItam"
										></v-text-field>
									</v-flex>
									<v-flex>
									<v-checkbox
									label="Tomó tutoría primer semestre"
									v-model="prepa.tomoTutoria">
									</v-checkbox>
									</v-flex>
									
                        </v-layout>
                     </v-container>
                  </v-card>
                  <!--Prepa-->

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
										v-model="alumno.beca"
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
										v-model="alumno.programa"
										required
										:error-messages="errors.collect('programa')"
										v-validate="'required'"
										data-vv-name="programa"
										></v-select>
									</v-flex>

									<v-flex xs12 sm6>
										<v-text-field
										name="Actividad"
										v-model="actExtra.nombre"
										type="text"
										label="Actividad extra"
										>
										</v-text-field>
									</v-flex>

									<v-flex xs12 sm6 v-if="!otroActExtra">
										<v-select
										:items = "actividadesExtras"
										label = "Tipo"
										v-model="actExtra.tipo"
										></v-select>
									</v-flex>
									<v-flex xs12 sm6 v-else>
										<v-text-field
										name="Otro-tipo"
										v-model="actExtra.tipo"
										type="text"
										label="Escribe el tipo de actividad"
										>
										</v-text-field>
									</v-flex>
									<v-flex>
									<v-checkbox
									label="Otro tipo de actividad"
									v-model="otroActExtra">
									</v-checkbox>
									</v-flex>

									
									
								</v-layout>
							</v-container>
						</v-card>
						<!--BECAS & PROGRAMA-->

						<!--SANCIONES-->
						<v-card hover class="mb-5">
							<v-card-title class="headline">
								<span>Problemas de reglamento</span>
							</v-card-title>
							<v-container xs12 sm6>
								<v-layout row wrap>

									<v-flex xs12 sm6>
										<v-text-field
										name="areaSancion"
										v-model="sanciones.area"
										type="text"
										label="Área de sanción"
										>
										</v-text-field>
									</v-flex>

									<v-flex xs12 sm6>
										<v-text-field
										name="problemasReglamento"
										v-model="sanciones.problemasReglamento"
										type="text"
										label="Problemas de reglamento"
										>
										</v-text-field>
									</v-flex>
									
									<v-flex sm12>
										<v-text-field
										v-model="sanciones.descripcion"
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
                        <span class="headline">Intercambio académico</span>
                     </v-card-title>
                     <v-container xs12 sm6>
                        <v-layout row wrap>
									<v-flex xs12 sm3>
										<v-select
										:items = "todasUniversidades"
										label = "Universidad"
										v-model="universidad.idEst"
										autocomplete
										required
										></v-select>
									</v-flex>
									<v-flex xs12 sm6>
										<v-text-field
										name="nomPais"
										v-model="universidad.anio"
										type="text"
										label="Año de intercambio"
										>
										</v-text-field>
									</v-flex>
                        </v-layout>
						<modal-estancias></modal-estancias>
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
										<v-select
										name="nomEsc"
										v-model="escuelaAlterna.idEsc"
										label="Nombre de la escuela"
										:items = "escuelasAltDropDown"
										autocomplete
										>
										</v-select>
									</v-flex>
									<v-flex xs12 sm6>
										<v-text-field
										name="NombreCarrera"
										v-model="escuelaAlterna.carrera"
										type="text"
										label="Nombre de la carrera"
										>
										</v-text-field>
									</v-flex>
                        </v-layout>
						 <modal-escuelas></modal-escuelas>
                     </v-container>
                  </v-card>
                  <!--ESCUELA ALTERNA-->

				<!--Empresas-->
                  <v-card class="mb-5" hover>
                     <v-card-title>
                        <span class="headline">Empresas</span>
                     </v-card-title>
                     <v-container xs12 sm6>
						
                        <v-layout row wrap>
                           <v-flex xs12 sm6>
										<v-select
										name="empresaNombre"
										v-model="empresa.rfc"
										label="Empresa"
										:items = "empresasDropDown"
										autocomplete
										>
										</v-select>
									</v-flex>
									<v-flex xs12 sm6>
										<v-text-field
										name="empresaPuesto"
										v-model="empresa.puesto"
										type="text"
										label="Puesto"
										>
										</v-text-field>
									</v-flex>
									<v-flex xs12 sm6>
										<v-text-field 
										name="empresaFechaIni"
										v-model="empresa.fechaIni"
										type="date"
										label="Fecha"
										>
										</v-text-field>
									</v-flex>
                        </v-layout>
						 <modal-empresas></modal-empresas>
                     </v-container>
                  </v-card>
                  <!--Empresas-->

						<!--COMENTARIOS-->
						<v-container fluid>
							<span class="headline">Comentarios</span>
							<v-flex xs12 sm6>
										<v-text-field
										name="Asunto"
										v-model="coment.asunto"
										type="text"
										label="Asunto"
										>
										</v-text-field>
									</v-flex>
							<v-layout row>
								
							<v-flex>
								<v-text-field
									name="comentarios"
									label="Comentarios"
									textarea
									v-model="coment.comentario"
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

import store from '@/store/index'
import axios from 'axios'
import ModalEstancias from './ModalEstancias.vue'
import ModalEscuelas from './ModalEscuelas.vue'
import ModalEmpresas from './ModalEmpresas.vue'

export default {
	components:{
		ModalEstancias,
		ModalEscuelas,
		ModalEmpresas
	},
  	data(){
    	return{
			//Falta actualizar vista
			otroActExtra :false,
			alumno:{
					cu:'',
					beca:'',
					nombre:'',
					apellidoP:'',
					apellidoM:'',
					programa:'',
					email:'',
					telefono:'',
					celular: '',
					estado:'',
					calle:'',
					colonia:'',
					delegacion:'',
					cp:'',
					numExt:'',
					numInt:'',
					pais: 'México',
					ciudad:'CDMX',
					func : 'insertaAlumno',
					dominio : 'alumnos'},

			//Falta actualizar vista
			prepa : {
						dominio : 'preparatorias',
						func : 'insertaPrepAlum_cu',
						cuAlum : '',
						nombrePrep : '',
						promedio : '',
						comoConocioItam: '',
						tomoTutoria: false
					},
			actExtra : {
						dominio: 'actExtra',
						func : 'insertaActividad',
						cuAlum :'' ,
						nombre: '',
						tipo: ''
					},
			//Falta actualizar vista
			sanciones : {
						dominio: 'sanciones',
						func: 'insertaSancion',
						cuAlum: '',
						descripcion: '',
						area: '',
						problemasReglamento: ''
					},

			//Debe ir en modal
			universidad : {
						dominio: 'estancias',
						func: 'registraEstanciaAlumno',
						idEst: '',
						semestre:'sem',
						anio:''
					},
			//Falta actualizar vista
			coment : {
						dominio: 'comentarios',
						func: 'insertaComentCu',
						comentario: '',
						asunto: '',
						cuAlum : ''
					},

			//Debe ir en modal
			 escuelaAlterna : {
						dominio : 'escuelasAlt',
						func : 'registraAlumEscAlt',
						idEsc : '',
						carrera:''
					},
			empresa:{
				rfc:'',
				puesto:'',
				fechaIni:''

			},
			array : [],

			actividadesExtras:[
				{text: 'Musica', value:'Musica'},
				{text: 'Deporte', value:'Deporte'},
				{text: 'Arte', value:'Arte'}
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
				{ text: 'Bailléres' , value: 100 },
				{ text: '50% por beca de ingenierías' , value: '50% por beca de ingenierías' },
				{ text: '75% por beca de ingenierías' , value: '75% por beca de ingenierías' },
				{ text: 'Beca de buró de crédito' , value: 'Beca de buró de crédito' }
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
				{ text: 'CDMX', value: 'CDMX'},
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
	  computed:{
		  preparatorias(){
			  var aux = []
			  if(this.$store.state.preparatorias != null)
			  this.$store.state.preparatorias.forEach(element => {
				  aux.push({
					  text: element.nombrePrep,
					  value: element.nombrePrep})
			  });
			return aux
		  },
		  todasUniversidades(){
			  //console.log('Desde computed')
			  //console.log(this.$store.getters.universidadesDropDown)
			  return this.$store.getters.universidadesDropDown
		  },

		  escuelasAltDropDown(){
			  //console.log('Desde computed')
			  //console.log(this.$store.getters.universidadesDropDown)
			  return this.$store.getters.escuelasDropDown
		  },
		  empresasDropDown(){
			  //console.log('Desde computed')
			  //console.log(this.$store.getters.universidadesDropDown)
			  return this.$store.getters.empresasDropDown
		  }

	  },
  	methods:{

		enviaJson(api,json){
			console.log('Enviando: ')
			console.log(json)
			return axios.post(api, 
						json,
						{ withCredentials:true })
			.then(function(response){
				return new Promise(function(resolve,reject)
				{
					if(response.data.hasOwnProperty('error')){
						response.jsonFallido = json
						reject(response)
					}	
					else
						resolve(response)
				})
			})
		},
		  
	 	submit(){
       	var vm = this;
      	this.$validator.validateAll().then((result) => {
				if (result||!result) {
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

					//vm.sendData(alum);
					vm.alumno.dominio='alumnos'
					vm.alumno.func = 'insertaAlumno'
					vm.enviaJson(vm.$store.state.api, vm.alumno)
					.then(function (response) {
						vm.alumno.id = response.data.idAlum
						var req = []
						//console.log('Porque no escribe')
						//PREPAS
						vm.prepa.idAlum = vm.alumno.id
						vm.prepa.dominio = 'preparatorias'
						vm.prepa.func = 'insertaPrepAlum_cu'
						vm.prepa.cuAlum = vm.alumno.cu
						req.push(vm.prepa)

						if(vm.alumno.telefono!== ''){
							var telJson = {
								dominio :'telefonos',
								func: 'insertaTelefono',
								cuAlum: vm.alumno.cu,
								descripcion: 'Telefono',
								telefono: vm.alumno.telefono
							}
							req.push(telJson)
						}
						if(vm.alumno.celular!== ''){
							var celJson = {
								dominio :'telefonos',
								func: 'insertaTelefono',
								cuAlum: vm.alumno.cu,
								descripcion: 'Celular',
								telefono: vm.alumno.celular
							}
							req.push(celJson)
						}

						//Act extras
						vm.actExtra.dominio = 'actExtra'
						vm.actExtra.func = 'insertaActividad'
						vm.actExtra.cuAlum = vm.alumno.cu
						req.push(vm.actExtra)

						//Sanciones
						vm.sanciones.dominio = 'sanciones'
						vm.sanciones.func = 'insertaSancion'
						vm.sanciones.cuAlum = vm.alumno.cu
						req.push(vm.sanciones)

						//Comentarios
						vm.coment.dominio = 'comentarios'
						vm.coment.func = 'insertaComentCu'
						vm.coment.cuAlum = vm.alumno.cu
						req.push(vm.coment)

						//Estancia
						vm.universidad.dominio = 'estancias'
						vm.universidad.func = 'registraEstanciaAlumno'
						vm.universidad.cuAlum = vm.alumno.cu
						req.push(vm.universidad)

						//Escuelas
						vm.escuelaAlterna.dominio = 'escuelasAlt'
						vm.escuelaAlterna.func = 'registraAlumEscAlt'
						vm.escuelaAlterna.cuAlum = vm.alumno.cu
						req.push(vm.escuelaAlterna)

						//Registra alumno empresa
						vm.empresa.dominio = 'empresas'
						vm.empresa.func = 'registraAlumEmpresa_cu'
						vm.empresa.cuAlum = vm.alumno.cu
						req.push(vm.empresa)

						
						
						return Promise.all(req.map(function(json){
							return vm.enviaJson(vm.$store.state.api, json)
						}))

					})
					.catch(function (error) {
						console.log('Desde catch de promises')
						console.log(error);
					});
					
				}else{
					alert('Correct them errors!');
				}
      	});
	 	},
	 	clear(){
			 for(var it in this.alumno)
				this.alumno[it] = ''
				
			for(var it in this.prepa)
				this.prepa[it] = ''
			
			for(var it in this.actExtra)
				this.actExtra[it] = ''
			for(var it in this.sanciones)
				this.sanciones[it] = ''
			for(var it in this.universidad)
				this.universidad[it] = ''
			for(var it in this.coment)
				this.coment[it] = ''
			for(var it in this.escuelaAlterna)
				this.escuelaAlterna[it] = ''
	 	}
	  },
	  created(){
		  	var vm = this
			  this.$store.dispatch('fetchPreparatorias')
			  this.$store.dispatch('fetchUniversidades')
			  this.$store.dispatch('fetchEscuelasAlt')
			  this.$store.dispatch('fetchEmpresas')
			  
	  }
	 
}
</script>

<style scoped>

</style>
