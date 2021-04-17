<template>
    <div>
       <HeaderComponent></HeaderComponent>
         <div class="content">
             <router-view></router-view>
         </div>
       <FooterComponent></FooterComponent>

    </div>
</template>

<script>

import HeaderComponent from './components/header/HeaderComponent.vue';
import FooterComponent from './components/footer/FooterComponent.vue';

export default {
    name: "Main",
    components:{
        HeaderComponent,
        FooterComponent
    }

}
</script>

<style scoped>

.content {
    margin-top: 50px;
}

</style>
