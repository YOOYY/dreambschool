import Vue from 'vue'
import Vuex from 'vuex'
import Axios from '../common/axios.js'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        website: '',
        title: '后台管理系统',
        admin: {
            'id': -1,
            'nickName': '管理员',
            'userimg': '/static/img/user.jpg'
        },
        sideMenu: [{
                title: '账户管理',
                url: 'admin',
                icon: 'el-icon-menu'
            },
            {
                title: 'banner图片',
                url: 'banner',
                icon: 'el-icon-menu'
            },
            {
                title: '教师学员信息',
                url: 'people',
                icon: 'el-icon-menu'
            },
            {
                title: '文章列表',
                url: 'article',
                icon: 'el-icon-location'
            },
            {
                title: '招聘信息',
                url: 'joinus',
                icon: 'el-icon-location'
            },
            {
                title: '业务信息',
                url: 'service',
                icon: 'el-icon-location'
            }
        ]
    },
    mutations: {
        updateState(state, payload) {
            if (payload.attr) {
                state[payload.name][payload.attr] = payload.data;
            } else {
                state[payload.name] = payload.data;
            }
        },
    },
    actions: {}
})