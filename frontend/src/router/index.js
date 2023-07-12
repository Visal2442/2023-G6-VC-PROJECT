import { createRouter, createWebHistory } from 'vue-router'
// Components 
import HomeView from '../views/HomeView.vue';
import AboutView from '../views/AboutView.vue';
import RegisterView from '../views/RegisterView.vue';
import MapView from '../views/MapView.vue';
import PropertyView from '../views/PropertyView.vue'
import LoginView from '../views/LoginView.vue'
import EmailView from '../views/EmailView.vue'
import CodeView from '../views/CodeView.vue'
import WishlistView from '../views/WishlistView.vue'
import DetailView from '../views/DetailView.vue';

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
    component: AboutView
  },
  {
    path: '/register',
    name: 'Register',
    component: RegisterView
  },
  {
    path: '/login',
    name: 'Login',
    component: LoginView
  },
  {
    path: '/map',
    name: 'Map',
    component: MapView
  },
  {
    path: '/property',
    name: 'property',
    component: PropertyView
  },
  {
    path: '/detail/:id',
    name: 'Detail',
    component: DetailView
  },
  {
    path: '/wishlist',
    name: 'Wishlist',
    component: WishlistView
  },
  {
    path: '/email',
    name: 'Email',
    component: EmailView
  },
  {
    path: '/code',
    name: 'Code',
    component: CodeView
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
