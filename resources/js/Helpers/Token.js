class Token {

    isValid(token) {
        const payload = this.payload(token)
        if(payload) {
            // Return true or false
            return payload.iss == "http://forum-app.test/api/auth/login"
        }

        return false
    }

    payload(token) {
        const payload = token.split('.')[1]
        return this.decode(payload)
    }

    decode(payload) {
        return JSON.parse(atob(payload))
    }
}

export default Token = new Token()