<template>
    <div class="app">
        <nav-bar></nav-bar>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import Navbar from './components/Navbar.vue';
export default {
    components:{
        'nav-bar': Navbar
    }
}
</script>

<style>

</style>
