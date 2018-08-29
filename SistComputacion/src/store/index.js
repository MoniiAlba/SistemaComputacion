import Vuex from 'vuex'
import Vue from 'vue'
import axios from 'axios'


Vue.use(Vuex)

export default new Vuex.Store({

    state: { //data
        alumno:{
            cu:'',
			beca:'',
			nombre:'',
			apellidoP:'',
			apellidoM:'',
			programa:'',
			email:'',
			telefono:'',
			estado:'',
			calle:'',
			colonia:'',
			delegacion:'',
			cp:'',
			numExt:'',
			numInt:''
        },
        api :'http://localhost/SistemaComputacion/SistComputacion/php/',

        preparatorias: null,
    },

    getters:{//computed properties
        tengoSesion(){
            return true;
        }
    },

    actions: {//methods
        fetchPreparatorias(context){
            var aux = []

            axios.post(context.state.api, {
                dominio:'preparatorias',
				func:'preparatorias'
              },
                {
                    withCredentials:true

            })
              .then(function (response) {
                //console.log('Desde vuex')
                //console.log(response);
                //console.log(response.data)
                context.commit('setPreparatorias', response.data)
                

              })
              .catch(function (error) {
                console.log(error);
              });

        }
    },

    mutations:{
        setPreparatorias(state, preparatorias){
            state.preparatorias = preparatorias
        }
    }
})