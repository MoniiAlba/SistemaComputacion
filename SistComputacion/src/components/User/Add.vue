<template>
  <v-container>
	  	<p class="text-xs-center display-1">Agrega un alumno</p>

    	<form>
			<v-container grid-list-md>
				<v-layout row wrap>
					<v-flex>
						<!--PERSONAL INFORMATION-->
						<v-card class="mb-5">
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
						<v-card class="mb-5">
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

						<!--BECAS & PROGRAMA-->
						<v-card>
							<v-card-title>
								<span class="headline">Escolar</span>
							</v-card-title>
							<v-container xs6 sm6>
								<v-layout row wrap>
									<v-flex xs6 sm3>
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
								</v-layout>
							</v-container>
						</v-card>
						<!--BECAS & PROGRAMA-->

						<!--COMENTARIOS-->
						<v-container fluid>
							<v-layout row>
							<v-flex xs12>
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

					<v-container xs12 sm12 class="text-xs-center mt-3">
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
			comentarios:'',

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
	 	submit(){
      	this.$validator.validateAll().then((result) => {
				if (result) {
					let alum = {
						'func':'insertaAlumno',
						'dominio': 'alumnos',
						'nombre': this.nombre,
						'cu': this.cu,
						'beca': this.beca,
						'apellidoP': this.apellidoP,
						'apellidoM': this.apellidoM,
						'programa': this.programa,
						'email': this.email,
						'telefono': this.telefono,
						'estado': this.estado,
						'calle': this.calle,
						'colonia': this.colonia,
						'delegacion': this.delegacion,
						'cp': this.cp,
						'numExt': this.numExt,
						'numInt': this.numInt,
						'comentarios': this.comentarios};
					var json = alum.JSON.stringify(alum);
					var xhttp = new XMLHttpRequest();

					xhttp.onreadystatechange = function(){
						if (this.readyState == 4 && this.status == 200){
							console.log('Alta exitosa');
						}
					}
					xhttp.open('POST', 'http://alumnoscomputacion.itam.mx/php/', true);
					xhttp.send(json);
					alert('From Submitted!');
					clear();
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
	 	}
  	}
}
</script>

<style scoped>

</style>
