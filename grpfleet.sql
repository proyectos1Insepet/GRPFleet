CREATE TABLE transaccion(
	tipo INT PRIMARY KEY,
	descripcion VARCHAR (50)
	);

CREATE TABLE producto(
	id_producto SERIAL PRIMARY KEY,
	descripcion VARCHAR (50)
	);


CREATE TABLE cuenta(
	id_cliente SERIAL PRIMARY KEY,
	estado_cuenta boolean DEFAULT false,/*true cuenta activa*/
	nombre VARCHAR (255),
	tax_number VARCHAR (50),
	direccion VARCHAR(255),
	telefono VARCHAR (30),
	ciudad VARCHAR (50),
	provincia VARCHAR (50),
	tipo_transaccion INT references transaccion(tipo), 
	saldo FLOAT
	);
	

	
CREATE TABLE vehiculo(
	id_cliente SERIAL references cuenta(id_cliente),
	id_vehiculo SERIAL PRIMARY KEY,
	placa VARCHAR (20),
	serial VARCHAR (20) UNIQUE NOT NULL,
	tanque FLOAT,
	estado_bloqueo boolean DEFAULT false, /* true = vehiculo activo */ 
	marca VARCHAR (100)
	);
	 
CREATE TABLE restricciones(
	id_vehiculo SERIAL references vehiculo (id_vehiculo) UNIQUE,
	id_producto INT references producto (id_producto),
	visitaDia INT,
	visitaSemana INT,
	visitaMes INT,
	volVisitaDia FLOAT DEFAULT 0.0,
	volVisitaSemana FLOAT DEFAULT 0.0,
	volVisitaMes FLOAT DEFAULT 0.0,
	dinVisitaDia FLOAT DEFAULT 0.0,
	dinVisitaSemana FLOAT DEFAULT 0.0,
	dinVisitaMes FLOAT DEFAULT 0.0
	);

CREATE TABLE recibo(
        logo   VARCHAR (25),
	linea1 VARCHAR(255),
	linea2 VARCHAR(255),
	id_tax VARCHAR (30),
	tel    VARCHAR (20),
	dir    VARCHAR (255),
	vol    VARCHAR  (4),
	moneda VARCHAR  (4),
	footer VARCHAR (255) 	
	);
	
CREATE TABLE venta(
	id SERIAL PRIMARY KEY,
	id_cliente SERIAL references cuenta(id_cliente),
	fecha VARCHAR (255),
	tipo_transaccion INT references transaccion (tipo),
	dinero FLOAT,
	volumen FLOAT	
	);
	
CREATE TABLE mangueras(
	man1 INT,
	man2 INT,
	man3 INT
	);

CREATE TABLE corte(
	Pk_id_corte SERIAL PRIMARY KEY ,
	ultima_venta INT,
	t_electronico INT,
	volVentaT FLOAT,
	t_electronico2 INT,
	volVentaT2 FLOAT,
	t_electronico3 INT,
	volVentaT3 FLOAT
	);

CREATE TABLE venta_detalle(
	Fk_id SERIAL references venta (id),
	placa VARCHAR (20),
	km VARCHAR (30),
	Fk_id_producto INT references producto (id_producto),
	precio FLOAT,
	cara INT,
	manguera INT,
	Fk_id_corte SERIAL references corte (Pk_id_corte),
	dinero FLOAT,
	volumen FLOAT
	);
	
CREATE TABLE usuario(
	Pk_id_user SERIAL PRIMARY KEY ,
	usuario VARCHAR(20),
	pass VARCHAR(255)
	);

CREATE TABLE configuracion(
	mangueras INT,
	mangueras2 INT,
	p1 INT,
	p2 INT,
	p3 INT,
	p1b INT,
	p2b INT,
	p3b INT,
	versionS INT,
	dDinero INT,
	dVolumen INT,
	ppux10 INT,	
	solkm INT,
	efectivo INT,
	pantallas INT
);
