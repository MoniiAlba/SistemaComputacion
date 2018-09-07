<template>
     <v-layout row justify-center>
    <v-dialog v-model="dialog"  max-width="800">
      <v-btn slot="activator" color="primary" dark>Agrega Universidad</v-btn>
      <v-card>
        <v-card-title class="headline">Agrega universidad</v-card-title>
         
        <v-card-text>
          <v-container xs12 sm6>
            <v-layout row wrap>
              <v-flex xs12 sm6 >
                <v-text-field 
                name="nomUni"
                type="text"
                label="Nombre de la universidad"
                v-model="req.nomUni"
                >
                </v-text-field>
              </v-flex>
              <v-flex xs12 sm6>
                <v-text-field
                name="nomPais"
                type="text"
                label="Pais"
                v-model="req.nomPais"
                >
                </v-text-field>
              </v-flex>
              <v-flex xs12 sm6>
                <v-text-field
                name="ciudad"
                type="text"
                label="Ciudad"
                v-model="req.nomCiudad"
                >
                </v-text-field>
              </v-flex>
            </v-layout>
            </v-container>
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="red darken-1" flat @click.native="dialog = false">Cancelar</v-btn>
          <v-btn color="green darken-1" flat @click.native="agregarUniversidad">Agregar</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-layout>
  
</template>

<script>
import axios from 'axios'
export default {
  data () {
      return {
        dialog: false,
        req:{
            nomUni:'',
            nomPais:'',
            nomCiudad:''
            }
      }
    },
    methods:{
      agregarUniversidad(){
        this.req.dominio ='estancias'
        this.req.func = 'insertaUniversidad'
        var vm = this
        console.log('Desde modal-estancias')
        axios.post(this.$store.state.api,this.req,
                {
                    withCredentials:true

            })
              .then(function (response) {
                console.log(response)
                vm.dialog=false
                

              })
              .then(function(){
                vm.$store.dispatch('fetchUniversidades')
              })
              .catch(function (error) {
                console.log(error);
                vm.dialog=false
              });
      }
    }

}
</script>

<style>

</style>
