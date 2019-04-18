<template>
    <v-container>
        <v-form @submit.prevent="login">
            <v-text-field
                    v-model="form.email"
                    label="E-mail"
                    type="email"
                    required
            ></v-text-field>


            <v-text-field
                    v-model="form.password"
                    label="Password"
                    type="password"
                    required
            ></v-text-field>

            <v-btn
                    color="success"
                    type="submit"
            >
                Login
            </v-btn>

            <v-btn color="orange">
                <router-link to="/signup">Sign Up</router-link>
            </v-btn>

        </v-form>
    </v-container>
</template>

<script>
    export default {
        name: "Login",
        data() {
            return {
                form: {
                    email: null,
                    password: null
                }
            }
        },
        created() {
            if(User.loggedIn()) {
                this.$router.push({name: 'forum'})
            }
        },
        methods: {
            login() {
                User.login(this.form)
            }
        }
    }
</script>

<style scoped>

</style>