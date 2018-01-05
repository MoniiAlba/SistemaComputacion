import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/User/Home'
import Login from '@/components/Login/Login'
import Add from '@/components/User/Add'
import Delete from '@/components/User/Delete'
import Modify from '@/components/User/Modify'

Vue.use(Router)

export default new Router({
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
