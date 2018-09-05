<template>
    <v-card color="blue-grey lighten-4"  class="contenedor">
          <v-card-title primary class="title">
              <v-container>
            <v-layout row wrap>
                <v-flex xs5>
                <v-select
                name="consulta"
                v-model="consulta"
                label="Consulta"
                :items = "consultas"
                autocomplete
                >
                </v-select>
                </v-flex>
                </v-layout>
                </v-container>
                
            </v-card-title>
          <v-card-text>
              <v-container>
                  <v-layout row wrap>
                      <v-flex xs3 sm3
                        v-for="(val, k) in alumno"
                        :key="k"
                        v-if="consulta==0||consulta==8"
                        px-2>
                        <v-text-field
                            :label="k"
                            :value="val"
                            
                            disabled
                        ></v-text-field>
                    </v-flex>
                    <!--te amo-->  
                    <!-- Act extra-->
                    <v-flex xs3 sm3
                        v-for="(val, k) in infoAlumno.actExtra"
                        :key="k"
                        px-2
                        v-if="consulta==2||consulta==8">
                        <v-text-field
                            :label="k"
                            :value="val"
                            
                            disabled
                        ></v-text-field>
                    </v-flex>
                    <!-- Empresa-->
                    <v-flex xs3 sm3
                        v-for="(val, k) in infoAlumno.empresa"
                        :key="k"
                        px-2
                        v-if="consulta==6||consulta==8">
                        <v-text-field
                            :label="k"
                            :value="val"
                            
                            disabled
                        ></v-text-field>
                    </v-flex>
                    <!-- EscuelasAlt-->
                    <v-flex xs3 sm3
                        v-for="(val, k) in infoAlumno.escuelaAlt"
                        :key="k"
                        px-2
                        v-if="consulta==5||consulta==8">
                        <v-text-field
                            :label="k"
                            :value="val"
                            
                            disabled
                        ></v-text-field>
                    </v-flex>
                    <!-- Estancia-->
                    <v-flex xs3 sm3
                        v-for="(val, k) in infoAlumno.estancia"
                        :key="k"
                        px-2
                        v-if="consulta==4||consulta==8">
                        <v-text-field
                            :label="k"
                            :value="val"
                            
                            disabled
                        ></v-text-field>
                    </v-flex>
                    <!-- Comentario-->
                    <v-flex xs3 sm3
                        v-for="(val, k) in infoAlumno.comentarios[0]"
                        :key="k"
                        px-2
                        v-if="consulta==7||consulta==8">
                        <v-text-field
                            :label="k"
                            :value="val"
                            
                            disabled
                        ></v-text-field>
                    </v-flex>
                    <!-- Preparatoria-->
                    <v-flex xs3 sm3
                        v-for="(val, k) in infoAlumno.preparatoria"
                        :key="k"
                        px-2
                        v-if="consulta==1||consulta==8">
                        <v-text-field
                            :label="k"
                            :value="val"
                            
                            disabled
                        ></v-text-field>
                    </v-flex>
                    <!-- Sancion-->
                    <v-flex xs3 sm3
                        v-for="(val, k) in infoAlumno.sancion"
                        :key="k"
                        px-2
                        v-if="consulta==3||consulta==8">
                        <v-text-field
                            :label="k"
                            :value="val"
                            
                            disabled
                        ></v-text-field>
                    </v-flex>
                    <!-- Telefonos-->
                    <v-flex xs3 sm3
                        v-for="t in infoAlumno.telefonos"
                        :key="t.Telefono"
                        px-2
                        v-if="consulta==0||consulta==8">
                        <v-text-field
                            :label="t.Descripcion"
                            :value="t.Telefono"
                            disabled
                        ></v-text-field>
                    </v-flex>
                    
                    
                  </v-layout>
              </v-container>
          </v-card-text>
        </v-card>
</template>

<script>
export default {
    data(){
        return{
            consulta:0,
            seleccion:null,
            consultas:[
                {text:"Informacion personal", value:0},
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
        }
    }

}
</script>

<style>
.contenedor{
    overflow:scroll;
}

</style>
