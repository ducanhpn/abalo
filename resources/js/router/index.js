import home from "../components/home.vue";
import ArticleSearch from "../components/ArticleSearch.vue";
import ArticleAdd from "../components/AddArticle.vue";
import AllArticles from "../components/AllArticles.vue";
import Impressum from "../components/Impressum.vue";

import { createRouter, createWebHistory} from "vue-router";


const routes = [
    { path: '/home', component: home},
    { path:'/articles-vue', component: ArticleSearch},
    { path:'/new-article-vue', component: ArticleAdd},
    { path: '/all-articles-vue', component: AllArticles},
    { path: "/impressum", component: Impressum },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;
