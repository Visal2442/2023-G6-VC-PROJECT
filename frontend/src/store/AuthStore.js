import { defineStore } from "pinia";
import { ref } from 'vue';
import { useRouter } from "vue-router";
import Cookies from 'js-cookie';
import axios from 'axios';

<<<<<<< HEAD
export const useAuthStore = defineStore('auth',()=>{
    const username = ref(null);
    const password = ref(null);
    const phone_number = ref(null);
    const email = ref(null);
    const password_confirmation = ref(null);
    const errors = ref([]);
    const isSuccess = ref(null);
    const router = useRouter();
    let alert = ref({
        show:false,
        type:'',
        message:''
    })

    
    // // Register 
    let  register=()=>{
        const user = ref({
            username:username.value,
            password:password.value,
            password_confirmation:password_confirmation.value,
            phone_number:phone_number.value,
            email:email.value,
            
          })
        axios.post('register', user.value)
        .then((res)=>{
            alert = true
            localStorage.setItem('user', res.data.user.id)
            localStorage.setItem('token', res.data.token)
            router.push('/')
        }).catch((err)=> {
            errors.value = err.response.data.errors
            isSuccess.value = err.response.data.success
        })
    }
    

    return {
        username,
        password,
        phone_number,
        email,
        password_confirmation,
        errors,
        isSuccess,
        alert,
        // token,
        register
=======
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
>>>>>>> 53741446336a8a09eb956dd2a2883557dd6139a7
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