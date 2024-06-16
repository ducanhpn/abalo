import home from "../components/home.vue";
import articles from "../components/articles.vue";
import addArticle from "../components/addArticle.vue";
import { createRouter, createWebHistory} from "vue-router";
import AllArticles from "../components/AllArticles.vue";


const routes = [
    { path: '/home', component: home},
    { path:'/articles-vue', component: articles},
    { path:'/new-article-vue', component: addArticle},
    { path: '/all-articles-vue', component: AllArticles}
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;
