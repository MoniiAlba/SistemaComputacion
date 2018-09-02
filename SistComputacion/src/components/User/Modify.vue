<template>
  <v-container fluid grid-list>
    <v-layout row wrap>
      <v-flex d-flex xs12 sm6 md3>
       <busqueda> </busqueda>  
      </v-flex>
      <v-flex d-flex xs12 sm6 md9>
        <v-card color="indigo" dark>
          <v-card-title primary class="title">Lorem</v-card-title>
          <v-card-text>{{ lorem }}</v-card-text>
        </v-card>
      </v-flex>


    </v-layout>


  </v-container>
</template>

<script>
import Busqueda from './Consulta/Busqueda.vue'
export default {
  components:{
    Busqueda
  },
  data(){
    return{
      cu: '',
      arr:''  ,
      lorem: 'Lorem ipsum dolor sit amet, mel at clita quando. Te sit oratio vituperatoribus, nam ad ipsum posidonium mediocritatem, explicari dissentiunt cu mea. Repudiare disputationi vim in, mollis iriure nec cu, alienum argumentum ius ad. Pri eu justo aeque torquatos.'
    }
  },
  methods:{
    getStudent(){
      var vm = this;
      this.$validator.validateAll().then((result) => {
        if (result) {
          var request = {
            'dominio': 'alumnos',
            'func' : 'alumno_cu',
            'cu': this.cu
          };
          var json = JSON.stringify(request);
          var xhttp = new XMLHttpRequest();

					xhttp.onreadystatechange = function(){
						if (this.readyState == 4 && this.status == 200){
              var res = JSON.parse(this.response);
              vm.arr = res;
						}
					}
					xhttp.open('POST', 'http://alumnoscomputacion.itam.mx/php/', true);
					xhttp.send(json);
        }else{
          alert('Error de validación');
        }
      });
    },
  }
}
</script>

<style scoped>
li{

}
</style>