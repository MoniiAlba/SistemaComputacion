<template>
    <v-card color="blue-grey lighten-4" >
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
                        px-2>
                        <v-text-field
                            :label="k"
                            :value="val"
                            
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
            ]
        }
    },
    computed:{
        alumno(){
            //console.log('en computed ')
            //console.log(this.$store.getters.alumnoSeleccionado)
            return this.$store.getters.alumnoSeleccionado
        }
    }

}
</script>

<style>

</style>
