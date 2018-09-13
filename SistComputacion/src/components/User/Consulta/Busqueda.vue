<template>
    <v-layout column style="height:100%">
    <v-flex style="height:400px;max-height:400px">
        <v-card  dark  p-0 class="sec" style="height:100%;max-height:100%">
        <v-card-title primary class="title" pb-0>Busqueda</v-card-title>
        <v-card-text style="padding-top:0">
            <v-container fluid pt-0>
                <v-layout column>
                    <v-flex >
                        <v-select
                        :items = 'criterios'
                        label = "Criterios"
                        v-model="criterio"
                        ></v-select>
                    </v-flex>
                    <template v-if="criterio==1">   
                        <v-flex >
                            <v-text-field
                            name="nombre"
                            v-model="nombre.nombre"
                            type="text"
                            label="Nombre"
                            >
                            </v-text-field>
                        </v-flex>
                        <v-flex >
                            <v-text-field
                            name="apellP"
                            v-model="nombre.apellidoP"
                            type="text"
                            label="Apellido paterno"
                            >
                            </v-text-field>
                        </v-flex>
                        <v-flex >
                            <v-text-field
                            name="apellM"
                            v-model="nombre.apellidoM"
                            type="text"
                            label="Apellido materno"
                            >
                            </v-text-field>
                        </v-flex>
                    </template>
                    <template v-if="criterio==2">
                        <v-flex >
                            <v-text-field
                            name="cu"
                            v-model="cu"
                            type="text"
                            label="cu"
                            >
                            </v-text-field>
                        </v-flex>
                    </template>
                    <template v-if="criterio==3">
                        <v-flex >
                            <v-select
                            :items = 'estados'
                            label = "estado"
                            v-model="estado"
                            ></v-select>
                        </v-flex>
                    </template>
                    <v-flex >
                        <v-btn large color="blue" @click="getAlumnos()" class="boton" dark >Buscar</v-btn>
                    </v-flex> 
                </v-layout>
            </v-container>
            </v-card-text>
        </v-card>
        </v-flex>
        <v-flex style="height:200px;">
            <v-data-table
            :headers="headers"
            :items="itemsTabla"
            hide-actions
            class="elevation-1 tabla"
            >
                <template slot="items" slot-scope="props">
                <tr @click="setSeleccion(props.item.cu)">
                <td>{{ props.item.cu}}</td>
                <td class="text-xs-right">{{ props.item.nombre }}</td>
                </tr>
                </template>
            </v-data-table>
        </v-flex>
    </v-layout>
</template>

<script>
import Resultados from './Resultados.vue'
export default {
    data(){
        return{
            cuSeleccionado:'',
            headers: [
        {
          text: 'CU',
          align: 'left',
          sortable: true,
          value: 'cu'
        },
        { text: 'Nombre', 
          value: 'nombre' }
      ],
        alumnos: [
        {
          value: false,
          nombre: 'Andres Cruz y Vera',
          cu:'155899'
        },
        {
          value: false,
          nombre: 'Andres Cruz y Vera',
          cu:'155899'
        }
      ],
            criterios:[
                {text:'Nombre',value:1},
                {text:'Clave única',value:2},
                {text:'Estado',value:3}
            ],
            criterio : '',
            nombre:{
                nombre:'',
                apellidoP:'',
                apellidoM:''
            },
            estado:'',
            cu:'',
            estados:[
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
    computed:{
        itemsTabla(){
            return this.$store.getters.itemsTabla
        }

    },

    methods:{
        setSeleccion(cu){
            //console.log(cu)
            this.$store.dispatch('actualizaSeleccion', cu)
            this.$store.commit('seleccionn')
            console.log("watcheando busqueda: ", this.$store.getters.getSelec)
        },
        getAlumnos(){
            var req = {dominio:'alumnos'}
            if(this.criterio == 1){//por nombre
                req.func = 'alumnos_nombreCompleto'
                var key
                for(key in this.nombre){
                    if(this.nombre[key].trim() !== '')
                        req[key] = this.nombre[key]
                }
            }
            else
                if(this.criterio == 2){
                    req.func = 'alumno_cu'
                    req.cu = this.cu
                }
                else{
                    req.func = 'alumnos_estado'
                    req.estado = this.estado
                }

            this.$store.dispatch('fetchAlumnos', req)
        }
    }

}
</script>

<style scoped>
.tabla{
    overflow:scroll;
    overflow-x: hidden;
    overflow-y: auto;
    height: 218px;
    max-height: 218px;
}
.boton{
    height: 30px;
}
</style>
