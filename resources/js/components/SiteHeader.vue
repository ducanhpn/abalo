<script setup>

</script>

<template>
    
    <nav class="nav">
        <RouterLink class="nav__routerlink" to="/home">Home</RouterLink>
        <RouterLink class="nav__routerlink" to="/articles-vue">Search articles</RouterLink>
        <RouterLink class="nav__routerlink" to="/new-article-vue">Add new article</RouterLink>
        <RouterLink class="nav__routerlink" to="/all-articles-vue">List all articles</RouterLink>
    </nav>

</template>

<style lang="scss" scope>
    @import "../../css/app.scss";

    .nav{
        display: flex;
        justify-content: center;
        padding-top: 8px;
        padding-bottom: 6px;
        border-bottom: 1px solid $border-color ;
        @include style-link-interactive('&__routerlink');
    }

</style>