import axios from "axios";

const user = JSON.parse(localStorage.getItem('user'));

export default axios.defaults.baseURL = process.env.VUE_APP_API_URL;

if(user){
    axios.defaults.headers.common['Authorization'] = `Bearer ${user.token}`
}

