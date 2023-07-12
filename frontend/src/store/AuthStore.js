import { defineStore } from "pinia";
import { ref } from 'vue';
import { useRouter } from "vue-router";
import Cookies from 'js-cookie';
import axios from 'axios';

export const useAuthStore = defineStore('auth', () => {
  const errors = ref('');
  const isSuccess = ref(true);
  const router = useRouter();
  let isValide= ref(false);


  // Register 
  let register = (user) => {
    console.log(user);
    axios.post('/register', user)
    .then((res) => {
        Cookies.set('email', user.email, { expires: 30 });
        localStorage.setItem('user', res.data.user.id)
        localStorage.setItem('token', res.data.token)
        // resetForm();
        router.push('/')
        console.log(Cookies.get('email'));
      })
      .catch((err) => {
        errors.value = err.response.data.errors
        isSuccess.value = err.response.data.success
      })
  };

  let login = (user) => {
    // const user = {
    //   email: email.value,
    //   password: password.value
    // }
    axios.post('/login', user)
      .then((res) => {
        Cookies.set('email', user.email, { expires: 30 });
        localStorage.setItem('user', res.data.user.id)
        localStorage.setItem('token', res.data.token)
        // resetForm();
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

  // const resetForm= ()=>{
  //   username.value=''
  //   password.value=''
  //   password_confirmation.value=''
  //   phone_number.value=''
  //   email.value=''
  // };
  return {
    // username,
    // password,
    // phone_number,
    // email,
    // password_confirmation,
    errors,
    isSuccess,
    isValide,
    register,
    login,
    logout
  };
});