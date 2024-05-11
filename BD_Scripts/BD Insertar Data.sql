USE BDMARKET;

-- Empleados
INSERT INTO Empleado (nombre, cargo, salario, fecha_contratacion) VALUES
('Juan Perez', 'Vendedor', 2000.00, '2023-01-15'),
('María García', 'Cajero', 1800.00, '2023-02-20'),
('Luis Martínez', 'Gerente de Tienda', 3000.00, '2022-12-10');

-- Clientes
-- Lote 1:
INSERT INTO Cliente (nombre, numruc, direccion, telefono) VALUES
('Ana Rodriguez', '12345678901', 'Calle 123, Ciudad', '555-1234'),
('Pedro Sánchez', '98765432109', 'Av. Principal, Pueblo', '555-5678'),
('Laura Gómez', '45678901234', 'Carrera 45, Villa', '555-9012');
-- Lote 2:
INSERT INTO Cliente (nombre, numruc, direccion, telefono) VALUES
('ACS Industria Metal Mecanica E.I.R.L.','20458127400','LIMA','999888101'),
('Aquiles Marcelino Aguilar Zacarías','10161204396','LIMA','999888102'),
('Atlas Motos E.I.R.LTDA.','20406502377','PUNO','999888103'),
('Carrocerias Integradas S.A. - CAISA','20331634281','LIMA','999888104'),
('Carrocerias San Luis E.I.R.L.','20102259735','LIMA','999888105'),
('Cesar Augusto Garcia Salazar','10165286371','LIMA','999888106'),
('Company Businesses S.A.C.','20516333694','CALLAO','999888107'),
('Compañia Industrial de Carrocerias S.A.C.','20538154564','LIMA','999888108'),
('Compañia Peruana de Remolques S.A.','20135468941','CALLAO','999888109'),
('Consermet S.A.C.','20481405999','LA LIBERTAD','999888110'),
('Corporacion Cayman S.A.C.','20493190611','LORETO','999888111'),
('Corporación Metálica del Acero S.A.C.','20513855941','CALLAO','999888112'),
('Corporacion WRT S.A.C. - WRT S.A.C.','20536160206','LIMA','999888113'),
('DC Expres S.A.C.','20600465377','LA LIBERTAD','999888114'),
('Deco Hogar E.I.R.L.','20527721173','MADRE DE DIOS','999888115'),
('Ecoenergy S.A.C.','20393530244','UCAYALI','999888116'),
('EHF S.A.C.','20600040562','LIMA','999888117'),
('Estructuras Metalicas Olmedo E.I.R.L.','20261624916','LIMA','999888118'),
('Semiremolques y Maquinarias E.I.R.L.','20600220668','LIMA','999888119'),
('Fabricacion y Servicios Multiples Uceda S.A.C.','20481952965','LA LIBERTAD','999888120'),
('Marquez Machado E.I.R.L. - Fab. y Serv. R.M. y M. E.I.R.L.','20454151713','AREQUIPA','999888121'),
('Fabricaciones Alcantara E.I.R.L.','20458841714','LIMA','999888122'),
('Fabricaciones Bra S.A.C.','20477313214','LA LIBERTAD','999888123'),
('Fabricaciones Metalicas Arnold S.A.C.','20477664513','LA LIBERTAD','999888124'),
('Fabricaciones Metalicas Carranza S.A.C. FAMECA S.A.C.','20132108294','LA LIBERTAD','999888125'),
('Fabricaciones Metalicas Lujan S.A.C','20481066680','LA LIBERTAD','999888126'),
('Fabricaciones Metalicas y Servicios Diesel S.A.C - FAMEDI S.A.C.','20505769148','LIMA','999888127'),
('Fabricaciones Montoya S.R.L.','20531544090','SAN MARTIN','999888128'),
('Fabrimetal S.A.C.','20101633820','LIMA','999888129'),
('Facamesur E.I.R.L.','20218677640','AREQUIPA','999888130');
-- Lote 3:
INSERT INTO Cliente (nombre, numruc, direccion, telefono) VALUES
('Factoria Antonio Pinto S.A.','20100070465','LIMA','999888131'),
('Factoria Barboza S.R.L.','20486029839','JUNIN','999888132'),
('Factoria Facjoca S.A.C.','20454650043','AREQUIPA','999888133'),
('Factoria Felisur E.I.R.L.','20454773986','AREQUIPA','999888134'),
('Factoria J.C. E.I.R.L.','20453910513','AREQUIPA','999888135'),
('Factoria Metal Choque E.I.R.L.','20498433210','AREQUIPA','999888136'),
('Factoria Peter Bill Intex S.R.L.','20454114354','AREQUIPA','999888137'),
('Factoria Talleres Orion E.I.R.L.','20454289154','AREQUIPA','999888138'),
('Factoria y Distribuciones San Jorge E.I.R.L.','20455782598','AREQUIPA','999888139'),
('Mecanica e Industria S.R.L. - Facsemin','20453947352','AREQUIPA','999888140'),
('Factory Multiservicios MAG S.R.L.','20601745641','PUNO','999888141'),
('Fama Andina S.A.C.','20524006945','LA LIBERTAD','999888142'),
('Fasepa Factoria Señor de Pampacucho E.I.R.L.','20498631011','AREQUIPA','999888143'),
('Grupo C & R Veloz S.A.C.','20551034021','LIMA','999888144'),
('Grupo Sermet S.A.C.','20549685316','CALLAO','999888145'),
('Halcon S.A.','20354180911','LA LIBERTAD','999888146'),
('Honda Selva del Peru S.A','20493508645','LORETO','999888147'),
('Ibimco Peru S.A.C.','20522599591','LIMA','999888148'),
('Industria Carrocera del Peru S.A.C. - Incaper','20519105676','LIMA','999888149'),
('Industria Metalica Bullon S.A.C.','20514745031','LIMA','999888150'),
('Industrias Metalicas El Rafa E.I.R.L.','20393095301','UCAYALI','999888151'),
('Industrial Union S.R.L.','20527080445','CUSCO','999888152'),
('Industrias Rodos S.R.L.','20302083747','LIMA','999888153'),
('Industrias Ancalayo S.A.C.','20568135271','JUNIN','999888154'),
('Industrias Firme E.I.R.L.','20526949065','CUSCO','999888155'),
('Industrias Mecanicas del Sur S.A.C.','20519775132','TACNA','999888156'),
('Industrias Metalicas Alyer S.R.L.','20302830828','LIMA','999888157'),
('Industrias Metalicas Arequipa S.A.C.','20498196927','AREQUIPA','999888158'),
('Industrias Tricar S.A.C.','20393063956','UCAYALI','999888159'),
('Inka Traylers S.R.L.','20473646804','LIMA','999888160'),
('J & K Indubarza E.I.R.L.','20601849519','JUNIN','999888161'),
('J & S Automotriz Asociados E.I.R.L.','20601333342','MADRE DE DIOS','999888162'),
('J.K.F. Motos Peru S.A.C.','20447884624','PUNO','999888163'),
('JR Group Industrias S.A.C.','20430948076','LIMA','999888164'),
('Juan Salvatierra Condezo','10070728996','LIMA','999888165'),
('L & S Nassi S.A.C.','20481103399','LA LIBERTAD','999888166'),
('Lima Traylers S.A.C.','20504082564','LIMA','999888167'),
('LQ Trading Import Export S.A.C.','20468450217','LIMA','999888168'),
('Manuel Augusto Rocha Diaz E.I.R.L.','20531350309','SAN MARTIN','999888169'),
('Metallum S.A.C.','20481782199','LA LIBERTAD','999888170'),
('Motores Diesel Andinos S.A. - Modasa','20417926632','LIMA','999888171'),
('Motores Latinoamericanos S.A.C.','20393292041','UCAYALI','999888172'),
('Motos Stilos S.A.C.','20507099069','LIMA','999888173'),
('Motoservicios Los Olivos S.R.L.','20295008190','LIMA','999888174'),
('Planta Industrial Chemoto S.A.C.','20529722304','LAMBAYEQUE','999888175'),
('Profesionales Coseca S.A.C.','20510485557','LIMA','999888176'),
('Puma Motors E.I.R.L.','20454074115','AREQUIPA','999888177'),
('Rajunsa S.A.C.','20522969193','CALLAO','999888178'),
('Remolques Tramontana S.A.C.','20514038199','LIMA','999888179'),
('Tanques Cisternas Afines E.I.R.L. - Reconcisa','20486064235','JUNIN','999888180'),
('Rissing Motors S.A.C.','20544431022','LIMA','999888181'),
('RMB Sateci S.A.C.','20508596732','LIMA','999888182'),
('Ronco Motorss S.A.C.','20510421583','LIMA','999888183'),
('Rosita Industrias Metalicas E.I.R.L.','20393056232','UCAYALI','999888184'),
('Royal Proyectos y Servicios Industriales S.A.C.','20504044123','LIMA','999888185'),
('Fabricaciones Señor de Huanca E.I.R.L. - Semaflash E.I.R.L.','20453885578','AREQUIPA','999888186'),
('Servicios Ingenieria Electromecanica S.A.C. - Sielsac','20480028971','LAMBAYEQUE','999888187'),
('Sgm Ingenieros E.I.R.L.','20498476539','AREQUIPA','999888188'),
('Shimba Selva S.A.C.','20394031292','UCAYALI','999888189'),
('Tracto Camiones USA S.A.C.','20293774308','LIMA','999888190'),
('Trans Oil Bunker S.A.C.','20515738461','LIMA','999888191'),
('Transvisa E.I.R.L.','20131173734','LIMA PROVINCIAS','999888192'),
('Tricar Tecnologia S.A.C.','20513769351','LIMA','999888193'),
('VF Motoparts S.R.LTDA.','20341019819','LIMA','999888194'),
('Vramel Contratistas E.I.R.L.','20329847978','CALLAO','999888195'),
('Zeus Peru S.A.C','20545029406','LIMA','999888196'),
('Zinsac del Peru S.A.C.','20556578746','LIMA','999888197');

-- Categorias
INSERT INTO Categoria (nombre)
VALUES
('BEBIDAS'), -- 1
('CONDIMENTOS'), -- 2
('FRUTAS/VERDURAS'), -- 3
('CARNES'), -- 4
('PESCADO/MARISCO'), -- 5
('LACTEOS'), -- 6
('REPOSTERIA'), -- 7
('GRANOS/CEREALES'); -- 8

-- Productos
-- Lote 1:
INSERT INTO Producto (descripcion, categoria_id, precio, stock) VALUES
('Coca-Cola 2L', 1, 7.50, 100),
('Sal de mesa', 2, 1.20, 200),
('Manzanas Granny Smith (kg)', 3, 3.00, 50),
('Filete de carne de res (kg)', 4, 10.50, 30),
('Filete de salmón (kg)', 5, 5.00, 20),
('Leche entera 1L', 6, 4.80, 150),
('Pastel de chocolate', 7, 32.00, 10),
('Arroz blanco (1kg)', 8, 11.50, 80);
-- Lote 2:
INSERT INTO Producto (descripcion, categoria_id, precio, stock) VALUES
('Te Dharamsala', 1, 18, 100),
('Cerveza Tibetana Barley', 1, 19, 30),
('Sirope de Regaliz', 2, 10, 16),
('Especias Cajun del Chef Anton', 2, 22, 23),
('Mezcla Gumbo del Chef Anton', 2, 21.35, 11),
('Mermelada de Grosellas de la Abuela', 2, 25, 13),
('Peras secas organicas del Tio Bob', 3, 30, 9),
('Salsa de Arandanos Northwoods', 2, 40, 5),
('Buey Mishi Kobe', 4, 97, 3),
('Pez Espada', 5, 31, 2),
('Queso Cabrales', 6, 21, 11),
('Queso Manchego La Pastora', 6, 38, 19),
('Algas Konbu', 5, 6, 13),
('Cuajada de judias', 3, 23.25, 7),
('Salsa de soja baja en Sodio', 2, 15.5, 17),
('Postre de Merengue Pavlova', 7, 17.45, 2),
('Cordero Alice Springs', 4, 39, 2),
('Langostinos Tigre Carnarvon', 5, 62.5, 3),
('Pastas de té de Chocolate', 7, 9.2, 5),
('Mermelada de Sir Rodneys', 7, 81, 8),
('Bollos de Sir Rodneys', 7, 10, 14);
-- Lote 3:
INSERT INTO Producto (descripcion, categoria_id, precio, stock) VALUES
('Pan de centeno crujiente estilo Gustafs', 8, 21, 50),
('Pan fino', 8, 9, 100),
('Refresco guarana fantastica', 1, 4.5, 200),
('Crema de chocolate y nueces Nunuca', 7, 14, 80),
('Ositos de goma Gumbär', 7, 31.23, 150),
('Chocolate Schoggi', 7, 43.9, 120),
('Col fermentada Rössle', 3, 45.6, 70),
('Salchicha Thüringer', 4, 123.79, 40),
('Arenque blanco del noroeste', 5, 25.89, 60),
('Queso Gorgonzola Telino', 6, 12.5, 90),
('Queso Mascarpone Fabioli', 6, 32, 110),
('Queso de cabra', 6, 2.5, 30),
('Cerveza Sasquatch', 1, 14, 80),
('Cerveza negra Steeleye', 1, 18, 60),
('Escabeche de arenque', 5, 19, 100),
('Salmón ahumado gravad', 5, 26, 70),
('Vino Côte de Blaye', 1, 263.5, 20),
('Licor verde Chartreuse', 1, 18, 50),
('Carne de cangrejo de Boston', 5, 18.4, 40),
('Crema de almejas estilo Nueva Inglaterra', 5, 9.65, 90),
('Tallarines de Singapur', 8, 14, 120);
-- Lote 4:
INSERT INTO Producto (descripcion, categoria_id, precio, stock) VALUES
('Café de Malasia', 1, 46, 80),
('Azúcar negra Malacca', 2, 19.45, 100),
('Arenque ahumado', 5, 9.5, 60),
('Arenque salado', 5, 12, 70),
('Galletas Zaanse', 7, 9.5, 90),
('Chocolate holandés', 7, 12.75, 110),
('Regaliz', 7, 20, 80),
('Chocolate blanco', 7, 16.25, 120),
('Manzanas secas Manjimup', 3, 53, 40),
('Cereales para filo', 8, 7, 150),
('Empanada de carne', 4, 32.8, 30),
('Empanada de cerdo', 4, 7.45, 50),
('Pate chino', 4, 24, 40),
('Gnocchi de la abuela Alicia', 8, 38, 60),
('Raviolis Angelo', 8, 19.5, 80),
('Caracoles de Borgoña', 5, 13.25, 70),
('Raclet de queso Courdavault', 6, 55, 20),
('Camembert Pierrot', 6, 34, 30),
('Sirope de arce', 2, 28.5, 40),
('Tarta de azúcar', 7, 49.3, 20),
('Sándwich de vegetales', 2, 43.9, 30);
-- Lote 5:
INSERT INTO Producto (descripcion, categoria_id, precio, stock) VALUES
('Bollos de pan de Wimmer', 8, 33.25, 50),
('Salsa de pimiento picante de Luisiana', 2, 21.05, 100),
('Especias picantes de Luisiana', 2, 17, 80),
('Cerveza Laughing Lumberjack', 1, 14, 120),
('Barras de pan de Escocia', 7, 12.5, 150),
('Queso Gudbrandsdals', 6, 36, 90),
('Cerveza Outback', 1, 15, 110),
('Crema de queso Fltemys', 6, 21.5, 70),
('Queso Mozzarella Giovanni', 6, 34.8, 80),
('Caviar Rojo', 5, 15, 60),
('Queso de soja Longlife', 3, 10, 40),
('Cerveza Klosterbier', 1, 7.75, 100),
('Licor Cloudberry', 1, 18, 70),
('Salsa verde original Frankfurter', 2, 13, 90);

-- Venta
INSERT INTO Venta (cliente_id, empleado_id, fecha_venta) VALUES
(1, 1, '2024-04-25'),
(2, 2, '2024-04-25'),
(3, 3, '2024-04-24');

-- Detalle_Venta
INSERT INTO Detalle_Venta (venta_id, producto_id, cantidad) VALUES
(1, 1, 3),
(1, 3, 2),
(1, 6, 1),
(2, 4, 5),
(2, 8, 3),
(3, 2, 5);
