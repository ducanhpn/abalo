<script setup>
    import {ref} from "vue"
    const formObj = ref({
        ab_name: '',
        ab_price: 0,
        ab_description: '',
    })

    function changeName(event) {
        formObj.ab_name = event.target.value
    }

    function handleClick(event) {
        if(formObj.ab_name.length > 0 && formObj.value.ab_price> 0 && formObj.ab_description.length > 0 ){
            console.log("hello world");
        }
    }
</script>

<template>
    <h1>Add new Article</h1>
    <div class="container">
        <div>
            <label for="name">Article's Name</label>
            <input type="text" id="name" :value="formObj.ab_name" @input="changeName">
        </div>
        <div>
            <label for="price">Article's Price</label>
            <input type="number" id="price" v-model="formObj.ab_price">
        </div>
        <div>
            <label for="description">Description for article</label>
            <textarea id="description" v-model="formObj.ab_description"></textarea>
        </div>
        <button v-on:click="handleClick">add new article</button>
    </div>



</template>

<style scoped>

</style>
