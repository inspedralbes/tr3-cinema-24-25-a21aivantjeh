import { defineStore } from "pinia";

export const useAuthStore = defineStore('auth', {
    state: () => ({
        user: null,
        token: null,
        isAuthenticated: false
    }),
    actions: {
        login(userData, userToken) {
            console.log('User logged in:', userData);
            console.log('User token:', userToken);

            this.isAuthenticated = true;
            this.user = userData;
            this.token = userToken;

            localStorage.setItem('token', userToken);
            localStorage.setItem('user', JSON.stringify(userData));
            localStorage.setItem('isAuthenticated', true);
        },
        logout() {
            this.token = null;
            this.user = null;
            this.isAuthenticated = false;
            localStorage.clear();
        },
    },
})