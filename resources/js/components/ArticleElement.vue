<script setup>

    const props = defineProps(['id','ab_name', 'ab_price', 'ab_description', 'imgSrc'])


</script>

<template>
    <div>{{props.id}}</div>
    <div>{{props.ab_name}}</div>
    <div>{{props.ab_price}}</div>
    <div>{{props.ab_description}}</div>
    <img :src="props.imgSrc" alt="placeholder" :key="props.imgSrc"/>
</template>

<style scoped>
div{
    text-align: center;
    margin: 4px auto;
    height: 4rem;
}
img {
    width: 12rem;
    height: 6rem;
}
</style>
