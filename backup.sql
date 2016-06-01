--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'SQL_ASCII';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: corte; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE corte (
    pk_id_corte integer NOT NULL,
    ultima_venta integer,
    t_electronico integer,
    volventat double precision,
    t_electronico2 integer,
    volventat2 double precision,
    t_electronico3 integer,
    volventat3 double precision
);


ALTER TABLE public.corte OWNER TO postgres;

--
-- Name: corte_pk_id_corte_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE corte_pk_id_corte_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.corte_pk_id_corte_seq OWNER TO postgres;

--
-- Name: corte_pk_id_corte_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE corte_pk_id_corte_seq OWNED BY corte.pk_id_corte;


--
-- Name: cuenta; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cuenta (
    id_cliente integer NOT NULL,
    estado_cuenta boolean DEFAULT false,
    nombre character varying(255),
    tax_number character varying(50),
    direccion character varying(255),
    telefono character varying(30),
    ciudad character varying(50),
    provincia character varying(50),
    tipo_transaccion integer,
    saldo double precision
);


ALTER TABLE public.cuenta OWNER TO postgres;

--
-- Name: cuenta_id_cliente_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cuenta_id_cliente_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cuenta_id_cliente_seq OWNER TO postgres;

--
-- Name: cuenta_id_cliente_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cuenta_id_cliente_seq OWNED BY cuenta.id_cliente;


--
-- Name: mangueras; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE mangueras (
    man1 integer,
    man2 integer,
    man3 integer
);


ALTER TABLE public.mangueras OWNER TO postgres;

--
-- Name: producto; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE producto (
    id_producto integer NOT NULL,
    descripcion character varying(50)
);


ALTER TABLE public.producto OWNER TO postgres;

--
-- Name: recibo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE recibo (
    linea1 character varying(255),
    linea2 character varying(255),
    id_tax character varying(30),
    tel character varying(20),
    dir character varying(255),
    vol character varying(4),
    moneda character varying(4),
    footer character varying(255),
    logo character varying(25)
);


ALTER TABLE public.recibo OWNER TO postgres;

--
-- Name: restricciones; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE restricciones (
    id_vehiculo integer NOT NULL,
    id_producto integer,
    visitadia integer,
    visitasemana integer,
    visitames integer,
    volvisitadia double precision DEFAULT 0.0,
    volvisitasemana double precision DEFAULT 0.0,
    volvisitames double precision DEFAULT 0.0,
    dinvisitadia double precision DEFAULT 0.0,
    dinvisitasemana double precision DEFAULT 0.0,
    dinvisitames double precision DEFAULT 0.0
);


ALTER TABLE public.restricciones OWNER TO postgres;

--
-- Name: restricciones_id_vehiculo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE restricciones_id_vehiculo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.restricciones_id_vehiculo_seq OWNER TO postgres;

--
-- Name: restricciones_id_vehiculo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE restricciones_id_vehiculo_seq OWNED BY restricciones.id_vehiculo;


--
-- Name: transaccion; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE transaccion (
    tipo integer NOT NULL,
    descripcion character varying(50)
);


ALTER TABLE public.transaccion OWNER TO postgres;

--
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE usuario (
    pk_id_user integer NOT NULL,
    usuario character varying(20),
    pass character varying(255)
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- Name: usuario_pk_id_user_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE usuario_pk_id_user_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_pk_id_user_seq OWNER TO postgres;

--
-- Name: usuario_pk_id_user_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE usuario_pk_id_user_seq OWNED BY usuario.pk_id_user;


--
-- Name: vehiculo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE vehiculo (
    id_cliente integer NOT NULL,
    id_vehiculo integer NOT NULL,
    placa character varying(20),
    serial character varying(20) NOT NULL,
    tanque double precision,
    estado_bloqueo boolean DEFAULT false,
    marca character varying(100)
);


ALTER TABLE public.vehiculo OWNER TO postgres;

--
-- Name: vehiculo_id_cliente_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE vehiculo_id_cliente_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.vehiculo_id_cliente_seq OWNER TO postgres;

--
-- Name: vehiculo_id_cliente_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE vehiculo_id_cliente_seq OWNED BY vehiculo.id_cliente;


--
-- Name: vehiculo_id_vehiculo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE vehiculo_id_vehiculo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.vehiculo_id_vehiculo_seq OWNER TO postgres;

--
-- Name: vehiculo_id_vehiculo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE vehiculo_id_vehiculo_seq OWNED BY vehiculo.id_vehiculo;


--
-- Name: venta; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE venta (
    id integer NOT NULL,
    id_cliente integer NOT NULL,
    fecha character varying(255),
    tipo_transaccion integer,
    dinero double precision,
    volumen double precision
);


ALTER TABLE public.venta OWNER TO postgres;

--
-- Name: venta_detalle; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE venta_detalle (
    fk_id integer NOT NULL,
    placa character varying(20),
    km character varying(30),
    fk_id_producto integer,
    precio double precision,
    cara integer,
    manguera integer,
    fk_id_corte integer NOT NULL,
    dinero double precision,
    volumen double precision
);


ALTER TABLE public.venta_detalle OWNER TO postgres;

--
-- Name: venta_detalle_fk_id_corte_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE venta_detalle_fk_id_corte_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.venta_detalle_fk_id_corte_seq OWNER TO postgres;

--
-- Name: venta_detalle_fk_id_corte_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE venta_detalle_fk_id_corte_seq OWNED BY venta_detalle.fk_id_corte;


--
-- Name: venta_detalle_fk_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE venta_detalle_fk_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.venta_detalle_fk_id_seq OWNER TO postgres;

--
-- Name: venta_detalle_fk_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE venta_detalle_fk_id_seq OWNED BY venta_detalle.fk_id;


--
-- Name: venta_id_cliente_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE venta_id_cliente_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.venta_id_cliente_seq OWNER TO postgres;

--
-- Name: venta_id_cliente_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE venta_id_cliente_seq OWNED BY venta.id_cliente;


--
-- Name: venta_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE venta_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.venta_id_seq OWNER TO postgres;

--
-- Name: venta_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE venta_id_seq OWNED BY venta.id;


--
-- Name: pk_id_corte; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY corte ALTER COLUMN pk_id_corte SET DEFAULT nextval('corte_pk_id_corte_seq'::regclass);


--
-- Name: id_cliente; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cuenta ALTER COLUMN id_cliente SET DEFAULT nextval('cuenta_id_cliente_seq'::regclass);


--
-- Name: id_vehiculo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY restricciones ALTER COLUMN id_vehiculo SET DEFAULT nextval('restricciones_id_vehiculo_seq'::regclass);


--
-- Name: pk_id_user; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuario ALTER COLUMN pk_id_user SET DEFAULT nextval('usuario_pk_id_user_seq'::regclass);


--
-- Name: id_cliente; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY vehiculo ALTER COLUMN id_cliente SET DEFAULT nextval('vehiculo_id_cliente_seq'::regclass);


--
-- Name: id_vehiculo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY vehiculo ALTER COLUMN id_vehiculo SET DEFAULT nextval('vehiculo_id_vehiculo_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY venta ALTER COLUMN id SET DEFAULT nextval('venta_id_seq'::regclass);


--
-- Name: id_cliente; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY venta ALTER COLUMN id_cliente SET DEFAULT nextval('venta_id_cliente_seq'::regclass);


--
-- Name: fk_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY venta_detalle ALTER COLUMN fk_id SET DEFAULT nextval('venta_detalle_fk_id_seq'::regclass);


--
-- Name: fk_id_corte; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY venta_detalle ALTER COLUMN fk_id_corte SET DEFAULT nextval('venta_detalle_fk_id_corte_seq'::regclass);


--
-- Name: corte_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY corte
    ADD CONSTRAINT corte_pkey PRIMARY KEY (pk_id_corte);


--
-- Name: cuenta_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cuenta
    ADD CONSTRAINT cuenta_pkey PRIMARY KEY (id_cliente);


--
-- Name: producto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY producto
    ADD CONSTRAINT producto_pkey PRIMARY KEY (id_producto);


--
-- Name: restricciones_id_vehiculo_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY restricciones
    ADD CONSTRAINT restricciones_id_vehiculo_key UNIQUE (id_vehiculo);


--
-- Name: transaccion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY transaccion
    ADD CONSTRAINT transaccion_pkey PRIMARY KEY (tipo);


--
-- Name: usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (pk_id_user);


--
-- Name: vehiculo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY vehiculo
    ADD CONSTRAINT vehiculo_pkey PRIMARY KEY (id_vehiculo);


--
-- Name: vehiculo_serial_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY vehiculo
    ADD CONSTRAINT vehiculo_serial_key UNIQUE (serial);


--
-- Name: venta_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY venta
    ADD CONSTRAINT venta_pkey PRIMARY KEY (id);


--
-- Name: cuenta_tipo_transaccion_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cuenta
    ADD CONSTRAINT cuenta_tipo_transaccion_fkey FOREIGN KEY (tipo_transaccion) REFERENCES transaccion(tipo);


--
-- Name: restricciones_id_producto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY restricciones
    ADD CONSTRAINT restricciones_id_producto_fkey FOREIGN KEY (id_producto) REFERENCES producto(id_producto);


--
-- Name: restricciones_id_vehiculo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY restricciones
    ADD CONSTRAINT restricciones_id_vehiculo_fkey FOREIGN KEY (id_vehiculo) REFERENCES vehiculo(id_vehiculo);


--
-- Name: vehiculo_id_cliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY vehiculo
    ADD CONSTRAINT vehiculo_id_cliente_fkey FOREIGN KEY (id_cliente) REFERENCES cuenta(id_cliente);


--
-- Name: venta_detalle_fk_id_corte_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY venta_detalle
    ADD CONSTRAINT venta_detalle_fk_id_corte_fkey FOREIGN KEY (fk_id_corte) REFERENCES corte(pk_id_corte);


--
-- Name: venta_detalle_fk_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY venta_detalle
    ADD CONSTRAINT venta_detalle_fk_id_fkey FOREIGN KEY (fk_id) REFERENCES venta(id);


--
-- Name: venta_detalle_fk_id_producto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY venta_detalle
    ADD CONSTRAINT venta_detalle_fk_id_producto_fkey FOREIGN KEY (fk_id_producto) REFERENCES producto(id_producto);


--
-- Name: venta_id_cliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY venta
    ADD CONSTRAINT venta_id_cliente_fkey FOREIGN KEY (id_cliente) REFERENCES cuenta(id_cliente);


--
-- Name: venta_tipo_transaccion_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY venta
    ADD CONSTRAINT venta_tipo_transaccion_fkey FOREIGN KEY (tipo_transaccion) REFERENCES transaccion(tipo);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: corte; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE corte FROM PUBLIC;
REVOKE ALL ON TABLE corte FROM postgres;
GRANT ALL ON TABLE corte TO postgres;
GRANT ALL ON TABLE corte TO db_admin;


--
-- Name: corte_pk_id_corte_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE corte_pk_id_corte_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE corte_pk_id_corte_seq FROM postgres;
GRANT ALL ON SEQUENCE corte_pk_id_corte_seq TO postgres;
GRANT ALL ON SEQUENCE corte_pk_id_corte_seq TO db_admin;


--
-- Name: cuenta; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE cuenta FROM PUBLIC;
REVOKE ALL ON TABLE cuenta FROM postgres;
GRANT ALL ON TABLE cuenta TO postgres;
GRANT ALL ON TABLE cuenta TO db_admin;


--
-- Name: cuenta_id_cliente_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE cuenta_id_cliente_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE cuenta_id_cliente_seq FROM postgres;
GRANT ALL ON SEQUENCE cuenta_id_cliente_seq TO postgres;
GRANT ALL ON SEQUENCE cuenta_id_cliente_seq TO db_admin;


--
-- Name: mangueras; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE mangueras FROM PUBLIC;
REVOKE ALL ON TABLE mangueras FROM postgres;
GRANT ALL ON TABLE mangueras TO postgres;
GRANT ALL ON TABLE mangueras TO db_admin;


--
-- Name: producto; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE producto FROM PUBLIC;
REVOKE ALL ON TABLE producto FROM postgres;
GRANT ALL ON TABLE producto TO postgres;
GRANT ALL ON TABLE producto TO db_admin;


--
-- Name: recibo; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE recibo FROM PUBLIC;
REVOKE ALL ON TABLE recibo FROM postgres;
GRANT ALL ON TABLE recibo TO postgres;
GRANT ALL ON TABLE recibo TO db_admin;


--
-- Name: restricciones; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE restricciones FROM PUBLIC;
REVOKE ALL ON TABLE restricciones FROM postgres;
GRANT ALL ON TABLE restricciones TO postgres;
GRANT ALL ON TABLE restricciones TO db_admin;


--
-- Name: restricciones_id_vehiculo_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE restricciones_id_vehiculo_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE restricciones_id_vehiculo_seq FROM postgres;
GRANT ALL ON SEQUENCE restricciones_id_vehiculo_seq TO postgres;
GRANT ALL ON SEQUENCE restricciones_id_vehiculo_seq TO db_admin;


--
-- Name: transaccion; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE transaccion FROM PUBLIC;
REVOKE ALL ON TABLE transaccion FROM postgres;
GRANT ALL ON TABLE transaccion TO postgres;
GRANT ALL ON TABLE transaccion TO db_admin;


--
-- Name: usuario; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE usuario FROM PUBLIC;
REVOKE ALL ON TABLE usuario FROM postgres;
GRANT ALL ON TABLE usuario TO postgres;
GRANT ALL ON TABLE usuario TO db_admin;


--
-- Name: usuario_pk_id_user_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE usuario_pk_id_user_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE usuario_pk_id_user_seq FROM postgres;
GRANT ALL ON SEQUENCE usuario_pk_id_user_seq TO postgres;
GRANT ALL ON SEQUENCE usuario_pk_id_user_seq TO db_admin;


--
-- Name: vehiculo; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE vehiculo FROM PUBLIC;
REVOKE ALL ON TABLE vehiculo FROM postgres;
GRANT ALL ON TABLE vehiculo TO postgres;
GRANT ALL ON TABLE vehiculo TO db_admin;


--
-- Name: vehiculo_id_cliente_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE vehiculo_id_cliente_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE vehiculo_id_cliente_seq FROM postgres;
GRANT ALL ON SEQUENCE vehiculo_id_cliente_seq TO postgres;
GRANT ALL ON SEQUENCE vehiculo_id_cliente_seq TO db_admin;


--
-- Name: vehiculo_id_vehiculo_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE vehiculo_id_vehiculo_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE vehiculo_id_vehiculo_seq FROM postgres;
GRANT ALL ON SEQUENCE vehiculo_id_vehiculo_seq TO postgres;
GRANT ALL ON SEQUENCE vehiculo_id_vehiculo_seq TO db_admin;


--
-- Name: venta; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE venta FROM PUBLIC;
REVOKE ALL ON TABLE venta FROM postgres;
GRANT ALL ON TABLE venta TO postgres;
GRANT ALL ON TABLE venta TO db_admin;


--
-- Name: venta_detalle; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE venta_detalle FROM PUBLIC;
REVOKE ALL ON TABLE venta_detalle FROM postgres;
GRANT ALL ON TABLE venta_detalle TO postgres;
GRANT ALL ON TABLE venta_detalle TO db_admin;


--
-- Name: venta_detalle_fk_id_corte_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE venta_detalle_fk_id_corte_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE venta_detalle_fk_id_corte_seq FROM postgres;
GRANT ALL ON SEQUENCE venta_detalle_fk_id_corte_seq TO postgres;
GRANT ALL ON SEQUENCE venta_detalle_fk_id_corte_seq TO db_admin;


--
-- Name: venta_detalle_fk_id_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE venta_detalle_fk_id_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE venta_detalle_fk_id_seq FROM postgres;
GRANT ALL ON SEQUENCE venta_detalle_fk_id_seq TO postgres;
GRANT ALL ON SEQUENCE venta_detalle_fk_id_seq TO db_admin;


--
-- Name: venta_id_cliente_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE venta_id_cliente_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE venta_id_cliente_seq FROM postgres;
GRANT ALL ON SEQUENCE venta_id_cliente_seq TO postgres;
GRANT ALL ON SEQUENCE venta_id_cliente_seq TO db_admin;


--
-- Name: venta_id_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE venta_id_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE venta_id_seq FROM postgres;
GRANT ALL ON SEQUENCE venta_id_seq TO postgres;
GRANT ALL ON SEQUENCE venta_id_seq TO db_admin;


--
-- PostgreSQL database dump complete
--

