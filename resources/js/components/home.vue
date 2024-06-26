<script setup>
    import { ref } from 'vue';
    import axios from 'axios';
    let userId = ref(0)

    function handleClick(id, e){
        e.preventDefault();
        axios.get("/api/buy/" + id).then(r=>{
            console.log("Buy sucessfully!");
        })
        .catch(e=>{
            console.log(e);
        })
    }

    function logIn(e){
        e.preventDefault();
        Echo.channel('user' + userId.value)
            .listen('ArticleIsSelled', function(){
                alert('Your article is selled!!!');
            })
            console.log("log in sucess with user id: " + userId.value);

        //listen to discount channel
        for(let i = 1; i<=2; i++){
            if(i !== userId.value){
                Echo.channel('discount-channel.' + i)
                .listen('Discount', (e) =>{
                    alert('Article number ' + e.articleId + ' discounted!!!');
                })
                console.log(i + "vs " + userId.value);
            }
                
        }
        
    }

    function handleDiscount(articleId, e){
        e.preventDefault();
        if(userId.value !== articleId){
            alert("Not your article");
        }
        else{
            axios.get("/api/discount/" + articleId).then(r => {
                console.log("discounted");
            })
            .catch(e =>{
                console.log("Error when discounted!");
            })
        }
    }
</script>

<template>
    <h1>Welcome to Abalo</h1>
    <h3>Please Log In</h3>
    <input type="number" v-model="userId"/>
    <button @click="logIn">Log in</button>
    <button @click="handleClick(1, $event)">Buy 1</button>
    <button @click="handleClick(2, $event)">Buy 2</button>
    <button @click="handleClick(3, $event)">Buy 3</button>
    <button @click="handleDiscount(1, $event)">Discount 1</button>
    <button @click="handleDiscount(2, $event)">Discount 2</button>
    <button @click="handleDiscount(3, $event)">Discount 3</button>
</template>
