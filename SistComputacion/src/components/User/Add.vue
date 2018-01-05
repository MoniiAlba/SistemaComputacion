<template>
  <v-container>
    <v-card>
      <form>
        <v-card-title>
          <span class="headline">Agregar alumno</span>
        </v-card-title>

        <v-container grid-list-md>
          <v-layout row wrap>

            <!--PERSONAL INFORMATION-->
            <v-container xs12 sm12>
              <v-layout row wrap>

                <v-flex xs12 sm3>
                  <v-text-field 
                    box 
                    label="Clave Única"
                  ></v-text-field>
                </v-flex>

                <v-flex xs12 sm3>
                  <v-text-field
                    box
                    label="Nombre completo"
                  ></v-text-field>
                </v-flex>

                <v-flex xs12 sm3>
                  <v-text-field
                    box
                    label="Teléfono"
                  ></v-text-field>
                </v-flex>

                <v-flex xs12 sm3>
                  <v-text-field
                    box
                    label="E-mail"
                  ></v-text-field>
                </v-flex>

              </v-layout>
            </v-container>
            <!--PERSONAL INFORMATION-->

            <!--ADDRESS-->
            <v-container xs12 sm6>
              <v-layout row wrap>

                <v-flex xs12 sm3>
                  <v-text-field 
                    box 
                    label = "Calle"
                  ></v-text-field>
                </v-flex>

                <v-flex xs12 sm3>
                  <v-text-field 
                    box 
                    label = "Número exterior"
                  ></v-text-field>
                </v-flex>

                <v-flex xs12 sm3>
                  <v-text-field 
                    box 
                    label = "Número interior"
                  ></v-text-field>
                </v-flex>

                <v-flex xs12 sm3>
                  <v-text-field 
                    box 
                    label = "Colonia"
                  ></v-text-field>
                </v-flex>

                <v-flex xs12 sm3>
                  <v-select
                  :items = "states"
                  label = "Estado"
                  single-line
                  bottom
                  ></v-select>
                </v-flex>

                <v-flex xs12 sm3>
                  <v-text-field 
                    box 
                    label = "Delegación"
                  ></v-text-field>
                </v-flex>

                <v-flex xs12 sm3>
                  <v-text-field 
                    box 
                    label = "Código postal"
                  ></v-text-field>
                </v-flex>

              </v-layout>
            </v-container>
            <!--ADDRESS-->

            <!--BECAS & PROGRAMA-->
            <v-container xs6 sm6>
              <v-layout row wrap>

                <v-flex xs6 sm3>
                  <v-select
                  :items = "percentage"
                  label = "Porcentaje de beca"
                  segmented
                  single-line
                  bottom
                  ></v-select>
                </v-flex>

                <v-flex xs12 sm6>
                  <v-select
                  :items = "programs"
                  label = "Programa"
                  segmented
                  single-line
                  bottom
                  ></v-select>
                  </v-flex>

              </v-layout>
            </v-container>
            <!--BECAS & PROGRAMA-->

            <v-container xs12 sm12 class="text-xs-center mt-3">
              <v-btn large color="green" dark>submit</v-btn>
              <v-btn large color="red" dark>clear</v-btn>
            </v-container>

          </v-layout>
        </v-container>
      </form>
    </v-card>
  </v-container>
</template>

<script>

export default {

  data(){
    return{

      percentage: [
        { text: '0' , value: 0 },
        { text: '10' , value: 10 },
        { text: '20' , value: 20 },
        { text: '30' , value: 30 },
        { text: '40' , value: 40  },
        { text: '50' , value: 50  },
        { text: '60' , value: 60  },
        { text: '70' , value: 70  },
        { text: '80' , value: 80  },
        { text: '90' , value: 90  },
        { text: 'Bailléres' , value: 100 }
      ],

      programs:[
        {text: 'Ingeniería en Computación'},
        {text: 'Lic. en Administración e Ing. en Computación'},
        {text: 'Ing. en Computación e Ing. Industrial'},
        {text: 'Ing. en Computación y Lic. en Matemáticas aplicadas'},
        {text: 'Ing. en Computación e Ing. en Mecátronica'},
        {text: 'Ing. en Computación e Ing. en Negocios'},
        {text: 'Ing. en Computación e Ing. en Telecomunicaciones'},
        {text: 'Ing. en Computación e Ing. en Telemática'}
      ],
    
      states:[
        {text: 'Aguascalientes'},
        {text: 'Baja California'},
        {text: 'Baja California Sur'},
        {text: 'Campeche'},
        {text: 'Coahuila de Zaragoza'},
        {text: 'Colima'},
        {text: 'Chiapas'},
        {text: 'Chihuahua'},
        {text: 'Durango'},
        {text: 'Guanajuato'},
        {text: 'Guerrero'},
        {text: 'Hidalgo'},
        {text: 'Jalisco'},
        {text: 'México'},
        {text: 'Michoacán de Ocampo '},
        {text: 'Morelos'},
        {text: 'Nayarit'},
        {text: 'Nuevo León'},
        {text: 'Oaxaca'},
        {text: 'Puebla'},
        {text: 'Querétaro'},
        {text: 'Quintana Roo'},
        {text: 'San Luis Potosí'},
        {text: 'Sinaloa'},
        {text: 'Sonora'},
        {text: 'Tabasco'},
        {text: 'Tamaulipas'},
        {text: 'Tlaxcala'},
        {text: 'Veracruz'},
        {text: 'Yucatán'},
        {text: 'Zacatecas'}

      ]
    }
  }
}
</script>

<style scoped>

</style>
