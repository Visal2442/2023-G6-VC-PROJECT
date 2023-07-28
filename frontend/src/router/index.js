import { createRouter, createWebHistory } from "vue-router";
// Components
import HomeView from "../views/customer/HomeView.vue";
import AboutView from "../views/customer/AboutView.vue";
import MapView from "../views/map/MapView.vue";
import PropertyView from "../views/customer/PropertyView.vue";
import RegisterView from "../views/auth/RegisterView.vue";
import LoginView from "../views/auth/LoginView.vue";
import EmailView from "../views/email/EmailView.vue";
import CodeView from "../views/email/CodeView.vue";
import WishlistView from "../views/customer/WishlistView.vue";
import DetailView from "../views/customer/DetailView.vue";
import NotFoundView from "../views/404/NotFoundView.vue";
import BookingView from "../views/booking/BookingView.vue";
import Dashboard from "../views/admin/DashboardView.vue";
import PostPropertyView from "../views/landlord/PostPropertyView.vue";
import DashboardPropertyView from "@/views/landlord/DashboardPropertyView.vue";
import ContactUsView from "../views/customer/ContactUsView.vue";
import UserView from "../views/admin/UserView.vue";

// AuthStore Pinia
import { useAuthStore } from "../store/AuthStore";
import { storeToRefs } from "pinia";

const routes = [
  {
    path: "/",
    name: "Home",
    component: HomeView,
    meta: { title: "Home" },
  },
  {
    path: "/about",
    name: "About",
    component: AboutView,
    meta: { title: "About-Us" },
  },
  {
    path: "/register",
    name: "Register",
    component: RegisterView,
    meta: { title: "Register" },
  },
  {
    path: "/login",
    name: "Login",
    component: LoginView,
    meta: { title: "Login" },
  },
  {
    path: "/map",
    name: "Map",
    component: MapView,
    meta: { title: "Map" },
  },
  {
    path: "/property",
    name: "property",
    component: PropertyView,
    meta: { title: "Properties" },
  },
  {
    path: "/detail/:id",
    name: "Detail",
    component: DetailView,
    meta: { title: "Property-Detail" },
  },
  {
    path: "/wishlist",
    name: "Wishlist",
    component: WishlistView,
    meta: { title: "Wishlist" },
  },
  {
    path: "/contact",
    name: "Contact",
    component: ContactUsView,
    meta: { title: "Contact-Us" },
  },
  {
    path: "/email",
    name: "Email",
    component: EmailView,
    meta: { title: "Email" },
  },
  {
    path: "/code",
    name: "Code",
    component: CodeView,
    meta: { title: "Code" },
  },
  {
    path: "/booking",
    name: "Booking",
    component: BookingView,
    meta: { title: "Booking" },
  },
  // Admin Dashboard
  {
    path: "/dashboard/admin",
    name: "Dashboard",
    component: Dashboard,
    meta: { title: "Dashboard" },
  },
  {
    path: "/dashboard/admin/properties",
    name: "AdminProperties",
    component: DashboardPropertyView,
    meta: { title: "Dashboard-Properties" },
  },
  {
    path: "/dashboard/admin/users",
    name: "Users",
    component: UserView,
    meta: { title: "Dashboard-Users" },
  },
  // Landlord Dashboard
  {
    path: "/dashboard/landlord",
    name: "LandlordDashboard",
    component: Dashboard,
    meta: { title: "Dashboard-Landlord" },
  },
  {
    path: "/dashboard/landlord/post",
    name: "Post",
    component: PostPropertyView,
    meta: { title: "Properties" },
  },
  {
    path: "/dashboard/landlord/properties",
    name: "LandlordProperties",
    component: DashboardPropertyView,
    meta: { title: "Landlord-Property" },
  },
  // 404 Not Found
  {
    path: "/:catchAll(.*)",
    name: "404NotFound",
    component: NotFoundView,
    meta: { title: "404 Not Found" },
  },
  {
    path: "/not_found",
    name: "NotFound",
    component: NotFoundView,
    meta: { title: "404 Not Found" },
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes: routes,
});

// Chage page title
const pageTitle = (title) => {
  document.title = title;
};

// Protection Routes 
router.beforeEach(async (to, from, next) => {
  const { user_id, role } = storeToRefs(useAuthStore());
  if (to.name === "404NotFound") {
    next({ name: "NotFound" });
  }
  if (!user_id.value) {
    if (to.name === "Wishlist") {
      alert("Please Login your account!");
      next({ name: from.name });
    } else if (to.path.includes("dashboard")) {
      pageTitle(to.meta.title);
      next({ name: "NotFound" });
    } else {
      pageTitle(to.meta.title);
      next();
    }
  } else if (user_id.value) {
    if (
      (role.value == "customer" && to.path.includes("dashboard")) ||
      (role.value == "landlord" && to.path.includes("admin"))
    ) {
      pageTitle(to.meta.title);
      next({ name: "NotFound" });
    } else if (to.name === "Login" || to.name === "Register") {
      pageTitle(to.meta.title);
      next({ name: from.name });
    } else {
      pageTitle(to.meta.title);
      next();
    }
  } else {
    pageTitle(to.meta.title);
    next();
  }
});

export default router;
