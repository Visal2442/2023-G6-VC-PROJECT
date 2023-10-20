import { defineStore } from "pinia";
// import { ref } from 'vue';
// import { useRouter } from "vue-router";
import Cookies from "js-cookie";
import axios from "axios";

export const useAuthStore = defineStore("auth", {
  state: () => ({
    errors: "",
    // router : useRouter(),
    isValide: false,
    token: localStorage.getItem("token"),
    emailSend: "",
    message: "",
    user_id: localStorage.getItem("user_id"),
    role: Cookies.get("role"),

    verificationCode: "",
    password: "",
    passwordConfirmation: "",
    emailLocalStorage: "",
    alert: false,
  }),
  actions: {
    // Register
    async register(user) {
      await axios
        .post("/register", user)
        .then((res) => {
          Cookies.set("username", res.data.user.username, { expires: 30 });
          Cookies.set("image", res.data.user.image, { expires: 30 });
          Cookies.set("role", res.data.user.role, { expires: 30 });
          Cookies.set("email", user.email, { expires: 30 });
          this.user_id = localStorage.setItem("user_id", res.data.user.id);
          localStorage.setItem("token", res.data.token);
          this.token = localStorage.getItem("token");
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
          Cookies.set("username", res.data.user.username, { expires: 30 });
          Cookies.set("image", res.data.user.image, { expires: 30 });
          Cookies.set("role", res.data.user.role, { expires: 30 });
          Cookies.set("email", user.email, { expires: 30 });
          this.user_id = localStorage.setItem("user_id", res.data.user.id);
          localStorage.setItem("token", res.data.token);
          this.token.value = localStorage.getItem("token");
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
          this.user_id = null;
          Cookies.remove("email");
          Cookies.remove("role");
          Cookies.remove("username");
          Cookies.remove("image");
          localStorage.removeItem("user_id");
          localStorage.removeItem("token");
          localStorage.removeItem("wishListData");
          this.token = localStorage.getItem("token");
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
  }
});
