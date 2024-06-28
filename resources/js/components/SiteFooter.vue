<script setup>

</script>
<template>
    <footer class="footer">
        <RouterLink class="footer__routerlink" to="/impressum">impressum</RouterLink>
    </footer>
</template>

<style lang="scss" scoped >
    @import "../../css/app.scss";
    .footer{
        width: 80vw;
        margin: 2rem auto 0 auto;
        display: flex;
        justify-content: center;
        @include style-link-interactive('&__routerlink')
    }
    
</style>