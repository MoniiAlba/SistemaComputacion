<template>
    <v-card color="blue-grey lighten-4" >
          <v-card-title primary class="title">Lorem</v-card-title>
          <v-card-text>
              <v-container>
                  <v-layout row wrap>
                      <v-flex xs3 sm3
                        v-for="(val, k) in alumno"
                        :key="k"
                        px-5>
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

        }
    },
    computed:{
        alumno(){
            console.log('en computed ')
            console.log(this.$store.getters.alumnoSeleccionado)
            return this.$store.getters.alumnoSeleccionado
        }
    }

}
</script>

<style>

</style>
