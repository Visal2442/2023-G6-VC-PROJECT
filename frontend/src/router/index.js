import { createRouter, createWebHistory } from 'vue-router'
// Components 
import HomeView from '../views/HomeView.vue'
import AboutView from '../views/AboutView.vue'
import RegisterView from '../views/RegisterView.vue'
import PropertyView from '../views/PropertyView.vue'
import LoginView from '../views/LoginView.vue'
import WishlistView from '../views/WishlistView.vue'

// import LoginForm from '../views/LoginView.vue'
const routes = [
  {
    path: '/',
    name: 'Home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'About',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: AboutView
  },
  {
    path: '/register',
    name: 'Register',
    component: RegisterView
  },
  {
    path: '/property',
    name: 'property',
    component: PropertyView
  },
  {
    path: '/login',
    name: 'Login',
    component: LoginView
  },
  {
    path: '/wishlist',
    name: 'Wishlist',
    component: WishlistView
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
