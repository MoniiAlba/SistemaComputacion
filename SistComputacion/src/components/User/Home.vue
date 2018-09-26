<template>
    <div id="home">

      <!--SIDEBAR-->
      <v-navigation-drawer 
        dark
        fixed
        app
        v-model="sideNav"
        disable-resize-watcher
        disable-route-watcher
      >
        <v-list>
            <v-list-tile 
              v-for="item in menuItems" 
              :key="item.title"
              router
              :to="item.link"
              >
            <v-list-tile-action>
                <v-icon>{{ item.icon }}</v-icon>
            </v-list-tile-action>
            <v-list-tile-content
            @click="clickBoton(item.title)">
            {{ item.title }}
            </v-list-tile-content>
            </v-list-tile>
        </v-list>
      </v-navigation-drawer>
      <!--SIDEBAR-->

      <!--NAVBAR-->
      <v-toolbar dark app class="blue darken-3">
      <v-toolbar-side-icon
        class="hidden-md-and-up"
        @click.stop = "sideNav = !sideNav"
      >
      </v-toolbar-side-icon>
      <v-toolbar-title>Sistema Computación</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-toolbar-items>
          <v-btn flat 
            v-for="item in menuItems" 
            :key="item.title"
            class="hidden-sm-and-down"
            router
            :to="item.link"
            focus=menuItems[0]
            >
            <v-icon left> {{ item.icon }} </v-icon>
              {{ item.title }}
          </v-btn>
      </v-toolbar-items>
      </v-toolbar>
      <!--NAVBAR-->


      <!--ROUTER-->
      <router-view></router-view>
      <!--ROUTER-->

    </div>

</template>

<script>
  export default {
    data () {
      return {
        sideNav : false,
        menuItems: [
          { icon: 'add_circle', title: 'Agrega', link: '/home/add'},
          { icon: 'live_help', title: 'Consulta', link: '/home/modify'},
          { icon: 'delete', title: 'Elimina', link: '/home/delete'},          
          { icon: 'live_help', title: 'Encuestas', link: '/home/encuestas'},
          { icon: 'exit_to_app', title: 'Cerrar sesión', link: '/'}
          
        ]
      }
    },
    methods:{
      clickBoton(boton){
        //console.log(boton)
        if(boton === 'Cerrar sesión'){
          
          //this.$router.push('/')
          this.$store.dispatch('cerrarSesion')
        }
      }
    }
  }
</script>

<style scoped>
  #home{
    height: 100%;
  }
  
</style>

