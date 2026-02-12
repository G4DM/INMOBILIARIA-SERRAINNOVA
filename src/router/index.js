import { createRouter, createWebHistory } from "vue-router";
import HomePage from "../views/HomePage.vue";
import PropertiesPage from "../views/PropertiesPage.vue";
import PropertyDetailPage from "../views/PropertyDetailPage.vue";
import CalculatorPage from "../views/CalculatorPage.vue";
import AdminDashboardPage from "../views/AdminDashboardPage.vue";
import BlogPage from "../views/BlogPage.vue";
import BlogPostPage from "../views/BlogPostPage.vue";
import ServicesPage from "../views/ServicesPage.vue";
import AboutPage from "../views/AboutPage.vue";
import ContactPage from "../views/ContactPage.vue";
import LoginPage from "../views/LoginPage.vue";
import { userStore } from "../store/userStore";

const router = createRouter({
	history: createWebHistory(import.meta.env.BASE_URL),
	routes: [
		{
			path: "/",
			name: "home",
			component: HomePage,
		},
		{
			path: "/login",
			name: "login",
			component: LoginPage,
		},
		{
			path: "/propiedades",
			name: "properties",
			component: PropertiesPage,
		},
		{
			path: "/propiedad/:id",
			name: "property-detail",
			component: PropertyDetailPage,
		},
		{
			path: "/calculadora",
			name: "calculator",
			component: CalculatorPage,
		},
		{
			path: "/admin",
			name: "admin",
			component: AdminDashboardPage,
		},
		{
			path: "/admin/propiedades",
			name: "admin-properties",
			component: () => import("../views/AdminPropertiesPage.vue"),
		},
		{
			path: "/admin/blogs",
			name: "admin-blogs",
			component: () => import("../views/AdminBlogsPage.vue"),
		},
		{
			path: "/admin/usuarios",
			name: "admin-users",
			component: () => import("../views/AdminUsersPage.vue"),
		},
		{
			path: "/blog",
			name: "blog",
			component: BlogPage,
		},
		{
			path: "/blog/:id",
			name: "blog-post",
			component: BlogPostPage,
		},
		{
			path: "/servicios",
			name: "services",
			component: ServicesPage,
		},
		{
			path: "/quienes-somos",
			name: "about",
			component: AboutPage,
		},
		{
			path: "/contacto",
			name: "contact",
			component: ContactPage,
		},
	],
});

// Guardia de Navegación para proteger la administración
router.beforeEach((to, from, next) => {
	const isAdminRoute = to.path.startsWith("/admin");

	if (isAdminRoute) {
		if (!userStore.isAuthenticated) {
			// No autenticado -> al login
			next("/login");
		} else if (!userStore.isModerator) {
			// Autenticado pero no es moderador -> al inicio
			next("/");
		} else {
			// Todo correcto
			next();
		}
	} else {
		// No es ruta admin, dejar pasar
		next();
	}
});

export default router;
