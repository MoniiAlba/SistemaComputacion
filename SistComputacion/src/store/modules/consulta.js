import axios from 'axios'

export default{
    state:{
        tabla:[],
        seleccion:0,
        infoAlumno:null
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
        },
        infoAlumno(state){
            var res = {}
            if(state.infoAlumno != null)
                res = state.infoAlumno

            return res
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
        actualizaSeleccion(context, cu){
            context.commit('setSeleccion', cu)
            context.dispatch('fetchInfoAlumnoSeleccionado', cu)
        },
        fetchInfoAlumnoSeleccionado(context, cuAlum){

            var reqBody = {
                dominio:'alumnos',
                func:'alumnoInfo_cu',
                cu:cuAlum}
            return axios.post(context.rootState.api, reqBody,{ withCredentials:true})
              .then(function (response) {
                //console.log('Desde vuex')
                //console.log(response);
                //console.log(response.data)
                //console.log(response.data)
                if(!response.data.hasOwnProperty('error')){
                    console.log('InfoAlumno:')
                    console.log(response.data)
                    var infoAlum={
                        actExtra:response.data[0],
                        empresa:response.data[1],
                        escuelaAlt:response.data[2],
                        estancia:response.data[3],
                        comentarios:response.data[4],
                        preparatoria:response.data[5],
                        sancion:response.data[6],
                        telefonos:response.data[7]
                    }
                    console.log(infoAlum)
                    context.commit('setInfoAlumno', infoAlum)
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
        },
        setSeleccion(state, cu){
            state.seleccion=cu
        },
        setInfoAlumno(state,infoAlumno){
            state.infoAlumno = infoAlumno;
        }

    }
    
}