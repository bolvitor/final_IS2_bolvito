CREATE TABLE empleados (
    emp_id SERIAL NOT NULL,
    emp_nombre VARCHAR(100) NOT NULL,
    emp_dpi INTEGER NOT NULL,
    emp_edad INTEGER NOT NULL,
    emp_sexo VARCHAR(100) NOT NULL,
    emp_id_area INTEGER NOT NULL,
    emp_situacion smallint not null default 1,
    PRIMARY KEY(emp_id),
    FOREIGN KEY (emp_id_area) REFERENCES areas(area_id)
);

CREATE TABLE puestos (
    puesto_id SERIAL NOT NULL,
    puesto_descripcion VARCHAR(100) NOT NULL,
    puesto_sueldo DECIMAL(8,2),
    puesto_situacion smallint not null default 1,
    PRIMARY KEY(puesto_id)
);

CREATE TABLE areas (
    area_id SERIAL NOT NULL,
    area_nombre VARCHAR(200) NOT NULL,
    area_situacion smallint not null default 1,
    PRIMARY KEY(area_id)
);

CREATE TABLE asignacion_puestos (
    asignacion_id SERIAL NOT NULL,
    emp_id INTEGER NOT NULL,
    puesto_id INTEGER NOT NULL,
    PRIMARY KEY(asignacion_id),
    FOREIGN KEY (emp_id) REFERENCES empleados(emp_id),
    FOREIGN KEY (puesto_id) REFERENCES puestos(puesto_id)
);
