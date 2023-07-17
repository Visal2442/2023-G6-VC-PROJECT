import { createRouter, createWebHistory } from "vue-router";
// Components
import HomeView from "../views/HomeView.vue";
import AboutView from "../views/AboutView.vue";
import RegisterView from "../views/RegisterView.vue";
import MapView from "../views/MapView.vue";
import PropertyView from "../views/PropertyView.vue";
import LoginView from "../views/LoginView.vue";
import EmailView from "../views/EmailView.vue";
import CodeView from "../views/CodeView.vue";
import WishlistView from "../views/WishlistView.vue";
import DetailView from "../views/DetailView.vue";
import NotFoundView from "../views/NotFoundView.vue";

// AuthStore Pinia
import { useAuthStore } from "../store/AuthStore";
import { storeToRefs } from "pinia";

const routes = [
  {
    path: "/",
    name: "Home",
    component: HomeView,
  },
  {
    path: "/about",
    name: "About",
    component: AboutView,
  },
  {
    path: "/register",
    name: "Register",
    component: RegisterView,
  },
  {
    path: "/login",
    name: "Login",
    component: LoginView,
  },
  {
    path: "/map",
    name: "Map",
    component: MapView,
  },
  {
    path: "/property",
    name: "property",
    component: PropertyView,
  },
  {
    path: "/detail/:id",
    name: "Detail",
    component: DetailView,
  },
  {
    path: "/wishlist",
    name: "Wishlist",
    component: WishlistView,
  },
  {
    path: "/email",
    name: "Email",
    component: EmailView,
  },
  {
    path: "/code",
    name: "Code",
    component: CodeView,
  },
  {
    path: "/:catchAll(.*)",
    name: "404NotFound",
    component: NotFoundView,
  },
  {
    path: "/not_found",
    name: "NotFound",
    component: NotFoundView,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes: routes,
});

router.beforeEach(async (to, from, next) => {
  const { user } = storeToRefs(useAuthStore());

  if (!user.value && to.name == "Wishlist") {
    alert("Please Login your account!");
    next({name: from.name})
  } else if (user.value && (to.name == "Login" || to.name == "Register")) {
    next({ name: "Home" });
  } else {
    next();
  }
});

export default router;
