-- SERRAINNOVA: SQL Database Setup Script
-- Proyecto Académico (DAW / PIIE)

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
CREATE DATABASE IF NOT EXISTS `backend`;
USE `backend`;
START TRANSACTION;
SET time_zone = "+00:00";

-- ---------------------------------------------------------
-- 1. Estructura de Tablas (Schema)
-- ---------------------------------------------------------

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `registrationDate` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `lastLogin` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `properties` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `price` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(255) NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `image` text NOT NULL,
  `energyCertification` varchar(255) NOT NULL,
  `energyType` json NOT NULL,
  `materials` json NOT NULL,
  `co2Emissions` int(11) NOT NULL,
  `co2Savings` int(11) NOT NULL,
  `description` text NOT NULL,
  `features` json NOT NULL,
  `sustainabilityChecklist` json NOT NULL,
  `certifications` json NOT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `articles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `excerpt` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------
-- 2. Inserción de Datos (Seeders)
-- ---------------------------------------------------------

-- Usuarios (Password: password123)
INSERT INTO `users` (`id`, `name`, `email`, `registrationDate`, `phone`, `lastLogin`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1, 'María García López', 'maria.garcia@email.com', '2026-01-15', '+34 612 345 678', '2026-02-09', 'moderator', '$2y$12$B1B1x2u2yS7r7QY9mG0U1OuY2f3hG4iH5jJ6kK7lL8mM9nN0oO', NOW(), NOW()),
(2, 'Juan Martínez Ruiz', 'juan.martinez@email.com', '2026-01-20', '+34 623 456 789', '2026-02-10', 'user', '$2y$12$B1B1x2u2yS7r7QY9mG0U1OuY2f3hG4iH5jJ6kK7lL8mM9nN0oO', NOW(), NOW()),
(3, 'Ana Fernández Sánchez', 'ana.fernandez@email.com', '2026-01-25', '+34 634 567 890', '2026-02-08', 'user', '$2y$12$B1B1x2u2yS7r7QY9mG0U1OuY2f3hG4iH5jJ6kK7lL8mM9nN0oO', NOW(), NOW()),
(4, 'Carlos López Pérez', 'carlos.lopez@email.com', '2026-02-01', '+34 645 678 901', '2026-02-10', 'user', '$2y$12$B1B1x2u2yS7r7QY9mG0U1OuY2f3hG4iH5jJ6kK7lL8mM9nN0oO', NOW(), NOW()),
(5, 'Laura Rodríguez Gómez', 'laura.rodriguez@email.com', '2026-02-05', '+34 656 789 012', '2026-02-09', 'user', '$2y$12$B1B1x2u2yS7r7QY9mG0U1OuY2f3hG4iH5jJ6kK7lL8mM9nN0oO', NOW(), NOW());

-- Propiedades
INSERT INTO `properties` (`id`, `title`, `price`, `location`, `bedrooms`, `bathrooms`, `area`, `image`, `energyCertification`, `energyType`, `materials`, `co2Emissions`, `co2Savings`, `description`, `features`, `sustainabilityChecklist`, `certifications`, `hidden`, `created_at`, `updated_at`) VALUES
(1, 'Villa Solar Pasiva Moderna', 895000, 'Calle Verde 124, Valencia', 3, 2, 210, 'https://example.com/image1.jpg', 'A', '[\"Solar\", \"Aerotermia\"]', '[\"Madera\", \"Hormigón ecológico\"]', 12, 65, 'Esta impresionante villa moderna combina diseño contemporáneo con sostenibilidad de vanguardia. Equipada con paneles solares de última generación.', '[\"Paneles Solares\", \"Recolección de Agua\", \"Calefacción Geotérmica\", \"Materiales Ecológicos\"]', '{\"materials\": {\"certifiedWood\": true, \"ecologicalPaints\": true}, \"energySources\": {\"aerothermal\": true, \"solarPanels\": true}, \"waterConsumption\": {\"rainwaterRecovery\": true}, \"thermalInsulation\": {\"sateSystem\": true, \"climalitWindows\": true}}', '[\"Passivhaus\", \"LEED Gold\"]', 0, NOW(), NOW()),
(2, 'Refugio Sostenible', 620000, 'Calle Pinos 42, Valencia', 2, 1, 145, 'https://example.com/image2.jpg', 'B', '[\"Biomasa\"]', '[\"Madera\", \"Ladrillo reciclado\"]', 18, 52, 'Refugio acogedor diseñado con principios de arquitectura sostenible.', '[\"Sistema Biomasa\", \"Madera Certificada\", \"Aislamiento Natural\", \"Ventilación Cruzada\"]', '{\"materials\": {\"certifiedWood\": true, \"ecologicalPaints\": true}, \"energySources\": {\"aerothermal\": false, \"solarPanels\": false}, \"waterConsumption\": {\"rainwaterRecovery\": false}, \"thermalInsulation\": {\"sateSystem\": false, \"climalitWindows\": true}}', '[\"BREEAM\"]', 0, NOW(), NOW()),
(3, 'Complejo de Lofts Eco-Urbanos', 540000, 'Calle Mercado 880, Valencia', 1, 1, 92, 'https://example.com/image3.jpg', 'A', '[\"Solar\"]', '[\"Hormigón ecológico\"]', 8, 78, 'Loft moderno en el corazón de Valencia con máxima eficiencia energética.', '[\"Energía Solar Comunitaria\", \"Domótica Integrada\", \"Iluminación LED\", \"Electrodomésticos A+++\"]', '{\"materials\": {\"certifiedWood\": false, \"ecologicalPaints\": true}, \"energySources\": {\"aerothermal\": false, \"solarPanels\": true}, \"waterConsumption\": {\"rainwaterRecovery\": false}, \"thermalInsulation\": {\"sateSystem\": true, \"climalitWindows\": true}}', '[\"LEED Silver\"]', 0, NOW(), NOW()),
(4, 'Casa Bioclimática', 725000, 'Avenida Sostenible 15, Valencia', 4, 3, 280, 'https://example.com/image4.jpg', 'A', '[\"Aerotermia\", \"Solar\"]', '[\"Madera\"]', 10, 70, 'Vivienda unifamiliar diseñada siguiendo principios bioclimáticos.', '[\"Diseño Bioclimático\", \"Aerotermia\", \"Paneles Solares\", \"Construcción en Madera\"]', '{\"materials\": {\"certifiedWood\": true, \"ecologicalPaints\": true}, \"energySources\": {\"aerothermal\": true, \"solarPanels\": true}, \"waterConsumption\": {\"rainwaterRecovery\": true}, \"thermalInsulation\": {\"sateSystem\": true, \"climalitWindows\": true}}', '[\"Passivhaus\", \"BREEAM Excellent\"]', 0, NOW(), NOW()),
(5, 'Apartamento Eficiente', 385000, 'Calle Ecología 67, Valencia', 2, 2, 110, 'https://example.com/image5.jpg', 'C', '[\"Solar\"]', '[\"Hormigón ecológico\", \"Ladrillo reciclado\"]', 25, 35, 'Apartamento moderno con buena eficiencia energética en zona residencial tranquila.', '[\"Solar Térmica\", \"Aislamiento Mejorado\", \"Ventanas Doble Acristalamiento\", \"Zona Verde Comunitaria\"]', '{\"materials\": {\"certifiedWood\": false, \"ecologicalPaints\": true}, \"energySources\": {\"aerothermal\": false, \"solarPanels\": true}, \"waterConsumption\": {\"rainwaterRecovery\": false}, \"thermalInsulation\": {\"sateSystem\": false, \"climalitWindows\": true}}', '[]', 0, NOW(), NOW()),
(6, 'Chalet Renovado Ecológico', 950000, 'Urbanización Verde 8, Valencia', 5, 4, 350, 'https://example.com/image6.jpg', 'B', '[\"Biomasa\", \"Solar\"]', '[\"Madera\", \"Ladrillo reciclado\"]', 16, 58, 'Chalet completamente rehabilitado con criterios de máxima eficiencia energética.', '[\"Caldera Biomasa\", \"Solar Fotovoltaica 8kW\", \"Aislamiento Premium\", \"Jardín Xerófito\"]', '{\"materials\": {\"certifiedWood\": true, \"ecologicalPaints\": true}, \"energySources\": {\"aerothermal\": false, \"solarPanels\": true}, \"waterConsumption\": {\"rainwaterRecovery\": true}, \"thermalInsulation\": {\"sateSystem\": true, \"climalitWindows\": true}}', '[\"BREEAM Good\"]', 0, NOW(), NOW());

-- Artículos
INSERT INTO `articles` (`id`, `title`, `excerpt`, `category`, `date`, `image`, `content`, `hidden`) VALUES
(1, 'Cómo reducir tu factura de luz hasta un 60% con energía solar', 'Descubre las claves para maximizar el ahorro en tu factura eléctrica mediante la instalación de paneles solares y sistemas de autoconsumo.', 'Estilos de vida', '2026-01-15', 'https://example.com/article1.jpg', 'Contenido completo del artículo...', 0),
(2, 'Subvenciones Next Generation para rehabilitación energética 2026', 'Guía completa sobre las ayudas disponibles para mejorar la eficiencia energética de tu vivienda con fondos europeos.', 'Subvenciones', '2026-01-10', 'https://example.com/article2.jpg', 'Contenido completo del artículo...', 0),
(3, 'ODS 11: Ciudades sostenibles y el futuro de la vivienda', 'Exploramos cómo las viviendas sostenibles contribuyen a los Objetivos de Desarrollo Sostenible de la ONU.', 'Agenda 2030', '2026-01-05', 'https://example.com/article3.jpg', 'Contenido completo del artículo...', 0),
(4, 'Domótica verde: ahorra agua y energía inteligentemente', 'Las últimas tecnologías en domótica que te ayudan a reducir el consumo de recursos en tu hogar de forma automática.', 'Estilos de vida', '2025-12-28', 'https://example.com/article4.jpg', 'Contenido completo del artículo...', 0),
(5, 'Ayudas para instalación de paneles solares en Valencia', 'Todo lo que necesitas saber sobre las subvenciones autonómicas y municipales para energía solar en la Comunidad Valenciana.', 'Subvenciones', '2025-12-20', 'https://example.com/article5.jpg', 'Contenido completo del artículo...', 0),
(6, 'Calefacción eficiente: aerotermia vs biomasa', 'Comparativa completa de sistemas de calefacción sostenibles para ayudarte a elegir la mejor opción para tu hogar.', 'Estilos de vida', '2025-12-15', 'https://example.com/article6.jpg', 'Contenido completo del artículo...', 0);

COMMIT;
