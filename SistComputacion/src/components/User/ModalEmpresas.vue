<template>
     <v-layout row justify-center>
    <v-dialog v-model="dialog"  max-width="800">
      <v-btn slot="activator" color="primary" dark>Agrega Empresa</v-btn>
      <v-card>
        <v-card-title class="headline">Agrega empresa</v-card-title>
         
        <v-card-text>
          <v-container xs12 sm6>
            <v-layout row wrap>
              <v-flex xs12 sm6 >
                <v-text-field 
                name="empRfc"
                type="text"
                label="Rfc"
                v-model="req.rfc"
                >
                </v-text-field>
              </v-flex>
              <v-flex xs12 sm6>
                <v-text-field
                name="empTelefono"
                type="number"
                label="Telefono"
                v-model="req.telefono"
                >
                </v-text-field>
              </v-flex>
              <v-flex xs12 sm6>
                <v-text-field
                name="empNombre"
                type="text"
                label="Nombre"
                v-model="req.nombre"
                >
                </v-text-field>
              </v-flex>
              <v-flex xs12 sm6>
                <v-text-field
                name="empCalle"
                type="text"
                label="Calle"
                v-model="req.calle"
                >
                </v-text-field>
              </v-flex>
              <v-flex xs12 sm6>
                <v-text-field
                name="empColonia"
                type="text"
                label="Colonia"
                v-model="req.colonia"
                >
                </v-text-field>
              </v-flex>
              <v-flex xs12 sm6>
                <v-text-field
                name="empDelegacion"
                type="text"
                label="Delegacion"
                v-model="req.delegacion"
                >
                </v-text-field>
              </v-flex>
              <v-flex xs12 sm6>
                <v-text-field
                name="empCp"
                type="number"
                label="CP"
                v-model="req.cp"
                >
                </v-text-field>
              </v-flex>
              <v-flex xs12 sm6>
                <v-text-field
                name="empNumExt"
                type="number"
                label="NumExt"
                v-model="req.numExt"
                >
                </v-text-field>
              </v-flex>
              <v-flex xs12 sm6>
                <v-text-field
                name="empNumInt"
                type="number"
                label="NumInt"
                v-model="req.numInt"
                >
                </v-text-field>
              </v-flex>
              <v-flex xs12 sm6>
                <v-text-field
                name="empGiro"
                type="text"
                label="Giro"
                v-model="req.giro"
                >
                </v-text-field>
              </v-flex>
            </v-layout>
            </v-container>
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="red darken-1" flat @click.native="dialog = false">Cancelar</v-btn>
          <v-btn color="green darken-1" flat @click.native="agregarEmpresa">Agregar</v-btn>
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
            rfc:'666',
            telefono:'666',
            estado:'EdoMEx',
            nombre:'Vue',
            calle:'Vue',
            colonia:'Vue',
            delegacion:'Vue',
            cp:'666',
            numExt:'666',
            numInt:'666',
            giro:'Vue'
            }
      }
    },
    methods:{
      agregarEmpresa(){
        this.req.dominio ='empresas'
        this.req.func = 'insertaEmpresa'
        var vm = this
        console.log('Desde modal-empresas')
        axios.post(this.$store.state.api,this.req,
                {
                    withCredentials:true

            })
              .then(function (response) {
                console.log(response)
                vm.dialog=false
                

              })
              .then(function(){
                vm.$store.dispatch('fetchEmpresas')
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
