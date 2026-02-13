# 🛠️ SERRAINNOVA Backend - Core API

[![Laravel Version](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel)](https://laravel.com)
[![PHP Version](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php)](https://php.net)
[![Auth](https://img.shields.io/badge/Sanctum-Authenticated-blue?style=for-the-badge)](https://laravel.com/docs/sanctum)

Bienvenido al corazón tecnológico de **SERRAINNOVA**. Esta API REST robusta y escalable gestiona toda la lógica de negocio, seguridad y persistencia de datos del ecosistema inmobiliario sostenible.

---

## 🏗️ Arquitectura y Tecnologías

El backend se ha construido siguiendo los estándares modernos de **Laravel**, priorizando el rendimiento y la seguridad.

- **Framework**: Laravel 12.x
- **ORM**: Eloquent (Gestión elegante de modelos)
- **Seguridad**: Laravel Sanctum (Autenticación basada en Tokens)
- **Base de Datos**: SQLite (Optimizado para desarrollo rápido)
- **Patrón**: MVC (Model-View-Controller) enfocado únicamente en la capa API.

---

## 🔐 Seguridad y Roles

Implementamos un sistema de protección de dos capas:
1.  **Sanctum**: Verificación de tokens de acceso Bearer.
2.  **Middleware de Roles**: Filtro personalizado `CheckRole` que restringe el acceso según permisos.

### Roles Disponibles:
| Rol | Permisos |
| :--- | :--- |
| `moderator` | CRUD total de propiedades, blogs y usuarios. Acceso a paneles administrativos. |
| `user` | Acceso a perfil propio y favoritos (proximamente). |

---

## 📂 Estructura Principal

- `app/Http/Controllers`: Lógica de los endpoints.
- `app/Models`: Definición de esquemas y relaciones de datos.
- `database/migrations`: Historial de la estructura de la base de datos.
- `database/seeders`: Generadores de datos de prueba premium.
- `routes/api.php`: Definición de todas las rutas del sistema.

---

## 🚀 Instalación y Puesta en Marcha

Sigue estos pasos para tener el servidor funcionando en menos de 2 minutos:

1.  **Instalar Dependencias**:
    ```bash
    composer install
    ```
2.  **Configurar Entorno**:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
3.  **Preparar Base de Datos**:
    ```bash
    # Crea el archivo de base de datos si no existe
    touch database/database.sqlite
    
    # Ejecuta migraciones y carga datos de prueba
    php artisan migrate:fresh --seed
    ```
4.  **Iniciar Servidor**:
    ```bash
    php artisan serve
    ```

---

## 📡 Referencia de la API (Endpoints Clave)

### 🔓 Públicos
- `GET /api/properties`: Lista todas las propiedades visibles.
- `GET /api/articles`: Lista todos los artículos del blog.
- `POST /api/login`: Inicio de sesión (devuelve token).

### 🔒 Protegidos (`Authorization: Bearer <token>`)
- `GET /api/users`: Lista de usuarios (solo moderadores).
- `POST /api/properties`: Crear nueva propiedad.
- `PUT /api/articles/{id}`: Actualizar artículo.
- `DELETE /api/users/{id}`: Eliminar cuenta de usuario.

---

> [!IMPORTANT]
> Los tipos de datos han sido refinados. El campo `price` es de tipo `unsignedBigInteger` y las fechas utilizan el formato nativo de base de datos `YYYY-MM-DD`.

> [!TIP]
> Puedes usar **Laravel Tinker** para interactuar rápidamente con la base de datos desde la terminal: `php artisan tinker`.

---
© 2026 SERRAINNOVA Team | DAW Academic Project
