import { createRouter, createWebHistory } from 'vue-router'
import HomePage from '../views/HomePage.vue'
import PropertiesPage from '../views/PropertiesPage.vue'
import PropertyDetailPage from '../views/PropertyDetailPage.vue'
import CalculatorPage from '../views/CalculatorPage.vue'
import AdminDashboardPage from '../views/AdminDashboardPage.vue'
import BlogPage from '../views/BlogPage.vue'
import BlogPostPage from '../views/BlogPostPage.vue'
import ServicesPage from '../views/ServicesPage.vue'
import AboutPage from '../views/AboutPage.vue'
import ContactPage from '../views/ContactPage.vue'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomePage
        },
        {
            path: '/propiedades',
            name: 'properties',
            component: PropertiesPage
        },
        {
            path: '/propiedad/:id',
            name: 'property-detail',
            component: PropertyDetailPage
        },
        {
            path: '/calculadora',
            name: 'calculator',
            component: CalculatorPage
        },
        {
            path: '/admin',
            name: 'admin',
            component: AdminDashboardPage
        },
        {
            path: '/blog',
            name: 'blog',
            component: BlogPage
        },
        {
            path: '/blog/:id',
            name: 'blog-post',
            component: BlogPostPage
        },
        {
            path: '/servicios',
            name: 'services',
            component: ServicesPage
        },
        {
            path: '/quienes-somos',
            name: 'about',
            component: AboutPage
        },
        {
            path: '/contacto',
            name: 'contact',
            component: ContactPage
        }
    ]
})

export default router
