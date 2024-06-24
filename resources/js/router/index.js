import home from "../components/home.vue";
import articles from "../components/articles.vue";
import addArticle from "../components/addArticle.vue";
import AllArticles from "../components/AllArticles.vue";
import Impressum from "../components/Impressum.vue";

import { createRouter, createWebHistory} from "vue-router";


const routes = [
    { path: '/home', component: home},
    { path:'/articles-vue', component: articles},
    { path:'/new-article-vue', component: addArticle},
    { path: '/all-articles-vue', component: AllArticles},
    { path: "/impressum", component: Impressum },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;
