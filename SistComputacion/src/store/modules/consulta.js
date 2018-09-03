import axios from 'axios'

export default{
    state:{
        tabla:[]
    },

    getters:{
        itemsTabla(state){
            var aux = []
            state.tabla.forEach(e => {
                aux.push({
                    value: false,
                    nombre: e.nombre+" "+ e.apellidoP+" "+ e.apellidoM,
                    cu: e.cu
                })
            })
            return aux
        }

    },

    actions:{
        fetchAlumnos(context,  reqBody){
            return axios.post(context.rootState.api, reqBody,{ withCredentials:true})
              .then(function (response) {
                //console.log('Desde vuex')
                //console.log(response);
                //console.log(response.data)
                //console.log(response.data)
                if(!response.data.hasOwnProperty('error')){
                    console.log(response.data)
                    context.commit('setTabla', response.data)
                    return response
                }
                else
                return Promise.reject(response)
                

              })
              .catch(function (error) {
                console.log(error);
              });

        }

    },

    mutations:{
        setTabla(state, alumnos){
            state.tabla = alumnos
        }

    }
    
}