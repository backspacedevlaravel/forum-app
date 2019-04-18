<template>
    <div>
        <toolbar></toolbar>
        <router-view></router-view>
        <app-footer></app-footer>
    </div>
</template>

<script>
    import toolbar from './Toolbar';
    import AppFooter from './AppFooter';
    import Login from './login/Login'
    import Signup from './login/Signup'
    export default {
        name: "AppHome",
        components: {toolbar, AppFooter, Login, Signup}
    }
</script>

<style scoped>

</style>