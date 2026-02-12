# 🎨 SERRAINNOVA Frontend - Premium Client

[![Vue Version](https://img.shields.io/badge/Vue.js-3.x-4FC08D?style=for-the-badge&logo=vue.js)](https://vuejs.org)
[![Vite](https://img.shields.io/badge/Vite-Bundler-646CFF?style=for-the-badge&logo=vite)](https://vitejs.dev)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind-CSS-38B2AC?style=for-the-badge&logo=tailwind-css)](https://tailwindcss.com)

Esta es la cara visible de **SERRAINNOVA**, una aplicación web de última generación diseñada para ofrecer una experiencia fluida, sostenible y visualmente impactante.

---

## ✨ Características Principales

- **SPA (Single Page Application)**: Navegación instantánea sin recargas de página.
- **Modo Oscuro/Claro**: Sistema de temas inteligente basado en las preferencias del usuario.
- **Responsive Design**: Totalmente optimizado para móviles, tablets y monitores ultrawide.
- **Glassmorphism**: Estética moderna con fondos translúcidos y desenfoques elegantes.
- **Gestión de Sesión**: Integración completa con Laravel Sanctum para una seguridad profesional.

---

## 🛠️ Tecnologías Utilizadas

- **Vue 3 (Composition API)**: Estructura lógica modular y reactiva.
- **Vue Router**: Gestión de navegación y guardas de seguridad.
- **Tailwind CSS**: Framework de utilidades para un diseño a medida.
- **Material Symbols**: Iconos dinámicos y minimalistas.
- **Fetch API**: Cliente nativo para peticiones asíncronas al backend.

---

## 📂 Organización del Proyecto

El código está organizado de manera intuitiva para facilitar el mantenimiento:

- `src/views/`: Páginas principales (Landing, Propiedades, Blog, Admin).
- `src/components/`: Piezas reutilizables (Botones, Navegación, Tarjetas).
- `src/router/`: Configuración de rutas y protección de accesos.
- `src/store/`: Estado global de la aplicación (`userStore.js`).
- `src/assets/`: Estilos globales y configuraciones de diseño.

---

## 🚀 Configuración y Ejecución

1.  **Instalar Dependencias**:
    ```bash
    npm install
    ```
2.  **Ejecutar en Desarrollo**:
    ```bash
    npm run dev
    ```
3.  **Compilar para Producción**:
    ```bash
    npm run build
    ```

---

## 🛡️ Control de Acceso (Navigation Guards)

La aplicación implementa protecciones en las rutas mediante `router.beforeEach`:
- **Públicas**: `LandingPage`, `PropertiesPage`, `BlogPage`.
- **Privadas**: `/admin/*` (Requiere autenticación con rol `moderator`).

Si un usuario intenta acceder a una ruta protegida sin permisos, la aplicación lo redirigirá automáticamente a la página de **Login**.

---

## 🎨 Guía de Estilo

Hemos definido una identidad visual propia en el archivo `tailwind.config.js`:
- **Primario**: `#13ec5b` (Verde sostenible vibrante).
- **Fondos**: Degradados progresivos del gris suave al verde esmeralda profundo.
- **Tipografía**: Fuente **Inter** por su alta legibilidad en interfaces digitales.

---

> [!TIP]
> Para mantener la coherencia visual, utiliza siempre los tokens de color definidos en Tailwind: `text-primary`, `bg-primary`, etc.

> [!WARNING]
> Asegúrate de que el backend (`php artisan serve`) esté corriendo para que los datos aparezcan correctamente en la interfaz.

---
© 2026 SERRAINNOVA Team | DAW Academic Project
