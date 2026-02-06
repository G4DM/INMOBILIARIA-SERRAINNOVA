-- 1. Crear la base de datos (opcional, si no existe)
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

-- 3. Tabla PROPIEDAD
CREATE TABLE PROPIEDAD (
    id_prop INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(50) NOT NULL, 
    m2 DECIMAL(10, 2),
    estado VARCHAR(50), 
    n_hab INT, 
    n_banos INT, 
    precio DECIMAL(15, 2),
    ciudad VARCHAR(100),
    direcc VARCHAR(255),
    garaje BOOLEAN DEFAULT FALSE,   
    ascensor BOOLEAN DEFAULT FALSE, 
    f_pub DATE 
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
        REFERENCES PROPIEDAD(id_prop) ON DELETE CASCADE
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

-- 6. Tabla IMAGEN
CREATE TABLE IMAGEN (
    id_img INT AUTO_INCREMENT PRIMARY KEY,
    ruta VARCHAR(255) NOT NULL, 
    dscr TEXT, 
    id_prop INT, 
    id_art INT,  
    
    CONSTRAINT fk_imagen_propiedad FOREIGN KEY (id_prop) 
        REFERENCES PROPIEDAD(id_prop) ON DELETE CASCADE,
    CONSTRAINT fk_imagen_articulo FOREIGN KEY (id_art) 
        REFERENCES ARTICULO(id_art) ON DELETE CASCADE,

   
);