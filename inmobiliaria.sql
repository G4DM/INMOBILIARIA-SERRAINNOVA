-- 1. Crear la base de datos
CREATE DATABASE IF NOT EXISTS inmobiliaria_db;
USE inmobiliaria_db;

-- 2. Tabla USUARIO
CREATE TABLE USUARIO (
    id_usr INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    passw VARCHAR(255) NOT NULL, 
    telefono VARCHAR(20),
    rol VARCHAR(50) 
);

-- 3. Tabla PROPIEDAD (Actualizada con los nuevos atributos)
CREATE TABLE PROPIEDAD (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    title VARCHAR(255) NOT NULL,
    price DECIMAL(15, 2), -- Guardamos precio como número para poder ordenar/filtrar
    location VARCHAR(255),
    bedrooms INT,
    bathrooms INT,
    area DECIMAL(10, 2),
    image VARCHAR(512), -- URL de la imagen principal
    energyCertification VARCHAR(10),
    -- Los siguientes campos son Arrays o Objetos, usamos JSON
    energyType JSON,            -- ["Solar", "Aerotermia"]
    materials JSON,             -- ["Madera", "Hormigón..."]
    
    co2Emissions DECIMAL(10, 2),
    co2Savings DECIMAL(10, 2),
    description TEXT,
    
    features JSON,              -- ["Paneles Solares", ...]
    sustainabilityChecklist JSON, -- El objeto complejo con booleanos
    certifications JSON         -- ["Passivhaus", "LEED Gold"]
);

-- 4. Tabla OPERACION
CREATE TABLE OPERACION (
    id_opr INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(50) NOT NULL, 
    id_usr INT NOT NULL,
    id_prop INT NOT NULL,
    CONSTRAINT fk_operacion_usuario FOREIGN KEY (id_usr) 
        REFERENCES USUARIO(id_usr) ON DELETE CASCADE,
    CONSTRAINT fk_operacion_propiedad FOREIGN KEY (id_prop) 
        REFERENCES PROPIEDAD(id) ON DELETE CASCADE
);

-- 5. Tabla ARTICULO
CREATE TABLE ARTICULO (
    id_art INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200) NOT NULL,
    contenido TEXT,
    estado VARCHAR(50), 
    f_pub DATE,
    id_usr INT NOT NULL,
    CONSTRAINT fk_articulo_usuario FOREIGN KEY (id_usr) 
        REFERENCES USUARIO(id_usr) ON DELETE SET NULL
);

-- 6. Tabla IMAGEN (Galería adicional)
CREATE TABLE IMAGEN (
    id_img INT AUTO_INCREMENT PRIMARY KEY,
    ruta VARCHAR(255) NOT NULL, 
    dscr TEXT, 
    id_prop INT, 
    id_art INT,  
    
    CONSTRAINT fk_imagen_propiedad FOREIGN KEY (id_prop) 
        REFERENCES PROPIEDAD(id) ON DELETE CASCADE,
    CONSTRAINT fk_imagen_articulo FOREIGN KEY (id_art) 
        REFERENCES ARTICULO(id_art) ON DELETE CASCADE
);
