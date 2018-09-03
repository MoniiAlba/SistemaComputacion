import axios from 'axios'

export default{
    state:{
        tabla:[],
        seleccion:0
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
        },
        alumnoSeleccionado(state){
            return state.tabla.find(function(e){
                return e.cu ===state.seleccion
            })
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

        },
        fetchInfoAlumnoSeleccionado(context){
            
        }

    },

    mutations:{
        setTabla(state, alumnos){
            state.tabla = alumnos
        },
        setSeleccion(state, indice){
            state.seleccion=indice
        }

    }
    
}