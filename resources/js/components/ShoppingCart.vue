<script setup>
    import axios from 'axios';
    import {reactive, onMounted, nextTick, watch, ref } from 'vue'

    const props = defineProps(['isDisplayed'])

    let key = ref(0)

    let items = reactive({})

    onMounted(()=>{
        //when mounted, load list of items from api
        getArticles();
    })

    //watch display change to get Article
    watch(
        ()=>props.isDisplayed,
        (newValue, oldValue)=>{
            if(newValue === true){
                getArticles();
            }
        }
    )
    //below line doesn't work
   //if(props.isDisplayed) getArticles();

    function getArticles(){
        axios.get('/api/shoppingcart/')
        .then(response =>{
            //assign items with new data
            items = response.data;
            //change key to trigger rerender
            key.value>1000?key.value = 0: key.value++
        })
        .catch(err => console.log("error when get shopping cart list. err: " + err))
    }

    //TO-DOs: Delete button, Buy button
    async function handleDeleteItem(id){
        axios.delete('/api/shoppingcart/' + id)
            .then(() => {
                getArticles();
            })
            .catch(err => console.log('remove item failed' + err))
    }


</script>

<template>
    <div class="container" v-if="props.isDisplayed" :key="key.value">
        <h1>Shopping Cart</h1>
        <div v-for="item in items" class="container__item">
            <div>{{item.id}}</div>
            <div class="div--name">{{item.ab_name}}</div>
            <button @click="handleDeleteItem(item.id)">-</button>
        </div>
    </div>
</template>

<style lang="scss" scoped>
    .container{
        position: fixed;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: antiquewhite;
        z-index: 1;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        &__item{
            display: flex;
            width: 90%;
            margin: 4px 5%;
            justify-content: flex-start;
            .div--name{
                flex:1;
                text-align: center;
                font-weight: bold;
            }
        }
    }
</style>