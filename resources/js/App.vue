<script setup>
import { onMounted, ref } from 'vue';

    defineProps(['count'])

    let state = ref("production");

    onMounted(()=>{

        //listen to event
        window.Echo
        .channel('maintaince_channel')
        .listen('ServerStatusChanged', (e) => {

            state.value = e.status;
            console.log(state.value);
        })

        
    })


</script>
<template class="template--style">
    <div v-if="state === 'maintance'" id="maintance">
        <p>We will soon be improving Abalo for you! <br>
            After a short break we are back <br>
            for you again! We promise. <br>
        </p>
    </div>
    <div v-else>
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
    </div>


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

#maintance {
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}

#maintance > p {
    font-size: 4em;
    text-align: center;
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
