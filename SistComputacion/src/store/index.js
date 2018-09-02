import Vuex from 'vuex'
import Vue from 'vue'
import axios from 'axios'
import consulta from './modules/consulta.js'

Vue.use(Vuex)

export default new Vuex.Store({

    modules:{
        consulta
    },

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
        universidades:null,
        escuelasAlt:[],
        empresas:[]
    },

    getters:{//computed properties
        tengoSesion(){
            return true;
        },

        universidadesDropDown(state){
            var aux = []
            if(state.universidades != null){
                state.universidades.forEach(element => {
                    aux.push({text: element.universidad,
                    value: element.idEst})
                });
            }

            return aux
        },
        escuelasDropDown(state){
            var aux = []
            
                state.escuelasAlt.forEach(element => {
                    aux.push({text: element.nombre,
                    value: element.idEsc})
                });
            

            return aux
        },
        empresasDropDown(state){
            var aux = []
            
                state.empresas.forEach(element => {
                    aux.push({text: element.nombre,
                    value: element.rfc})
                });
            

            return aux
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

        },

        fetchUniversidades(context){
            return axios.post(context.state.api, {
                dominio:'estancias',
				func:'universidades'
              },
                {
                    withCredentials:true

            })
              .then(function (response) {
                //console.log('Desde vuex')
                //console.log(response);
                //console.log(response.data)
                context.commit('setUniversidades', response.data)
                return response
                

              })
              .catch(function (error) {
                console.log(error);
              });

        },
        fetchEscuelasAlt(context){
            return axios.post(context.state.api, {
                dominio:'escuelasAlt',
				func:'escuelasAlt'
              },
                {
                    withCredentials:true

            })
              .then(function (response) {
                //console.log('Desde vuex')
                //console.log(response);
                //console.log(response.data)
                //console.log(response.data)
                context.commit('setEscuelas', response.data)
                return response
                

              })
              .catch(function (error) {
                console.log(error);
              });

        },
        fetchEmpresas(context){
            return axios.post(context.state.api, {
                dominio:'empresas',
				func:'empresas'
              },
                {
                    withCredentials:true

            })
              .then(function (response) {
                //console.log('Desde vuex')
                //console.log(response);
                //console.log(response.data)
                //console.log(response.data)
                context.commit('setEmpresas', response.data)
                return response
                

              })
              .catch(function (error) {
                console.log(error);
              });

        }
    },

    mutations:{
        setPreparatorias(state, preparatorias){
            state.preparatorias = preparatorias
        },
        setUniversidades(state, universidades){
            state.universidades = universidades
        },
        setEscuelas(state, escuelas){
            state.escuelasAlt = escuelas
        },
        setEmpresas(state, empresas){
            state.empresas = empresas
        }
    }
})