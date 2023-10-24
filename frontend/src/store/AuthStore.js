import { defineStore } from "pinia";
// import { ref } from 'vue';
// import { useRouter } from "vue-router";
import Cookies from "js-cookie";
import axios from "axios";

export const useAuthStore = defineStore("auth", {
  state: () => ({
    errors: "",
    // router : useRouter(),
    isValid: false,
    token: localStorage.getItem("token"),
    emailSend: "",
    message: "",
    profile:"",
    user_id: localStorage.getItem("user_id"),
    role: Cookies.get("role"),

    verificationCode: "",
    password: "",
    passwordConfirmation: "",
    emailLocalStorage: "",
    alert: false,
  }),
  actions: {
    setUserData(username, image, role, email, user_id, token){
      Cookies.set("username", username, { expires: 30 });
      Cookies.set("profile", image, { expires: 30 });
      Cookies.set("role", role, { expires: 30 });
      Cookies.set("email", email, { expires: 30 });
      localStorage.setItem("user_id", user_id);
      localStorage.setItem("token", token);
    },
    resetUserData(){
      Cookies.remove("email");
      Cookies.remove("role");
      Cookies.remove("username");
      Cookies.remove("profile");
      localStorage.removeItem("user_id");
      localStorage.removeItem("token");
      localStorage.removeItem("wishListData");
      this.user_id = null;
      this.token = null;
      this.profile = null;
    },
    // Register
    async register(user) {
      await axios
        .post("/register", user)
        .then((res) => {
          this.setUserData(res.data.user.username,res.data.user.image,res.data.user.role,user.email,res.data.user.id,res.data.token)
          this.user_id = res.data.user.id;
          this.token = res.data.token;
          this.profile = res.data.user.image
          // this.router.push('/')
        })
        .catch((err) => {
          console.log(err);
          // errors.value = err.response.data
        });
    },

    // Login
    async login(user) {
      await axios
        .post("/login", user)
        .then((res) => {
          this.setUserData(res.data.user.username,res.data.user.image,res.data.user.role,user.email,res.data.user.id,res.data.token)
          this.user_id = localStorage.getItem("user_id");
          this.token = localStorage.getItem("token");
          if (res.data.user.role === "admin") {
            // this.router.push('/dashboard/admin')
          } else if (res.data.user.role === "landlord") {
            // this.router.push('/dashboard/landlord')
          } else {
            // this.router.push('/')
          }
        })
        .catch((err) => {
          this.errors = err.response.data.message;
        });
    },

    // Log out
    async logout() {
      await axios
        .post("/logout", null, {
          headers: {
            Authorization: `Bearer ${localStorage.getItem("token")}`,
          },
        })
        .then(() => {
          this.resetUserData()
          window.location.href = "/";
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
        });
    },

    async sendEmail() {
      await axios
        .post("/reset_password_request", { email: this.emailSend })
        .then((res) => {
          console.log(res);
          localStorage.setItem("email", this.emailSend);
          setTimeout(() => {
            alert.value = true;
            setTimeout(() => {
              alert.value = false;
            }, 3000);
          }, 1000);
          // this.router.push({name:'Code'});
        })
        .catch((error) => {
          this.message = error.response.data.message;
        });
    },

    async resetPassword() {
      const data = {
        verification_code: this.verificationCode,
        password: this.password,
        password_confirmation: this.passwordConfirmation,
      };
      this.emailLocalStorage = localStorage.getItem("email");
      await axios
        .post("/reset_password", data)
        .then((response) => {
          console.log(response.data);
          let user = {
            email: this.emailLocalStorage,
            password: this.password,
          };
          this.login(user);
        })
        .catch((error) => {
          console.error(error.response.data);
        });
    },
  },
  getters:{
    isLoggedIn:(state) => state.token && state.user_id
  }
});
