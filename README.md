# 🌳 SERRAINNOVA - Plataforma Inmobiliaria Sostenible

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel)](https://laravel.com)
[![Vue](https://img.shields.io/badge/Vue.js-3.x-4FC08D?style=for-the-badge&logo=vue.js)](https://vuejs.org)
[![Tailwind](https://img.shields.io/badge/Tailwind-CSS-38B2AC?style=for-the-badge&logo=tailwind-css)](https://tailwindcss.com)
[![Status](https://img.shields.io/badge/Status-Academic_Project-orange?style=for-the-badge)](https://github.com)

> **🚀 Proyecto Académico Grupal - Desarrollo de Aplicaciones Web (DAW) | PIIE**
> Integrando sostenibilidad y tecnología de vanguardia en el mercado inmobiliario.

---

## 📌 Visión del Proyecto
SERRAINNOVA es una solución digital avanzada para el sector inmobiliario, centrada exclusivamente en la **sostenibilidad** y la **eficiencia energética**. La plataforma no solo permite la compra/venta de propiedades, sino que actúa como una herramienta de concienciación y cálculo de impacto ambiental para el ciudadano moderno.

---

## 🛠️ Stack Tecnológico

### Backend (El Motor)
- **Laravel 12 (PHP 8.2+):** Elegido por su robustez, sistema de rutas elegante y su potente ORM.
- **Eloquent ORM:** Para una gestión de datos orientada a objetos, facilitando la escalabilidad.
- **Laravel Sanctum:** Implementado para una autenticación ligera y segura mediante tokens API.
- **SQLite/MySQL:** Almacenamiento persistente con migraciones versionadas.
- **Middleware Personalizado:** Control de acceso granular basado en roles (`moderator` vs `user`).

### Frontend (La Interfaz)
- **Vue.js 3 (Composition API):** Para una interfaz reactiva, rápida y modular.
- **Vite:** Como bundler de nueva generación para una experiencia de desarrollo instantánea.
- **Tailwind CSS:** Diseño visual premium, responsive y con sistema de Dark Mode nativo.
- **Fetch API:** Comunicación asíncrona nativa con el backend, evitando dependencias pesadas.
- **Material Symbols:** Iconografía moderna y minimalista.

---

## 🏗️ Arquitectura Desacoplada (Decoupled)
El proyecto se basa en una arquitectura de **SPA (Single Page Application)** separada del servidor. Esto permite:
1. **Escalabilidad Independiente**: El frontend y el backend pueden evolucionar y desplegarse por separado.
2. **Consumo de API**: El backend puede servir datos no solo a la web, sino a futuras aplicaciones móviles.
3. **Seguridad Estricta**: La comunicación se realiza mediante cabeceras `Authorization: Bearer <token>`, protegiendo cada endpoint.

---

## 📁 Estructura del Repositorio
```text
/serrainnova
└── main/
    ├── backend/           # Proyecto Laravel (API REST)
    │   ├── app/           # Modelos, Controladores y Middleware
    │   ├── database/      # Migraciones y Seeders (Datos iniciales)
    │   ├── routes/        # Definición de endpoints API
    │   └── .env           # Configuración del servidor
    └── frontend/          # Proyecto Vue.js (SPA)
        ├── src/
        │   ├── views/     # Páginas (Públicas y Admin)
        │   ├── components/ # Elementos reutilizables
        │   ├── store/     # Gestión de estado (userStore)
        │   └── router/    # Navegación SPA
        └── tailwind.config.js
```

---

## 🚀 Instalación y Despliegue Local

### 1. Requisitos Previos
- PHP >= 8.2
- Composer
- Node.js & npm
- servidor web (servido por Artisan)

### 2. Configuración del Backend
```bash
cd main/backend
composer install
cp .env.example .env
php artisan key:generate

# Configurar base de datos (por defecto SQLite)
# Si usas SQLite, crea el archivo: touch database/database.sqlite
# Migrar base de datos
php artisan migrate --seed

# OPCIONAL: Si prefieres usar SQL puro, usa el script en la raíz:
# mysql -u usuario -p base_de_datos < setup_database.sql
php artisan serve
```
*El servidor correrá en [http://localhost:8000](http://localhost:8000)*

### 3. Configuración del Frontend
```bash
cd main/frontend
npm install
npm run dev
```
*La aplicación estará disponible en [http://localhost:5173](http://localhost:5173)*

---

## ⚙️ Funcionalidades Implementadas

### Área Pública
- **Explorador Sostenible**: Filtrado avanzado por certificación energética (A-G).
- **Ficha Técnica de Propiedad**: Visualización de materiales ecológicos y sistemas de energía renovable.
- **Calculadora CO2**: Herramienta interactiva para medir el ahorro ambiental.
- **Blog de Estilos de Vida**: Artículos sobre sostenibilidad y agenda 2030.

### Área Administrativa (Backoffice)
Acceso exclusivo para usuarios con rol `moderator`.
- **Gestión de Propiedades**: CRUD completo con validación de tipos numéricos y control de visibilidad (`hidden`).
- **Administración de Blogs**: Editor con gestión de fechas ISO y metadatos.
- **Gestión de Usuarios**: Control de roles y monitorización de registros.
- **Dashboard de Estadísticas**: Resumen en tiempo real del inventario y la comunidad.

---

## 🔐 Credenciales de Acceso (Entorno de Desarrollo)
Una vez ejecutado el seeder (`php artisan db:seed`), puedes usar:

| Perfil | Email | Password |
| :--- | :--- | :--- |
| **Administrador** | maria.garcia@email.com | `password123` |
| **Usuario Estándar** | juan.martinez@email.com | `password123` |

---

## � Documentación Adicional
Para más detalles técnicos, consulta los archivos internos:
- [Proceso de Conexión](file:///c:/dev/school/main/PROCESO_CONEXION.md): Detalle de la integración API.
- [Explicación del Proyecto](file:///c:/dev/school/main/EXPLICACION_PROYECTO.md): Filosofía y arquitectura.

---

## � Equipo de Desarrollo (DAW)
Proyecto realizado por el grupo de alumnos de **Ciclo Formativo de Grado Superior en Desarrollo de Aplicaciones Web**.

- **Centro:** [Nombre del Centro]
- **Asignatura:** Proyecto / PIIE
- **Fecha:** Febrero 2026

---
© 2026 SERRAINNOVA - Hacia un mercado inmobiliario consciente.
