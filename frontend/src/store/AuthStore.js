import { defineStore } from "pinia"
import { ref } from 'vue';
import { useRouter } from "vue-router";
import axios from 'axios';

export const useAuthStore = defineStore('auth', () => {
  const username = ref(null);
  const password = ref(null);
  const phone_number = ref(null);
  const email = ref(null);
  const password_confirmation = ref(null);
  const errors = ref([]);
  const isSuccess = ref(null);
  const router = useRouter();

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
        localStorage.setItem('user', res.data.user.id)
        localStorage.setItem('token', res.data.token)
        router.push('/')
      })
      .catch((err) => {
        errors.value = err.response.data.errors
        isSuccess.value = err.response.data.success
      })
  };

  let login = () => {
    const user = {
      email: email.value,
      password: password.value
    }
    axios.post('/login', user)
      .then((res) => {
        localStorage.setItem('user', res.data.user.id)
        localStorage.setItem('token', res.data.token)
        router.push('/')
      })
      .catch((err) => {
        errors.value = err.response.data.errors
      })
  };

  return {
    username,
    password,
    phone_number,
    email,
    password_confirmation,
    errors,
    isSuccess,
    register,
    login
  };
});