<script setup>
    defineProps(['count'])
</script>
<template class="template--style">
    <nav>
        <RouterLink class="nav-btn" to="/home">Home</RouterLink>
        <RouterLink class="nav-btn" to="/articles-vue">Search articles</RouterLink>
        <RouterLink class="nav-btn" to="/new-article-vue">Add new article</RouterLink>
        <RouterLink class="nav-btn" to="/all-articles-vue">List all articles</RouterLink>
    </nav>
    <main class="main--style">
        <RouterView />
    </main>
    <footer>
        <RouterLink class="nav-btn" to="/impressum">impressum</RouterLink>
    </footer>

</template>

<style lang="scss" scoped>
@import "../css/app.scss";
nav{
    display: flex;
    justify-content: center;
    padding-top: 8px;
    padding-bottom: 6px;
    border-bottom: 1px solid rgba(7, 25, 82, 0.6) ;

}

.nav-btn{
    margin: 0 8px;
    font-size: 1.5em;
}

.nav-btn:link, .nav-btn:visited{
    @include btn-link();
}

.nav-btn:hover{
    @include btn-hover();
}

.main--style{
    height: auto;
    min-height: 100vh;
}
footer  {
    width: 80vw;
    margin: 2rem auto 0 auto;
    display: flex;
    justify-content: center;
}
</style>
