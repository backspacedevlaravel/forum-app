<template>
    <v-toolbar>
        <v-toolbar-side-icon></v-toolbar-side-icon>
        <v-toolbar-title>BSD Forum</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items class="hidden-sm-and-down">
            <v-btn flat>
                <router-link to="/forum">Forum</router-link>
            </v-btn>
            <v-btn flat>
                <router-link to="/ask">Ask Question</router-link>
            </v-btn>
            <v-btn flat>
                <router-link to="/category">Category</router-link>
            </v-btn>
            <v-btn flat>
                <router-link to="/login">Login</router-link>
            </v-btn>
        </v-toolbar-items>
    </v-toolbar>
</template>

<script>
    export default {
        name: "Toolbar"
    }
</script>

<style scoped>

</style>