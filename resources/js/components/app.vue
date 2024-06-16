<template>
    <nav>
        <RouterLink class="nav-btn" to="/home">Home</RouterLink>
        <RouterLink class="nav-btn" to="/articles-vue">Articles</RouterLink>
        <RouterLink class="nav-btn" to="/new-article-vue">Add new article</RouterLink>
        <RouterLink class="nav-btn" to="/all-articles-vue">List all articles</RouterLink>
    </nav>
    <main>
        <RouterView />
    </main>

</template>

<style scoped>
nav{
    display: flex;
    justify-content: center;
}

.nav-btn{
    margin: 0 8px;
    font-size: 1.5em;
}
.nav-btn:link, .nav-btn:visited{
    text-decoration: none;
    color: black;
}

.nav-btn:hover{
    font-weight: bold;
    color: red;
}
</style>
