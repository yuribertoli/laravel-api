import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home';
import About from './pages/About';
import Contacts from './pages/Contacts';
import Posts from './pages/Posts';
import SinglePost from './pages/SinglePost';
import NotFound from './pages/NotFound';

const router = new VueRouter({

    mode: "history",

    routes :[
        {
            path: '/', 
            name: 'home',
            component: Home
        },
        {
            path: '/chi-siamo', 
            name: 'about',
            component: About
        },
        {
            path: '/contatti', 
            name: 'contacts',
            component: Contacts
        },
        {
            path: '/blog', 
            name: 'blog',
            component: Posts
        },
        {
            //path parametrica per prendere un URI variabile, dinamica. Equivale a Laravel: Route::get('/blog/{slug}', 'Api\PostController@show');
            path: '/blog/:slug', 
            name: 'single-post',
            component: SinglePost
        },
        {
            //path per prendere tutti gli URI diversi, da mettere come ultima rotta
            path: '/:pathMatch(.*)*',
            name: 'not-found',
            component: NotFound
        }
    ]
})

export default router