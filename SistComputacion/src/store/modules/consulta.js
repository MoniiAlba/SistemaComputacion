import axios from 'axios'

export default{
    state:{
        tabla:[],
        seleccion: 0,
        consulta: null,
        bandDatos: false,
        infoAlumno:{
                    actExtra:{
                        Actividad: "",
                        Tipo: ""
                    },
                    comentarios:[
                        {
                            Comentario: "",
                            Asunto: ""
                        }
                    ],
                    empresa:{
                        Puesto: "",
                        FechaDeInicio: "",
                        Rfc: "",
                        Telefono: "",
                        Estado: "",
                        Nombre: "",
                        Calle: "",
                        Colonia: "",
                        Delegacion: "",
                        Cp: "",
                        NumeroExterior: "",
                        NumeroInterior: "",
                        Giro: ""
                    },
                    escuelaAlt:{
                        Carrera: "",
                        Universidad: ""
                    },
                    estancia:{
                        Fecha: "",
                        Universidad: "",
                        Pais: "",
                        Ciudad: ""
                    },
                    preparatoria:{
                        Preparatoria: "",
                        Promedio: "",
                        ComoConocioItam: "",
                        TomoTutoria: ""
                    },
                    sancion:{
                        Descripcion: "",
                        Area: "",
                        Reglamento: ""
                    },
                    telefonos:[
                        {
                            Descripcion: "Telefono",
                            Telefono: ""
                        },
                        {
                            Descripcion: "Celular",
                            Telefono: ""
                        }
                    ]
        }
        
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
            return state.infoAlumno
        },
        getCons(state){
            return state.consulta
        },
        getBand(state){
            return state.bandDatos
        },
        getSeleccion(state){
            return state.seleccion
        }

    },

    actions:{
        fetchAlumnos(context,  reqBody){
            return axios.post(context.rootState.api, reqBody,{ withCredentials:true})
              .then(function (response) {
                console.log('Desde vuex')
                console.log(response);
                console.log(response.data)
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
            //context.commit('setCons')
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
        },
        setCons(state){
            if(state.consulta!=null)
                state.consulta = null;
                //state.infoAlumno = null;
        }

    }
    
}