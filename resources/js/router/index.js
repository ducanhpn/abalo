import home from "../components/home.vue";
import articles from "../components/articles.vue";
import { createRouter, createWebHistory} from "vue-router";


const routes = [
    { path: '/home', component: home},
    { path:'/articles-vue', component: articles},
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;
