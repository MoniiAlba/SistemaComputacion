<template>
    <div>
        <h1>
            Link: {{linkForm}}
        </h1>
        <h1>
            ID: {{idForm}}
        </h1>
        <h1>
            Numero de respuestas : {{numRespuestas}}
        </h1>
        <v-btn @click="empiezaEncuesta()">Empezar encuesta</v-btn>
        <v-btn @click="terminaEncuesta()">Acabar encuesta</v-btn>
        <v-btn @click="getRespuestas()">Respuestas</v-btn>
        </div>
</template>

<script>
import axios from 'axios'
export default {
    data(){
        return{
            encuestaActiva:false,
            numRespuestas:0,
            idForm:'',
            linkForm:''

        }
    },
    methods:{
        empiezaEncuesta(){
            var vm = this
            axios.get('https://script.google.com/macros/s/AKfycbxBPvMwwPgZTDOeqFYJHuw7aEJFIKQTyKLO2_EySYe6CKClMcw/exec')
			.then(function(response){
                console.log(response.data)
                vm.encuestaActiva = true
                vm.idForm = response.data.id
                vm.linkForm = response.data.url
                vm.getNumRespuestas()
                console.log(' en el then ...')
            })
            .catch(function (error) {
                    console.log(error);
                })


        },
        getNumRespuestas(){
            var vm = this
            if(this.encuestaActiva)
            axios.get('https://script.google.com/macros/s/AKfycbxCQpMI7_CRBR_FLadr-0KSmfWXX9PflYvc4NhRUqS5dRIP5l5l/exec',
                {
                params: {
                    id: vm.idForm
                    }
                })
			.then(function(response){
                vm.numRespuestas = response.data.numRespuestas
				console.log(response.data)
            })
            .then(function(response){
                setTimeout(vm.getNumRespuestas, 400);
            })
            .catch(function (error) {
                    console.log(error);
                })
        },

        acabaEncuesta(){

        },

        getRespuestas(){
            var vm = this
            axios.get('https://script.google.com/macros/s/AKfycbxY96kmv9rHGLenpunJUXvphGGPRjN3fY-_HChz_zXBEQHIhXAr/exec',
            {
                params: {
                    id: vm.idForm
                    }
                })
			.then(function(response){
                console.log(response.data)
            })
            .catch(function (error) {
                    console.log(error);
                })
        },

        terminaEncuesta(){
            this.encuestaActiva = false;
            var vm = this
            axios.post(vm.$store.state.api, {
                dominio:'encuestas',
                func:'insertarEncuestas',
                id: vm.idForm
              },
                {
                    withCredentials:true

            })
              .then(function (response) {
                alert('Carga exitosa de datos')
                console.log(response.data)
                

              })
              .catch(function (error) {
                console.log(error);
              });
        }
    }

}
</script>

<style>

</style>
