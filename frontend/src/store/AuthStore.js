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
  const emailSend = ref('');
  const message = ref('');
  const user = ref(localStorage.getItem('user_id'));

  const verificationCode = ref('');
  const password = ref('');
  const passwordConfirmation = ref('');
  const emailLocalStorage = ref('');


  // Register 
  let register = (user) => {
    axios.post('/register', user)
    .then((res) => {
        Cookies.set('email', user.email, { expires: 30 });
        user.value=localStorage.setItem('user_id', res.data.user.id);
        localStorage.setItem('token', res.data.token);
        token.value = localStorage.getItem('token');
        window.location.href ='/';
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
        user.value=localStorage.setItem('user_id', res.data.user.id);
        localStorage.setItem('token', res.data.token);
        token.value = localStorage.getItem('token');
        window.location.href ='/';
      })
      .catch((err) => {
        errors.value = err.response.data.message;
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
        user.value=null;
        Cookies.remove('email');
        localStorage.removeItem('user_id');
        localStorage.removeItem('token');
        localStorage.removeItem('email');
        token.value = localStorage.getItem('token');
        window.location.href ='/';
      })
      .catch((err) => {
        errors.value = err.response.data.errors;
      });
    };

    const sendEmail = () => {
      axios.post("/reset_password_request",{ email: emailSend.value })
          .then(()=>{
            localStorage.setItem('email', emailSend.value);
            router.push('/code');
          }).catch(error=>{
            message.value = error.response.data.message;
          })
    } 

    const resetPassword = () => {
      const data = {
        verification_code: verificationCode.value,
        password: password.value,
        password_confirmation:passwordConfirmation.value,
      };
      emailLocalStorage.value = localStorage.getItem('email');
      axios.post("/reset_password", data)
        .then((response) => {
          console.log(response.data);
          let user ={
            email : emailLocalStorage.value,
            password: password.value
          }
          login(user);
        })
        .catch((error) => {
          console.error(error.response.data);
        });
     }
    return {
      user,
      errors,
      isValide,
      register,
      login,
      logout,
      token,
      sendEmail,
      message,
      emailSend,
      resetPassword,
      verificationCode,
      password,
      passwordConfirmation,
    };
});