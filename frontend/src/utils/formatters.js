export const formatDate = (dateString) => {
	if (!dateString) return "";
	const options = { year: "numeric", month: "long", day: "numeric" };
	return new Date(dateString).toLocaleDateString("es-ES", options);
};

export const formatPrice = (price) => {
	if (price === null || price === undefined) return "";
	return price.toLocaleString("es-ES");
};
