<script setup>
import { onMounted, ref } from 'vue';
import SiteFooter from './components/SiteFooter.vue'
import SiteMain from './components/SiteMain.vue';
import SiteHeader from './components/SiteHeader.vue';


    defineProps(['count'])

    let state = ref("production");

    onMounted(()=>{

        //listen to event
        window.Echo
        .channel('maintaince_channel')
        .listen('ServerStatusChanged', (e) => {

            state.value = e.status;
            console.log(state.value);
        })

        
    })


</script>
<template class="template--style template">
    <div v-if="state === 'maintance'" class="template__div--maintance">
        <p>We will soon be improving Abalo for you! <br>
            After a short break we are back <br>
            for you again! We promise. <br>
        </p>
    </div>

    
    <div v-else class="template__div--serveron div">
        <SiteHeader />
        <SiteMain />
        <SiteFooter />
        
    </div>

</template>

<style lang="scss" scoped>
@import "../css/app.scss";


.template__div--maintance {
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    p {
        font-size: 4em;
        text-align: center;
    }
}

</style>
