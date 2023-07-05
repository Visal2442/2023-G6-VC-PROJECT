import { defineStore } from "pinia"
import { ref } from 'vue';
import axios from 'axios';

export const useAuthStore = defineStore('auth',()=>{
    const username = ref(null);
    const password = ref(null);
    const phone_number = ref(null);
    const email = ref(null);
    const confirm_password = ref(null);
    const errors = ref([]);
    const isSuccess = ref(true);
    
    // // Register 
    let  register=()=>{
        const user = ref({
            username:username.value,
            password:password.value,
            confirm_password:confirm_password.value,
            phone_number:phone_number.value,
            email:email.value,
          })
        axios.post('http://127.0.0.1:8000/api/register', user.value)
        .then((res)=>{
            // JSON.parse('user', )
            console.log(res);
        }).catch((err)=> {
            errors.value = err.response.data.errors
            isSuccess.value = err.response.data.success
            // console.log(err.response.data.errors);
        })
    }

    return {
        username,
        password,
        phone_number,
        email,
        confirm_password,
        errors,
        isSuccess,
        register
    };
})