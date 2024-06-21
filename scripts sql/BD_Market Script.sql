-- Crear la base de datos BD_Market
CREATE DATABASE BD_Market;

-- Usar la base de datos BD_Market
USE BD_Market;

-- Crear tabla CLIENTE
CREATE TABLE CLIENTE (
    ID_Cliente INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    NumRuc VARCHAR(12),
    Direccion VARCHAR(100),
    Telefono VARCHAR(20)
);

-- Crear tabla VENTA
CREATE TABLE VENTA (
    ID_Venta INT AUTO_INCREMENT PRIMARY KEY,
    Cliente_ID INT,
    Fecha DATETIME NOT NULL,
    FOREIGN KEY (Cliente_ID) REFERENCES CLIENTE(ID_Cliente) ON DELETE SET NULL
);

-- Crear tabla CATEGORIA
CREATE TABLE CATEGORIA (
    ID_Categoria INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL
);

-- Crear tabla PRODUCTO
CREATE TABLE PRODUCTO (
    ID_Producto INT AUTO_INCREMENT PRIMARY KEY,
    Codigo_inventario VARCHAR(12),
    Descripcion VARCHAR(100) NOT NULL,
    Categoria_ID INT,
    Precio DECIMAL(11,2) NOT NULL,
    Stock INT DEFAULT 0 CHECK (Stock >= 0),
    FOREIGN KEY (Categoria_ID) REFERENCES CATEGORIA(ID_Categoria) ON DELETE SET NULL
);

-- Crear tabla DETALLE
CREATE TABLE DETALLE (
    Venta_ID INT NOT NULL,
    Producto_ID INT NOT NULL,
    PrecioUnitario DECIMAL(11,2) NOT NULL,
    Cantidad INT CHECK (Cantidad > 0),
    PRIMARY KEY (Venta_ID, Producto_ID),
    FOREIGN KEY (Venta_ID) REFERENCES VENTA(ID_Venta) ON DELETE CASCADE,
    FOREIGN KEY (Producto_ID) REFERENCES PRODUCTO(ID_Producto) ON DELETE CASCADE
);