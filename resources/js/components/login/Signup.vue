<template>
    <v-container>
        <v-form @submit.prevent="signup">

            <v-text-field
                    v-model="form.name"
                    label="Name"
                    type="text"
                    required
            ></v-text-field>
            <span class="red--text" v-if="error.name">{{ error.name[0] }}</span>

            <v-text-field
                    v-model="form.email"
                    label="E-mail"
                    type="email"
                    required
            ></v-text-field>
            <span class="red--text" v-if="error.email">{{ error.email[0] }}</span>

            <v-text-field
                    v-model="form.password"
                    label="Password"
                    type="password"
                    required
            ></v-text-field>
            <span class="red--text" v-if="error.password">{{ error.password[0] }}</span>

            <v-text-field
                    v-model="form.password_confirmation"
                    label="Password"
                    type="password"
                    required
            ></v-text-field>

            <v-btn
                    color="success"
                    type="submit"
            >
                Sign Up
            </v-btn>

            <v-btn color="orange">
                <router-link to="/login">Login</router-link>
            </v-btn>

        </v-form>
    </v-container>
</template>

<script>
    import Token from "../../Helpers/Token";

    export default {
        name: "Signup",
        data() {
            return {
                form: {
                    name: null,
                    email: null,
                    password: null,
                    password_confirmation: null
                },
                error: {

                }
            }
        },
        created() {
            if(User.loggedIn()) {
                this.$router.push({name: 'forum'})
            }
        },
        methods: {
            signup() {
                axios.post('/api/auth/signup', this.form)
                    .then(res => {
                        User.responseAfterLogin(res.data)
                        this.$router.push({name: 'forum'})
                    })
                    .catch(err => this.error = err.response.data.errors)
            }
        }
    }
</script>

<style scoped>

</style>