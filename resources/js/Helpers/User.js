import Token from './Token'
import AppStorage from './AppStorage'

class User {
    login(data) {
        axios.post('/api/auth/login', data)
            .then(res => this.responseAfterLogin(res.data))
            .catch(err => console.log(err));
    }

    responseAfterLogin(data) {
        const access_token = data.access_token
        const user = data.user

        if(Token.isValid(access_token)) {
            AppStorage.store(user, access_token)
            window.location = '/forum'
        }
    }

    hasToken() {
        const storedToken = AppStorage.getToken()
        if(storedToken) {
            // Returns true of false
            return Token.isValid(storedToken)
        }
        return false
    }

    loggedIn() {
        return this.hasToken()
    }

    logout() {
        AppStorage.clear()
        window.location = '/forum'
    }

    name() {
        if(this.loggedIn()) {
            return AppStorage.getUser()
        }
    }

    id() {
        if(this.loggedIn()) {
            return Token.payload(AppStorage.getToken()).sub
        }
    }
}

export default User = new User()