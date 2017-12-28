<template>
  <v-container>
    <v-card>
      <v-container grid-list-md>
        <v-layout row wrap>

          <!--PERSONAL INFORMATION-->
          <v-container xs12 sm6>
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
                  label = "Dirección (Calle y número)"
                ></v-text-field>
              </v-flex>

              <v-flex xs12 sm3>
                <v-text-field 
                  box 
                  label = "Colonia"
                ></v-text-field>
              </v-flex>

            </v-layout>
          </v-container>
          <!--PERSONAL INFORMATION-->

          <!--BECAS-->
          <v-container xs12 sm6>
            <v-layout row wrap>
              <v-flex xs6 md3>
                <v-subheader>Beca</v-subheader>
                <v-radio-group row>
                  <v-radio label = "Si" value = "radio-1"></v-radio>
                  <v-radio label = "No" value = "radio-2"></v-radio>
                </v-radio-group>
              </v-flex>

              <v-flex xs6 md3>
                <v-select
                  v-bind:items = "percentage"
                  label = "Porcentaje"
                  single-line
                  bottom
                ></v-select>
              </v-flex>
            </v-layout>
          </v-container>
          <!--BECAS-->


        </v-layout>
      </v-container>
    </v-card>
  </v-container>
</template>

<script>
export default {
  data(){
    return{
      percentage: [
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
    }
  }
}
</script>

<style scoped>

</style>
