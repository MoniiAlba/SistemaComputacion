import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/User/Home'
import Login from '@/components/Login/Login'
import Add from '@/components/User/Add'
import Delete from '@/components/User/Delete'
import Modify from '@/components/User/Modify'

Vue.use(Router)

let router = new Router({
  routes: [
    {
      path: '/home',
      name: 'home-user',
      component: Home,
      children: [
        {
          path: '/home/add',
          name: 'add',
          component: Add
        },
        {
          path: '/home/delete',
          name: 'delete',
          component: Delete
        },
        {
          path: '/home/modify',
          name: 'modify',
          component: Modify
        }
      ]},
    {
      path: '/',
      name: 'log-in',
      component: Login
    }
  ]
})


function checkLogin () {
  let http_request = null;

  if (window.XMLHttpRequest) { // Mozilla, Safari,...
    http_request = new XMLHttpRequest();
  } else if (window.ActiveXObject) { // IE
    try {
      http_request = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      try {
        http_request = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (e) {}
    }
  }

  if(http_request) {
    let data = {
     'func':'auth',
     'usuario':'usu',
     'password':'psw'};
    data = JSON.stringify(data);
    if (!http_request) {
     console.log('Falla :( No es posible crear una instancia XMLHTTP');
     return false;
    }
    http_request.onreadystatechange = function () {
      if (this.readyState == 4) {
        if (this.status == 200) {
          console.log(this);
        } else {
          console.log('Hubo problemas con la petición.');
          console.log(this);
        }
      }
    };
    http_request.open('POST', 'http://alumnoscomputacion.itam.mx/php/', true);
    http_request.send(data);
  }
}
/*
TODO CHECK FOR SESSION BEFORE ROUTING
router.beforeEach((to, from ,next) => {
  console.log('Routing');
  //Do route requires Authentcation?
  let requiresAuth = to.matched.some(record => record.meta.requiresAuth);

  if(requiresAuth && !currentUser) next('Login')
  else if (!requiresAuth && currentUser) next('Home')
  else next()
})
*/

export default router
