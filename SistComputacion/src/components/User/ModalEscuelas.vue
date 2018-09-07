<template>
     <v-layout row justify-center>
    <v-dialog v-model="dialog"  max-width="800">
      <v-btn slot="activator" color="primary" dark>Agrega Escuela</v-btn>
      <v-card>
        <v-card-title class="headline">Agrega Escuela</v-card-title>
         
        <v-card-text>
          <v-container xs12 sm6>
            <v-layout row wrap>
              <v-flex xs12 sm6>
                <v-text-field
                name="nombre"
                type="text"
                label="Nombre de universidad"
                v-model="req.nombre"
                >
                </v-text-field>
              </v-flex>
            </v-layout>
            </v-container>
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="red darken-1" flat @click.native="dialog = false">Cancelar</v-btn>
          <v-btn color="green darken-1" flat @click.native="agregarEscuela">Agregar</v-btn>
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
            nombre:''
            }
      }
    },
    methods:{
      agregarEscuela(){
        this.req.dominio ='escuelasAlt'
        this.req.func = 'insertaEscuelaAlt'
        var vm = this
        console.log('Desde modal-escuelas')
        axios.post(this.$store.state.api,this.req,
                {
                    withCredentials:true

            })
              .then(function (response) {
                console.log(response)
                vm.dialog=false
                

              })
              .then(function(){
                vm.$store.dispatch('fetchEscuelasAlt')
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
