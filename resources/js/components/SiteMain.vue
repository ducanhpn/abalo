<script setup>
    import ShoppingCart from './ShoppingCart.vue';

    defineProps({'isDisplayed':Boolean})

</script>

<template>
    
    <main class="div__main">
        <ShoppingCart :isDisplayed="isDisplayed"/>
        <RouterView />
    </main>

</template>

<style lang="scss" scope>
    @import "../../css/app.scss";

    .div__main{
        
        height: auto;
        min-height: 100vh;
    }

</style>