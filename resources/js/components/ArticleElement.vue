<script setup>

    const props = defineProps(['ab_name', 'ab_price', 'ab_description', 'imgSrc'])


</script>

<template>

    <div>{{props.ab_name}}</div>
    <div>{{props.ab_price}}</div>
    <div>{{props.ab_description}}</div>
    <img :src="props.imgSrc" alt="placeholder" :key="props.imgSrc"/>
</template>

<style scoped>
div{
    padding: 2px;
    text-align: center;
    margin: 4px auto;
}
img {
    width: 200px;
    height: 130px;
}
</style>
