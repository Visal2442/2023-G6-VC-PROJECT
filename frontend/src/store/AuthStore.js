import { defineStore } from "pinia";
import { ref } from 'vue';
import { useRouter } from "vue-router";
import Cookies from 'js-cookie';
import axios from 'axios';

export const useAuthStore = defineStore('auth', () => {
  const errors = ref('');
  const router = useRouter();
  let isValide= ref(false);
  let token = ref(localStorage.getItem('token'));

  // Register 
  let register = (user) => {
    axios.post('/register', user)
    .then((res) => {
        Cookies.set('email', user.email, { expires: 30 });
        localStorage.setItem('user', res.data.user.id);
        localStorage.setItem('token', res.data.token);
        token.value = localStorage.getItem('token');
        router.push('/')
      })
      .catch((err) => {
        errors.value = err.response.data
      })
  };

  // Login 
  let login = (user) => {
    axios.post('/login', user)
      .then((res) => {
        Cookies.set('email', user.email, { expires: 30 });
        localStorage.setItem('user', res.data.user.id);
        localStorage.setItem('token', res.data.token);
        token.value = localStorage.getItem('token');
        router.push('/');
      })
      .catch((err) => {
        errors.value = err.response.data;
      })
    };

    // Log out 
    const logout = () => {
      axios.post('/logout', null, {
        headers: {
          Authorization: `Bearer ${localStorage.getItem('token')}`
        }
      })
      .then(() => {
        Cookies.remove('email');
        localStorage.removeItem('user');
        localStorage.removeItem('token');
        token.value = localStorage.getItem('token');
        router.push('/');
      })
      .catch((err) => {
        errors.value = err.response.data.errors;
      });
    };
  return {
    errors,
    isValide,
    register,
    login,
    logout,
    token
  };
});