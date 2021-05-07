import Vue from 'vue'
import Vuex from '../store/'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [{
        path: '/login',
        name: 'login',
        component: () => import( /* webpackChunkName: "login" */ '../views/Login.vue')
    },
    {
        path: '/',
        name: 'index',
        component: () => import( /* webpackChunkName: "index" */ '../views/Index.vue'),
        children: [{
                path: '/admin',
                name: 'admin',
                component: () => import( /* webpackChunkName: "admin" */ '../views/Admin.vue')
            },
            {
                path: '/banner',
                name: 'banner',
                component: () => import( /* webpackChunkName: "banner" */ '../views/Banner.vue')
            },
            {
                path: '/people',
                name: 'people',
                component: () => import( /* webpackChunkName: "people" */ '../views/People.vue')
            },
            {
                path: '/article',
                name: 'article',
                component: () => import( /* webpackChunkName: "article" */ '../views/Article.vue')
            },
            {
                path: '/joinus',
                name: 'joinus',
                component: () => import( /* webpackChunkName: "joinus" */ '../views/Joinus.vue')
            },
            {
                path: '/service',
                name: 'service',
                component: () => import( /* webpackChunkName: "service" */ '../views/Service.vue')
            }
        ]
    }
]

const router = new VueRouter({
    routes
})

router.beforeEach((to, from, next) => {
    if (to.name !== "login" && Vuex.state.admin.id === -1) {
        next({
            name: "login"
        })
    } else {
        next();
    }
})
export default router;