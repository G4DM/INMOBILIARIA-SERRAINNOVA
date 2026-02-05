# SERRAINNOVA - Plataforma Inmobiliaria Sostenible

Plataforma web inmobiliaria desarrollada como **proyecto académico de gran envergadura**, enfocada en la gestión de propiedades sostenibles y eficiencia energética, utilizando **Laravel**, **Vue.js** y **TailwindCSS**.

<br>

## 📌 Descripción del Proyecto

SERRAINNOVA es una plataforma orientada a ofrecer **soluciones inmobiliarias sostenibles**, donde los usuarios pueden:

- Consultar propiedades disponibles para compra o alquiler.
- Acceder a información sobre eficiencia energética y ahorro de CO2.
- Calcular el impacto ambiental de su vivienda.
- Gestionar propiedades y servicios desde un backoffice administrativo.

El proyecto combina un **frontend moderno y responsive** con TailwindCSS y Vue.js, junto con un **backend robusto** basado en Laravel, ofreciendo un sistema escalable y profesional.

<br>

## 🛠 Tecnologías Utilizadas

- **Frontend:**
  - Vue.js (composición y componentes)
  - TailwindCSS (diseño responsive y utilitario)
  - Material Symbols Outlined (iconografía)
- **Backend:**
  - Laravel
  - Eloquent ORM para gestión de base de datos
  - Autenticación y control de usuarios
- **Base de Datos:**
  - MySQL / MariaDB
- **Otras:**
  - Git para control de versiones
  - Vite como bundler

<br>

## 🏗 Estructura del Proyecto

```text
/serrainnova
├─ app/                # Lógica principal de Laravel
├─ bootstrap/          # Configuración inicial
├─ config/             # Configuraciones del proyecto
├─ database/           # Migraciones y seeders
├─ public/             # Archivos públicos (CSS, JS, imágenes)
├─ resources/
│   ├─ css/            # TailwindCSS
│   ├─ js/             # Vue.js components y scripts
│   └─ views/          # Blade templates
├─ routes/             # Definición de rutas web y API
└─ tests/              # Pruebas unitarias y de integración
```

<br>

## 🚀 Instalación y Configuración

```bash
# Clonar el repositorio
git clone https://github.com/tu-usuario/serrainnova.git
cd serrainnova

# Instalar dependencias de Laravel
composer install

# Instalar dependencias de Node.js
npm install

# Configurar archivo .env
cp .env.example .env
php artisan key:generate

# Migrar base de datos
php artisan migrate

# Iniciar servidor de desarrollo
php artisan serve

# Iniciar frontend (Vite)
npm run dev
```

<br>

## ⚙ Funcionalidades Principales

1. **Gestión de Propiedades**
   - CRUD completo de inmuebles.
   - Subida de imágenes y certificados PDF.
2. **Impacto Energético**
   - Cálculo de ahorro de CO2.
   - Estimación de ahorro económico anual.
3. **Servicios Sostenibles**
   - Auditorías energéticas.
   - Valoraciones de propiedades según eficiencia.
   - Asesoría hipotecaria verde.
4. **Autenticación y Roles**
   - Usuarios, administradores y agentes inmobiliarios.
5. **Diseño Responsivo**
   - Adaptación a dispositivos móviles, tablets y escritorio.
   - Sistema Light/Dark Mode.

<br>

## 🎨 Guía de Estilos (Tailwind + Figma)

- **Paleta de colores:**
  - `primary`: #13ec5b
  - `background-light`: #f6f8f6
  - `background-dark`: #102216
  - `textdark`: #0d1b12
  - `success`: #078829
- **Tipografía:** Inter, con pesos de 400 a 900
- **Border Radius:** sm (0.25rem), lg (0.5rem), xl (0.75rem), full (9999px)
- **Componentes base:** Botones, tarjetas, formularios, navbar, footer

<br>

## 📂 Plan Futuro

- Integración completa de **backoffice administrativo**.
- Sistema de autenticación avanzado con roles.
- Dashboard con estadísticas de impacto energético.
- Módulo de notificaciones y correo electrónico.
- Versiones multi-idioma (ES / EN / FR).
- Preparación para **producción y deployment**.

<br>

## 📝 Licencia

Este proyecto se distribuye bajo la licencia **MIT**.

<br>

## 📞 Contacto

- Email: info@serrainova.es  
- Teléfono: +34 960 000 000  
- Dirección: Partida La Banderilla 44G, Valencia, España
