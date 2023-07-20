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
import Dashboard from "../views/DashboardView.vue";
import PostPropertyView from '../views/PostPropertyView.vue';
import LandlordPropertyView from '../views/LandlordPropertyView.vue';
import AdminPropertyView from '../views/AdminPropertView.vue';

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
  // Admin Dashboard 
  {
    path: "/dashboard/admin",
    name: "Dashboard",
    component: Dashboard,
  },
  {
    path: "/dashboard/admin/properties",
    name: "AdminProperties",
    component: AdminPropertyView,
  },
  // Landlord Dashboard 
  {
    path: "/dashboard/landlord",
    name: "LandlordDashboard",
    component: Dashboard,
  },
  {
    path:'/dashboard/landlord/post',
    name:'Post',
    component:PostPropertyView
  },
  {
    path:'/dashboard/landlord/properties',
    name:'LandlordProperties',
    component:LandlordPropertyView
  },
  // 404 Not Found 
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
  const { user_id, role } = storeToRefs(useAuthStore());

  if(!user_id.value){
    if(to.name === 'Wishlist'){
      alert("Please Login your account!");
      next({name: from.name})
    }
    else if(to.path.includes('dashboard')){
      next({name:'NotFound'})
    }
    else {
      next();
    }
  }
  else if (user_id.value){
    if((role.value == 'customer' && to.path.includes('dashboard')) || (role.value == 'landlord' && to.path.includes('admin'))){
      next({name:'NotFound'})
    }
    else if(to.name === 'Login' || to.name === 'Register'){
      next({name: from.name});
    }
    else {
      next();
    }
  }
  else{
    next();
  }
});

export default router;
