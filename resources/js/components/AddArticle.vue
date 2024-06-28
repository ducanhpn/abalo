<script setup>
import {reactive, ref, watch} from "vue"
    const formObj = reactive({
        ab_name: '',
        ab_price: 0,
        ab_description: '',
    })

let nameErr = ref(false)
let priceErr = ref(false)
let desErr = ref(false)

    function changeName(event) {
        formObj.ab_name = event.target.value
    }

    async function handleClick(event) {
        if(formObj.ab_name.length > 0 && formObj.ab_price> 0 && formObj.ab_description.length > 0 ){
            try{
                const response = await fetch("http://localhost:8000/api/articles", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(formObj)
                }).then(r => r.json()).catch(err => console.log(err))

                console.log(response)
            }
            catch(err){
                console.log(err)
            }
        }

    }

    watch(
        ()=>formObj.ab_name,
        (ab_name)=> {
            ab_name.length > 0? nameErr = false : nameErr = true;
        }
    )

watch(
    ()=>formObj.ab_description,
    (ab_description)=> {
        ab_description.length > 0? desErr = false : desErr = true;
    }
)

watch(
    ()=>formObj.ab_price,
    (ab_price)=> {
        ab_price > 0? priceErr = false : priceErr = true;
    }
)
</script>

<template>
    <h1>Add new Article</h1>

    <div class="container">
        <div class="element container__div">
            <label for="name" class="div__label">Article's Name</label>
            <input class="div__input" type="text" id="name" :value="formObj.ab_name" @input="changeName">
            <span v-if="nameErr" class="element__span--invalid">name can't be empty string</span>
        </div>
        <div class="element container__div ">
            <label for="price">Article's Price</label>
            <input class="div__input" type="number" id="price" v-model="formObj.ab_price">
            <span v-if="priceErr" class="element__span--invalid">price must be > 0</span>
        </div>
        <div class="element container__div">
            <label for="description">Description for article</label>
            <textarea class="div__input--description" v-model="formObj.ab_description"></textarea>
            <span v-if="desErr" class="element__span--invalid">Description can't be empty</span>
        </div>
        <button v-on:click="handleClick" >add new article</button>
    </div>



</template>

<style lang="scss" scoped>
.container{
    width: 600px;
    height: 400px;
    margin: auto auto;
    border: 1px solid black;
    border-radius: 8px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-evenly;

    &__div{
        width: 500px;
        display:flex;
        justify-content: flex-start;
        align-items: center;
        position: relative;
        .div__input{
            width: 60%;
            height: 25px ;
            align-self: center;
            margin-left: auto;
            &--description{
                height: 45px;
                width: 60%;
                align-self: center;
                margin-left: auto;
            }
        }
    }
    
}

.element{
    &__span--invalid{

        color: red;
        position:absolute;
        top:2em;
    }
}

</style>
