<template>
    <v-card color="blue-grey lighten-5"  class="contenedor" flat>
          <v-card-title primary class="title">
              <v-container>
            <v-layout row wrap>
                <v-flex xs5>
                <v-select
                name="consulta"
                v-model="consulta"
                label="Consultas"
                :items = "consultas"
                autocomplete
                >
                </v-select>
                </v-flex>
                </v-layout>
                <div class="btnEdita">
                    <router-link :to="{name: 'modifica'}">
                        <v-btn v-if="bandDatos" class="edit" color="info" href="/home/modifica" title="Editar"><v-icon>edit</v-icon></v-btn>
                    </router-link>                  
                </div>
                </v-container>
                
                
            </v-card-title>

            <!--Info. Personal-->
            <v-card color="blue-grey lighten-5" class="contenedor" flat v-if="consulta==0 || consulta==8">
                <v-card-title>
                    <h3>Información personal</h3>
                </v-card-title>

                <v-card-text>
                    <v-layout row wrap>
                        <v-flex xs3 sm3
                            v-for="(val, k) in alumno"
                            :key="k"
                            px-2>
                            <v-text-field
                                :label="k"
                                :value="val"
                                
                                readonly
                            ></v-text-field>
                        </v-flex>

                        <v-flex xs3 sm3
                            v-for="t in infoAlumno.telefonos"
                            :key="t.Descripcion+t.Telefono"
                            px-2>
                            <v-text-field
                                :label="t.Descripcion"
                                :value="t.Telefono"
                                readonly
                            ></v-text-field>
                        </v-flex>
                    </v-layout>
                </v-card-text>
            </v-card>

            <!--Act. extra-->
            <v-card color="blue-grey lighten-5" class="contenedor" flat v-if="consulta == 2 || consulta==8">
                <v-card-title>
                    <h3>Actividad extra</h3>
                </v-card-title>

                <v-card-text>
                    <v-layout row wrap>
                        <v-flex xs3 sm3
                            v-for="(val, k) in infoAlumno.actExtra"
                            :key="k"
                            px-2
                            >
                            <v-text-field
                                :label="k"
                                :value="val"
                                
                                readonly
                            ></v-text-field>
                        </v-flex>
                    </v-layout>
                </v-card-text>
            </v-card>

            <!--Empresa-->
            <v-card color="blue-grey lighten-5" class="contenedor" flat v-if="consulta == 6 || consulta==8">
                <v-card-title>
                    <h3>Empresa</h3>
                </v-card-title>

                <v-card-text>
                    <v-layout row wrap>
                        <v-flex xs3 sm3
                            v-for="(val, k) in infoAlumno.empresa"
                            :key="k"
                            px-2>
                            <v-text-field
                                :label="k"
                                :value="val"
                                
                                readonly
                            ></v-text-field>
                        </v-flex>
                    </v-layout>
                </v-card-text>
            </v-card>

            <!--Esc. Alternas-->
            <v-card color="blue-grey lighten-5" class="contenedor" flat v-if="consulta==5 || consulta==8">
                <v-card-title>
                    <h3>Escuela alterna</h3>
                </v-card-title>

                <v-card-text>
                    <v-layout row wrap>
                        <v-flex xs3 sm3
                            v-for="(val, k) in infoAlumno.escuelaAlt"
                            :key="k"
                            px-2>
                            <v-text-field
                                :label="k"
                                :value="val"
                                
                                readonly
                            ></v-text-field>
                        </v-flex>
                    </v-layout>
                </v-card-text>
            </v-card>

            <!--Estancia-->
            <v-card color="blue-grey lighten-5" class="contenedor" flat v-if="consulta==4 || consulta==8">
                <v-card-title>
                    <h3>Intercambio académico</h3>
                </v-card-title>

                <v-card-text>
                    <v-layout row wrap>
                        <v-flex xs3 sm3
                            v-for="(val, k) in infoAlumno.estancia"
                            :key="k+'Uni'"
                            px-2>
                            <v-text-field
                                :label="k"
                                :value="val"
                                
                                readonly
                            ></v-text-field>
                        </v-flex>
                    </v-layout>
                </v-card-text>
            </v-card>

            <!--Comentario-->
            <v-card color="blue-grey lighten-5" class="contenedor" flat v-if="consulta==7 || consulta==8">
                <v-card-title>
                    <h3>Comentario</h3>
                </v-card-title>

                <v-card-text>
                    <v-layout row wrap>
                        <v-flex xs3 sm3
                            v-for="(val, k) in infoAlumno.comentarios[0]"
                            :key="k"
                            px-2>
                            <v-text-field
                                :label="k"
                                :value="val"
                                
                                readonly
                            ></v-text-field>
                        </v-flex>
                    </v-layout>
                </v-card-text>
            </v-card>

            <!--Prepa-->
            <v-card color="blue-grey lighten-5" class="contenedor" flat v-if="consulta==1 || consulta==8">
                <v-card-title>
                    <h3>Preparatoria</h3>
                </v-card-title>

                <v-card-text>
                    <v-layout row wrap>
                        <v-flex xs3 sm3
                            v-for="(val, k) in infoAlumno.preparatoria"
                            :key="k"
                            px-2>
                            <v-text-field
                                :label="k"
                                :value="val"
                                
                                readonly
                            ></v-text-field>
                        </v-flex>
                    </v-layout>
                </v-card-text>
            </v-card>

            <!--Problemas-->
            <v-card color="blue-grey lighten-5" class="contenedor" flat v-if="consulta==3 || consulta==8">
                <v-card-title>
                    <h3>Problemas reglamento</h3>
                </v-card-title>

                <v-card-text>
                    <v-layout row wrap>
                        <v-flex xs3 sm3
                            v-for="(val, k) in infoAlumno.sancion"
                            :key="k"
                            px-2>
                            <v-text-field
                                :label="k"
                                :value="val"
                                
                                readonly
                            ></v-text-field>
                        </v-flex>
                    </v-layout>
                </v-card-text>
            </v-card>
                    <!--te amo-->  

        </v-card>
</template>

<script>
export default {
    data(){
        return{
            consulta: null,
            seleccion:null,
            bandDatos: false,
            consultas:[
                {text:"Información personal", value:0},
                {text:"Preparatoria", value:1},
                {text:"Actividades extra", value:2},
                {text:"Problemas reglamento", value:3},
                {text:"Intercambio académico", value:4},
                {text:"Escuela alterna", value:5},
                {text:"Empresa", value:6},
                {text:"Comentarios", value:7},
                {text:"Todo", value:8}
            ]
        }
    },
    computed:{
        alumno(){
            //console.log('en computed ')
            //console.log(this.$store.getters.alumnoSeleccionado)
            return this.$store.getters.alumnoSeleccionado
        },
        infoAlumno(){
            return this.$store.getters.infoAlumno
        },
        select(){
            this.consulta = this.$store.getters.getCons
            this.bandDatos = this.$store.getters.getBand
            console.log("computeando: ", this.$store.getters.getCons)
        }
        
    },
    watch:{
        select(){
            console.log("watcheando: "+this.$store.consulta.state.seleccion)
            this.bandDatos = true;
            return this.$store.consulta.state.seleccion
        }
    }

}
</script>

<style>
.contenedor{
    overflow:scroll;
    overflow-x: hidden;
    overflow-y: auto;
}
.btnEdita{
    height: 13px;
}
.edit{
    position: absolute;
    right: 60px;
}



</style>
