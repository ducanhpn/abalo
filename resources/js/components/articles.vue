<script setup>
import { nextTick, ref, watch} from 'vue'

const searchTerm = ref('')
let articles = ref([])
let renderKey = ref(0)

async function getArticles(searchTerm){
    articles = await fetch("http://localhost:8000/api/articles/" + searchTerm).then(r => r.json())
    console.log(articles);
}

watch(searchTerm, (newSearchTerm) => {

    if(searchTerm.value.length >= 3){
        getArticles(newSearchTerm).then(()=>{nextTick(()=>renderKey.value++); })
    }

},
    {flush:'sync'})
</script>

<template>
    <h1> {{ searchTerm }} </h1>
    <label for="search-bar">Search articles</label>
    <input type="text" id="search-bar" v-model="searchTerm"/>
    <div :key="renderKey" v-if="searchTerm.length >=3" >
        <table>
            <tr>
                <th>id</th><th>name</th><th>price</th><th>description</th>
            </tr>
            <tr v-for="article in articles" :key="article.id">
                <td>{{article.id}}</td>
                <td>{{article["ab_name"]}}</td>
                <td>{{article["ab_price"]}}</td>
                <td>{{article["ab_description"]}}</td>
            </tr>
        </table>
    </div>
</template>


