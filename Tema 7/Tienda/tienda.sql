USE tienda;
CREATE TABLE tienda.producto (
    cod INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT NULL,
    precio DECIMAL(10,2) NOT NULL,
    imagen longblob NULL
);