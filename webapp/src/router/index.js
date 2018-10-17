import Vue from 'vue'
import Router from 'vue-router'
import Contents from '../components/Contents'
import Detail from '../components/UserInfo'
import Add from '../components/Add'
import Edit from '../components/Edit'
import About from '../components/about/About'

Vue.use(Router)

export default new Router({
    routes: [
        { path: '/', name: 'contents', component: Contents },
        { path: '/detail', name: 'detail', component: Detail },
        { path: '/add', name: "add", component: Add },
        { path: '/edit', name: "edit", component: Edit },
        { path: '/about', name: "about", component: About },
    ],
    mode:"history"
})