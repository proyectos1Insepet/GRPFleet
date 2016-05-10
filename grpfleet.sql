CREATE TABLE transaccion(
	tipo INT PRIMARY KEY,
	descripcion VARCHAR (50)
	);

CREATE TABLE producto(
	id_producto INT PRIMARY KEY,
	descripcion VARCHAR (50)
	);


CREATE TABLE cuenta(
	id_cliente SERIAL PRIMARY KEY,
	estado_cuenta boolean DEFAULT false,
	nombre VARCHAR (255),
	tax_number VARCHAR (50),
	direccion VARCHAR(255),
	telefono VARCHAR (30),
	ciudad VARCHAR (50),
	provincia VARCHAR (50),
	tipo_transaccion INT references transaccion(tipo), 
	saldo INT
	);
	

	
CREATE TABLE vehiculo(
	id_cliente SERIAL references cuenta(id_cliente),
	id_vehiculo SERIAL,
	placa VARCHAR (20) PRIMARY KEY,
	serial VARCHAR (20),
	tanque FLOAT,
	estado_bloqueo BOOLEAN DEFAULT true,
	marca VARCHAR (100)
	);
	
	