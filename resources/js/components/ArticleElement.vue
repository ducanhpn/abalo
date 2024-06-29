<script setup>

    const props = defineProps(['id','ab_name', 'ab_price', 'ab_description', 'imgSrc'])

    function addToShoppingCart(){
        console.log("button click")
        //post item to shopping cart
        axios.post('/api/shoppingcart/',{
            article_id : props.id
        })
        .then(res => console.log("add to shoppingcart"))
        .catch(eer => console.log('error when adding'))
    }
</script>

<template >
    <div @click="addToShoppingCart">{{props.id}}</div>
    <div @click="addToShoppingCart">{{props.ab_name}}</div>
    <div @click="addToShoppingCart">{{props.ab_price}}</div>
    <div @click="addToShoppingCart">{{props.ab_description}}</div>
    <img @click="addToShoppingCart" :src="props.imgSrc" alt="placeholder" :key="props.imgSrc"/>
</template>

<style scoped>
div{
    text-align: center;
    margin: 4px auto;
    height: 4rem;
}
div:hover {
    font-weight: bold;
    font-size: bold;
    cursor : grab;
}
img {
    width: 12rem;
    height: 6rem;
}
</style>
