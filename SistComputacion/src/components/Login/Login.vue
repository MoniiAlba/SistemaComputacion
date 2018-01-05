<template>
  <div>
      <v-container class="center-xs">
        <v-layout>
          <v-flex xs4>
            <v-text-field
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
  }
}

</script>

<style scoped>

</style>


