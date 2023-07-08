import { defineStore } from "pinia";
import { ref } from 'vue';
import { useRouter } from "vue-router";
import Cookies from 'js-cookie';
import axios from 'axios';

export const useAuthStore = defineStore('auth', () => {
  const username = ref(null);
  const password = ref(null);
  const phone_number = ref(null);
  const email = ref(null);
  const password_confirmation = ref(null);
  const errors = ref('');
  const isSuccess = ref(true);
  const router = useRouter();
  let isValide= ref(false);
  let isLoggedIn = ref('undefined')


  // Register 
  let register = () => {
    const user = {
      username: username.value,
      password: password.value,
      password_confirmation: password_confirmation.value,
      phone_number: phone_number.value,
      email: email.value,
    }
    axios.post('/register', user)
      .then((res) => {
        Cookies.set('email', email.value, { expires: 30 });
        localStorage.setItem('user', res.data.user.id)
        localStorage.setItem('token', res.data.token)
        resetForm();
        router.push('/')
      })
      .catch((err) => {
        errors.value = err.response.data.errors
        isSuccess.value = err.response.data.success
      })
      console.log(Cookies.get('email'));
  };

  let login = () => {
    const user = {
      email: email.value,
      password: password.value
    }
    axios.post('/login', user)
      .then((res) => {
        Cookies.set('email', email.value, { expires: 30 });
        localStorage.setItem('user', res.data.user.id)
        localStorage.setItem('token', res.data.token)
        resetForm();
        isLoggedIn.value = Cookies.get('email');
        console.log(Cookies.get('email'));
        router.push('/');
      })
      .catch((err) => {
        console.log(err.response.data);
        errors.value = err.response.data.errors;
        isSuccess.value = err.response.data.success
      })
    };
    const logout = () => {
      axios.post('/logout', null, {
        headers: {
          Authorization: `Bearer ${localStorage.getItem('token')}`
        }
      })
      .then((res) => {
        console.log(res);
        Cookies.remove('email');
        localStorage.removeItem('user');
        localStorage.removeItem('token');
        router.push('/login');
      })
      .catch((err) => {
        errors.value = err.response.data.errors;
        isSuccess.value = err.response.data.success;
      });
      console.log(Cookies.get('email'));
    };

  const resetForm= ()=>{
    username.value=''
    password.value=''
    password_confirmation.value=''
    phone_number.value=''
    email.value=''
  };
  return {
    username,
    password,
    phone_number,
    email,
    password_confirmation,
    errors,
    isSuccess,
    isValide,
    register,
    isLoggedIn,
    login,
    logout
  };
});