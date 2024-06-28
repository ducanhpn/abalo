<script setup>
import { onMounted, ref} from "vue";
import ArticleElement from "./ArticleElement.vue";

    let amount = document.getElementById('app').dataset.count;
    let offset = parseInt(parseInt(amount) / 5);
    let articles = ref([])
    let arr = window.srcArr;

    onMounted(()=>{
        fetch("http://localhost:8000/api/limit-articles/" + 0).then(response => response.json()).then(result => { // load first site when mounted
            articles.value = result // need value to work
        })

    })

    //Wenn der Benutzer andere Seite auswählen, muss die entsprechenden Artikeln darstellen.
    function onPageChanged(event, i){
        event.preventDefault();
        fetch("http://localhost:8000/api/limit-articles/" + (i - 1)).then(response => response.json()).then(result => {
            articles.value = result // need value to work
        })
    }

// "/storage/image" + article.id + imgExtension;
</script>

<template>

    <div class="container">
        <div class="header-element first-header--style">ID</div>
        <div class="header-element">Name</div>
        <div class="header-element">Price</div>
        <div class="header-element">Description</div>
        <div class="header-element">image</div>

        <ArticleElement v-for="article in articles"
                        :id="article.id"
                        :ab_name="article['ab_name']"
                        :ab_price="article.ab_price"
                        :ab_description="article.ab_description"
                        :imgSrc="arr[article.id - 1]"
                        :key="article.id" />
    </div>

    <div class="pages--style">
        <button class="btn--style" v-for="i in offset + 1" v-on:click="onPageChanged($event, i)">{{i}}</button>
    </div>

</template>

<style lang="scss" scoped>

.container{
    display:grid;
    grid-template-columns: 0.2fr 1fr 0.8fr 2fr 1fr;
    grid-template-rows: 4rem;
    justify-items: center;
    align-items: center;
    gap: 4px;
    width: 80vw;
    margin: 1rem auto;
    background: rgba(8, 131, 149, 0.2);
    opacity: 0.8;
    box-shadow: 10px 5px 5px rgb(7, 25, 82);
}

.header-element{
    margin-top: 24px;
    margin-bottom: 10px;
    font-size: 1.5em;
    font-weight:bold;
    justify-self: center;
    text-align: center;
}


.pages--style{
    display: flex;
    justify-content: flex-end;
    margin: 12px auto;
    width: 80vw;
    height: 20px;

}
.btn--style {
    background: none;
    border: none;
    width: 20px;
    font-size: 1.5em;
    margin-left: 2px;
}
.btn--style:hover{
    font-weight: bold;
    color: rgb(7, 25, 82);
}
</style>
