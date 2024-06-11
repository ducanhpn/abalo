<template>
    <h1>Hello App</h1>
    <nav>
        <RouterLink to="/home">Home</RouterLink>
        <RouterLink to="/articles-vue">Articles</RouterLink>
    </nav>
    <main>
        <RouterView />
    </main>

</template>
