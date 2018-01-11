<template>
  <div>
      <v-container class="center-xs">
        <v-layout>
          <v-flex xs4>
            <v-text-field
            @keyup.enter="login"
            box
            label = "Usuario"
            ></v-text-field>
          </v-flex>
        </v-layout>
      </v-container>
  </div>
</template>

<script>
import { required, minLength, between } from 'vuelidate/lib/validators'
import axios from 'axios'

export default {
  data () {
    return {
      name: '',
    }
  },
  validations: {
    name: {
      required,
      minLength: minLength(4)
    }
  },
  methods: {
    login () {
      axios.post('http://alumnoscomputacion.itam.mx/php/', {
        func: 'auth',
        usuario: 'usu',
        password: 'psw'
      })
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      });
    }
  }
}

</script>

<style scoped>

</style>


