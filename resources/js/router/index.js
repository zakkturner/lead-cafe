import {  createRouter, createWebHistory  } from 'vue-router';

const routes = [
    {
        path: '/',
        redirect: '/prospects'
    },
    {
        path: '/prospects',
        name: 'ProspectsPage',
        component: () => import('../pages/ProspectsPage.vue'),
    },

            // {
            //     path: '/prospects/:id',
            //     component: () => import('../pages/ProspectDetails.vue')
            // },
    {
        path: '/prospects/search',
        component: () => import('../pages/ProspectSearch.vue')
    }




]
const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;
