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
      meta: {
        requiresAuth: true,
        name: 'home'
      },
      children: [
        {
          path: '/home/add',
          name: 'add',
          component: Add,
          meta: {
            requiresAuth: true,
            name: 'add'
          }
        },
        {
          path: '/home/delete',
          name: 'delete',
          component: Delete,
          meta: {
            requiresAuth: true,
            name: 'del'
          }
        },
        {
          path: '/home/modify',
          name: 'modify',
          component: Modify,
          meta: {
            requiresAuth: true,
            name: 'mod'
          }
        }   
      ]
    },
    {
      path: '/',
      name: 'log-in',
      component: Login,
      meta: {
        requiresAuth: false,
        name: 'log'
      }
    }
  ]
})

function toBoolean(string) {
  var bool;
  bool = (function() {
    switch (false) {
      case string.toLowerCase() !== 'true':
        return true;
      case string.toLowerCase() !== 'false':
        return false;
    }
  })();
  if (typeof bool === "boolean") {
    return bool;
  }
  return void 0;
};

function checkLogin (requiresAuth, next) {
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
     'func':'tengoSesion'
    };
    data = JSON.stringify(data);
    if (!http_request) {
     console.log('Falla :( No es posible crear una instancia XMLHTTP');
     return false;
    }
    http_request.onreadystatechange = function () {
      if (this.readyState == 4) {
        if (this.status == 200) {
          let currentUser = toBoolean(JSON.parse(this.response).sesion);
          if(currentUser)
            next();
          else
            next('/');
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

router.beforeEach((to, from ,next) => {
  //Do route requires Authentcation?
  let requiresAuth = to.matched.some(record => record.meta.requiresAuth);
  let toName = to.meta.name;
  let fromName = from.meta.name;
  if(!fromName)
    next();
  else if(requiresAuth)
    checkLogin(requiresAuth, next);
  else if (fromName !== 'log' && fromName)
    next('/');
  //else
    //next(false);
  //if(requiresAuth && !currentUser) next('Login')
  //else if (!requiresAuth && currentUser) next('Home')
  //else next()
})

export default router
