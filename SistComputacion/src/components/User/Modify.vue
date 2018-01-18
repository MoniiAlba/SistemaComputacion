<template>
  <v-container class="text-xs-center">
    <p class="text-xs-center display-1">Consulta o agrega comentarios</p>
    <v-container fluid grid-list>
      <v-layout row wrap>
        <v-flex xs4 offset-xs4>
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
      </v-layout>
      <v-btn color="success" @click="getStudent">Get student</v-btn>
    </v-container>

  </v-container>
</template>

<script>
export default {
  data(){
    return{
      cu: ''
    }
  },
  methods:{
    getStudent(){
      this.$validator.validateAll().then((result) => {
        if (result) {
          var request = {
            'dominio': 'alumnos',
            'cu': this.cu
          };
          var json = JSON.stringify(request);
          var xhttp = new XMLHttpRequest();

					xhttp.onreadystatechange = function(){
						if (this.readyState == 4 && this.status == 200){
              var res = JSON.parse(this.xhttp.response);
              console.log('bien');
              console.log(res);
						}
					}
					xhttp.open('POST', 'http://alumnoscomputacion.itam.mx/php/', true);
					xhttp.send(json);
        }else{
          alert('Error');
        }
      });
    }
  }
}
</script>

<style scoped>

</style>