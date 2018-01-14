<template>
    <v-content>
      <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
              <v-toolbar dark color="primary">
                <v-toolbar-title>Login form</v-toolbar-title>
                <v-spacer></v-spacer>
              </v-toolbar>
              <v-card-text>
                <v-form>
                  <v-text-field 
                  prepend-icon="person" 
                  name="login" 
                  label="Login" 
                  type="text"
                  id="login" 
                  @keyup.enter.stop.prevent="changeFocus"
                  v-model="name"></v-text-field>
                  <v-text-field 
                  prepend-icon="lock" 
                  name="password" 
                  label="Password" 
                  id="password" 
                  type="password"
                  @keyup.enter.stop.prevent="login"
                  v-model="pass"></v-text-field>
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn 
                color="primary"
                @click.prevent.stop="login"
                @keyup.enter.stop.prevent="login">Login</v-btn>
              </v-card-actions>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
    </v-content>
</template>

<script>
import { required, minLength, between } from 'vuelidate/lib/validators'
import axios from 'axios'

export default {
  data () {
    return {
      name: '',
      pass: '',
    }
  },
  validations: {
    name: {
      required,
      minLength: minLength(4)
    },
    pass: {
      required,
      minLength: minLength(4)
    }
  },
  methods: {
    changeFocus () {
      this.$el.querySelector('#password').focus();
    },
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
  },
  mounted () {
    this.$el.querySelector('#login').focus();
  }
}

</script>

<style scoped>

</style>


