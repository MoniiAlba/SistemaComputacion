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
      http_request: null,
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
    checkLogin () {
      if (this.http_request.readyState == 4) {
            if (this.http_request.status == 200) {
                console.log(this.http_request);
            } else {
                console.log('Hubo problemas con la petición.');
                console.log(this.http_request);
            }
        }
    },
    login () {
      this.request();
      if(this.http_request) {
        let data = {
         'func':'auth',
         'usuario':'usu',
         'password':'psw'};
         data = JSON.stringify(data);
        if (!this.http_request) {
         console.log('Falla :( No es posible crear una instancia XMLHTTP');
         return false;
        }
        this.http_request.onreadystatechange = this.checkLogin;
        this.http_request.open('POST', 'http://alumnoscomputacion.itam.mx/php/', true);
        this.http_request.send(data);
      }
    },
    request () {
      if (window.XMLHttpRequest) { // Mozilla, Safari,...
        this.http_request = new XMLHttpRequest();
      } else if (window.ActiveXObject) { // IE
        try {
          this.http_request = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
          try {
            this.http_request = new ActiveXObject("Microsoft.XMLHTTP");
          } catch (e) {}
        }
      }
    }
  },
  mounted () {
    this.$el.querySelector('#login').focus();
  }
}

</script>

<style scoped>

</style>


