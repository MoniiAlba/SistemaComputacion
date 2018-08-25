import Vuex from 'vuex'
import Vue from 'vue'

Vue.use(Vuex)

export default new Vuex.Store({

    state: { //data
        alumno:{
            cu: '',
            nombre: ''
        }
    },

    getters:{//computed properties
        tengoSesion(){
            return true;
        }
    },

    actions: {//methods
        fetchPreparatorias(){

        }
    },

    mutations:{
        setPreparatorias(state, payload){

        }
    }
})