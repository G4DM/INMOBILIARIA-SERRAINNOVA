# 🗄️ SERRAINNOVA Database - SQL Reference & Recovery

[![Database](https://img.shields.io/badge/Database-MySQL%20Compatible-4479A1?style=for-the-badge&logo=mysql)](https://www.mysql.com/)
[![Schema](https://img.shields.io/badge/Schema-Production%20Ready-green?style=for-the-badge)]()
[![Fallback](https://img.shields.io/badge/Fallback-SQL%20Recovery-orange?style=for-the-badge)]()

Este documento define la estructura oficial de la base de datos de **SERRAINNOVA** y proporciona un script SQL completo preparado para escenarios de recuperación, despliegue manual o fallo de seeders.

El script permite crear desde cero:

- Base de datos
- Tablas
- Relaciones estructurales
- Datos iniciales

---

## 🧱 Filosofía de Diseño

La base de datos ha sido diseñada siguiendo tres principios clave:

✔ Simplicidad estructural  
✔ Compatibilidad con Eloquent ORM  
✔ Recuperación rápida ante fallos  

Aunque el entorno principal utiliza migraciones y seeders de Laravel, el archivo `.sql` actúa como **backup estructural universal**.

---

## 📦 Tablas del Sistema

### 👤 users
Gestiona autenticación, roles y metadatos de usuarios.

| Campo | Tipo | Descripción |
|--------|-----------|----------------|
| id | unsigned bigint | Identificador único |
| name | varchar | Nombre completo |
| email | varchar (unique) | Email del usuario |
| registrationDate | varchar | Fecha registro |
| phone | varchar | Teléfono |
| lastLogin | varchar | Último acceso |
| role | varchar | user / moderator |
| password | varchar | Hash bcrypt |
| created_at | timestamp | Registro Laravel |
| updated_at | timestamp | Actualización Laravel |

---

### 🏠 properties
Almacena todas las propiedades inmobiliarias sostenibles.

| Campo | Tipo | Descripción |
|------------|-----------------|----------------|
| title | varchar | Nombre comercial |
| price | unsigned bigint | Precio |
| location | varchar | Dirección |
| bedrooms | int | Dormitorios |
| bathrooms | int | Baños |
| area | int | Metros cuadrados |
| image | text | URL imagen |
| energyCertification | varchar | Certificado energético |
| energyType | json | Fuentes energéticas |
| materials | json | Materiales sostenibles |
| co2Emissions | int | Emisiones estimadas |
| co2Savings | int | Ahorro estimado |
| description | text | Descripción |
| features | json | Características |
| sustainabilityChecklist | json | Checklist ecológico |
| certifications | json | Certificaciones oficiales |
| hidden | boolean | Visibilidad |

---

### 📰 articles
Contenido editorial y divulgativo.

| Campo | Tipo | Descripción |
|-----------|----------|----------------|
| title | varchar | Título |
| excerpt | text | Resumen |
| category | varchar | Categoría |
| date | date | Fecha publicación |
| image | varchar | Imagen portada |
| content | longtext | Contenido completo |
| hidden | boolean | Visibilidad |

---

## ⚙️ Tipos de Datos Relevantes

### JSON Storage
Se utiliza JSON para campos flexibles como:

- energyType
- materials
- features
- sustainabilityChecklist
- certifications

Esto permite extender funcionalidades sin migraciones constantes.

---

### Unsigned BigInteger
El campo `price` usa `unsignedBigInteger` para:

- Soportar grandes volúmenes económicos
- Mantener compatibilidad con Laravel

---

## 🚨 Uso del Script SQL

El archivo SQL debe utilizarse únicamente cuando:

- Fallan migraciones o seeders
- Se necesita despliegue manual
- Se realiza testing independiente del framework
- Se reconstruye la base de datos en entornos externos

---

## ▶️ Ejecución Manual

### 1. Crear Base de Datos
```sql
CREATE DATABASE serrainnova;
USE serrainnova;
```
### 2. Ejecutar Script Completo
```sql
mysql -u root -p serrainnova < serrainnova.sql
```

---

## 🌱 Datos Iniciales Incluidos

El script introduce:
- 5 usuarios (incluyendo moderador)
- 6 propiedades sostenibles
- 6 artículos del blog

---

## 🔐 Credenciales de Prueba

| Rol |	Email | Password |
|-----|-------|----------|
| Moderator |	maria.garcia@email.com | password123 |
| User | Otros registros | password123 |

---

## 🧪 Compatibilidad con Laravel

El script ha sido alineado para coincidir con:

- Modelos Eloquent
- Migraciones actuales
- Seeders oficiales

> [!WARNING]
> No sustituye el flujo Laravel estándar, solo actúa como respaldo.

---

## 📊 Consideraciones Técnicas
### Charset
```sql
utf8mb4
```
Permite compatibilidad total con caracteres internacionales y emojis.

### Engine
```sql
InnoDB
```
Garantia:
- Transacciones
- Integridad de datos
- Bloqueo por fila

---

## 🧩 Convenciones del Proyecto
- Campos booleanos almacenados como `tinyint(1)`
-  Uso de timestamps Laravel
-  Nombres de tablas en plural
-  JSON para datos estructurales extensibles

---

## 🧯 Recuperación Rápida
Si el entorno queda corrupto:
```bash
DROP DATABASE serrainnova;
CREATE DATABASE serrainnova;
IMPORTAR SCRIPT SQL
```

---

## 📌 Recomendaciones Profesionales

- Priorizar migraciones Laravel en desarrollo activo
- Utilizar SQL fallback únicamente en contingencias
- Mantener sincronía entre migraciones y script manual

> [!WARNING]
> El script contiene datos de prueba. Nunca debe ejecutarse en producción sin revisión previa.

> [!TIP]
> Puedes inspeccionar rápidamente los datos ejecutando:
```sql
SELECT * FROM users;
SELECT * FROM properties;
SELECT * FROM articles;
```

---

© 2026 SERRAINNOVA Team | DAW Academic Project
