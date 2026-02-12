import { reactive, watch } from "vue";

const STORE_KEY = "serrainova_user_session";

// Initial state from localStorage if available
const savedSession = JSON.parse(localStorage.getItem(STORE_KEY) || "null");

export const userStore = reactive({
	user: savedSession?.user || null,
	token: savedSession?.token || null,

	get isAuthenticated() {
		return !!this.token;
	},

	get isModerator() {
		return this.user?.role === "moderator";
	},

	setSession(user, token) {
		this.user = user;
		this.token = token;
		localStorage.setItem(STORE_KEY, JSON.stringify({ user, token }));
	},

	clearSession() {
		this.user = null;
		this.token = null;
		localStorage.removeItem(STORE_KEY);
	},
});

// Persistence helper for debugging
watch(
	userStore,
	(newState) => {
		if (newState.token) {
			localStorage.setItem(STORE_KEY, JSON.stringify({ user: newState.user, token: newState.token }));
		} else {
			localStorage.removeItem(STORE_KEY);
		}
	},
	{ deep: true },
);
