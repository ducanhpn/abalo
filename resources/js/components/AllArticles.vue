<script setup>

import {onBeforeMount, onMounted, reactive, ref} from "vue";
    import ArticleElement from "./ArticleElement.vue";
    import {column} from "mathjs";

    let articles = ref([])

    let arr = window.srcArr;
    console.log(arr);

    onMounted(()=>{
        fetch("http://localhost:8000/api/articles").then(response => response.json()).then(result => {
            articles.value = result // need value to work
        })
    })


// "/storage/image" + article.id + imgExtension;
</script>

<template>

    <div class="container">

        <div class="header-element">Name</div>
        <div class="header-element">Price</div>
        <div class="header-element">Description</div>
        <div class="header-element">image</div>

        <ArticleElement v-for="article in articles"
                        :ab_name="article['ab_name']"
                        :ab_price="article.ab_price"
                        :ab_description="article.ab_description"
                        :imgSrc="arr[article.id - 1]"
                        :key="article.id" />
    </div>

</template>

<style scoped>

.container{
    display:grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    grid-template-rows: auto;
    justify-items: center;
    align-items: center;
    gap: 4px;
}

.header-element{
    margin-top: 24px;
    margin-bottom: 8px;
    font-size: 1.5em;
    font-weight:bold;
}
</style>
