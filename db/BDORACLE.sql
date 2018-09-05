-- start bd_acuerdos_msih.sql

host cls

PROMPT BD Control de Acuerdos MSIH
spool bd_acuerdos_msih.log
conn system/root

drop procedure prc_ins_departamento;
drop procedure prc_ins_usuario;
drop procedure prc_crear_sesion;
drop procedure prc_crear_acuerdo;
drop procedure prc_asignarAcuerdo_dpto;
drop procedure prc_asignarAcuerdo_user;

drop sequence seq_acuerdo;
drop sequence seq_sesion;

drop table acuerdo_usuario;
drop table acuerdo_departamento;
drop table acuerdo;
drop table sesion;

ALTER TABLE usuario DROP CONSTRAINT usuario_fk1;
ALTER TABLE departamento DROP CONSTRAINT departamento_fk1;
drop table usuario;
drop table departamento;

PROMPT Creacion de Tablas

--Definir cual va a ser el id de usuario? para ver el length

create table departamento(
id_dpto number(4) not null,
nombre varchar2(30) not null,
id_jefe varchar2(20) null
);

alter table departamento add constraint departamento_pk primary key (id_dpto);

-- Preguntar al profe cómo se bannea un usuario
create table usuario(
id_user varchar2(20) not null,
nombre varchar2(20) not null,
primer_apellido varchar2(20) not null,
segundo_apellido varchar2(20) not null,
email varchar2(50) not null,
password varchar2(20) not null,
id_dpto number(4) null,
puesto varchar2(10) null,
rol varchar2(15) null,
id_jefe varchar2(20) null,
ultimo_acceso date not null
);

alter table usuario add constraint usuario_pk primary key (id_user);

alter table departamento add constraint departamento_fk1 foreign key (id_jefe) references usuario;


alter table usuario add constraint usuario_fk1 foreign key (id_dpto) references departamento;
alter table usuario add constraint usuario_fk2 foreign key (id_jefe) references usuario;

alter table usuario add constraint usuario_ck check (rol in ('Alcaldia','Jefe','Colaborador','TI','Secretaria'));

create table sesion(
id_sesion number(4) not null,
anno_sesion varchar2(4) not null,
fecha_sesion date not null,
creador_sesion varchar2(20) not null,
ultim_modif_sesion date not null
);

alter table sesion add constraint sesion_pk primary key (id_sesion, anno_sesion);

alter table sesion add constraint sesion_fk1 foreign key (creador_sesion) references usuario;

create table acuerdo(
id_acuerdo number(4) not null,
anno_acuerdo varchar2(4) not null,
fecha_acuerdo date not null,
id_sesion number(4) not null,
creador_acuerdo varchar2(20) not null,
titulo_acuerdo varchar2(50) not null,
finiquito_acuerdo date not null,
ultim_modif_acuerdo date not null,
estado_acuerdo varchar2(15) not null
);

alter table acuerdo add constraint acuerdo_pk primary key (id_acuerdo,anno_acuerdo);
alter table acuerdo add constraint acuerdo_fk1 foreign key (id_sesion,anno_acuerdo) references sesion;
alter table acuerdo add constraint acuerdo_fk2 foreign key (creador_acuerdo) references usuario;

create table acuerdo_departamento(
id_acuerdo number(4) not null,
anno_acuerdo varchar2(4) not null,
id_departamento number(4) not null,
asignador varchar2(20) not null,
fecha_inicio date not null,
fecha_final date null
);

alter table acuerdo_departamento add constraint acuerdo_depto_pk primary key (id_acuerdo,anno_acuerdo,id_departamento);
alter table acuerdo_departamento add constraint acuerdo_depto_fk1 foreign key (id_acuerdo,anno_acuerdo) references acuerdo;
alter table acuerdo_departamento add constraint acuerdo_depto_fk2 foreign key (id_departamento) references departamento;
alter table acuerdo_departamento add constraint acuerdo_depto_fk3 foreign key (asignador) references usuario;

create table acuerdo_usuario(
id_acuerdo number(4) not null,
anno_acuerdo varchar2(4) not null,
id_usuario varchar2(20) not null,
asignador varchar2(20) not null,
fecha_inicio date not null,
fecha_final date null
);

alter table acuerdo_usuario add constraint acuerdo_user_pk primary key (id_acuerdo,anno_acuerdo,id_usuario);
alter table acuerdo_usuario add constraint acuerdo_user_fk1 foreign key (id_acuerdo,anno_acuerdo) references acuerdo;
alter table acuerdo_usuario add constraint acuerdo_user_fk2 foreign key (id_usuario) references usuario;
alter table acuerdo_usuario add constraint acuerdo_user_fk3 foreign key (asignador) references usuario;

create table acuerdo_file(
id_acuerdo number(4) not null,
anno_acuerdo varchar2(4) not null,
filename varchar2(20) not null
);

alter table acuerdo_file add constraint acuerdo_file_pk primary key (id_acuerdo,anno_acuerdo,filename);

create sequence seq_acuerdo start with 1 increment by 1;
create sequence seq_sesion start with 1 increment by 1;

create or replace procedure prc_ins_departamento(PID in number, PNombre in varchar2, PJefe in varchar2) is
begin
	insert into departamento(id_dpto,nombre,id_jefe) values (PID,PNombre,PJefe);
	commit;
end prc_ins_departamento;
/

create or replace procedure prc_ins_usuario(PID in number, PNombre in varchar2, PApellido1 in varchar2,PApellido2 in varchar2,PEmail in varchar2, PPassword in varchar2, PDepto in number,PPuesto in varchar2, PRol in varchar2, PJefe in varchar2, PUltAcceso in date) is
begin
	insert into usuario(id_user,nombre,primer_apellido,segundo_apellido,email,password,id_dpto,puesto,rol,id_jefe,ultimo_acceso) values (PID,PNombre,PApellido1,PApellido2,PEmail,PPassword,PDepto,PPuesto,PRol,PJefe,PUltAcceso);
	commit;
end prc_ins_usuario;
/

create or replace procedure prc_crear_sesion(PAnno in varchar2, PFecha in date, PCreador in varchar2, PModif in date) is
begin
	insert into sesion(id_sesion,anno_sesion,fecha_sesion,creador_sesion,ultim_modif_sesion) values (seq_sesion.nextval,PAnno,PFecha,PCreador,PModif);
	commit;
end prc_crear_sesion;
/

create or replace procedure prc_crear_acuerdo(PAnno in varchar2, PFecha in date, PSesion in number, PCreador in varchar2, PTitulo in varchar2, PFiniquito in date, PModif in date) is
begin
	insert into acuerdo(id_acuerdo,anno_acuerdo,fecha_acuerdo,id_sesion,creador_acuerdo,titulo_acuerdo,finiquito_acuerdo,ultim_modif_acuerdo,estado_acuerdo) values (seq_acuerdo.nextval, PAnno, PFecha,PSesion,PCreador,PTitulo,PFiniquito,PModif,'Creado');
	commit;
end prc_crear_acuerdo;
/

create or replace procedure prc_asignarAcuerdo_dpto(PID in number, PAnno in varchar2,PDepto in number, PAsignador in varchar2, PInicio in date, PFinal in date) is
begin
	insert into acuerdo_departamento(id_acuerdo,anno_acuerdo,id_departamento,asignador,fecha_inicio,fecha_final) values (PID,PAnno,PDepto,PAsignador,PInicio,PFinal);
	update acuerdo set estado_acuerdo = 'Asignado Depto' where PID = id_acuerdo;
	commit;
end prc_asignarAcuerdo_dpto;
/

create or replace procedure prc_asignarAcuerdo_user(PID in number,PAnno in varchar2,PUsuario in varchar2, PAsignador in varchar2, PInicio in date, PFinal in date) is
begin
	insert into acuerdo_usuario(id_acuerdo,anno_acuerdo,id_usuario,asignador,fecha_inicio,fecha_final) values (PID,PAnno,PUsuario,PAsignador,PInicio,PFinal);
	update acuerdo set estado_acuerdo = 'Asignado User' where PID = id_acuerdo;
	commit;
end prc_asignarAcuerdo_user;
/

exec prc_ins_departamento(1,'Alcaldia Municipal',null);
exec prc_ins_departamento(2,'CECUDI',null);
exec prc_ins_departamento(3,'RH',null);

exec prc_ins_usuario('1','Marvin','Arias','Diaz','a@gmail.com','123',1,'Alcalde','Alcaldia',null,sysdate);
exec prc_ins_usuario('0','Marta','Arce','Lopez','m@gmail.com','012',1,'Secretaria','Secretaria','1',sysdate);
exec prc_ins_usuario('2','David','Perez','Rojas','d@gmail.com','999',2,'Maestro','Jefe','1',sysdate);
exec prc_ins_usuario('3','Juan','Monge','Peron','j@gmail.com','666',2,'Asistente','Colaborador','2',sysdate);
exec prc_ins_usuario('4','Hayser','Davil','Abarc','h@gmail.com','777',2,'Asistente','Colaborador','2',sysdate);

exec prc_crear_sesion(extract(year from sysdate),sysdate,'0',sysdate); 
exec prc_crear_sesion(extract(year from sysdate),sysdate+7,'0',sysdate+7); 

exec prc_crear_acuerdo(extract(year from sysdate),sysdate,1,'0','Remodelacion',sysdate+15,sysdate);
exec prc_crear_acuerdo(extract(year from sysdate),sysdate,1,'0','Compras',sysdate+19,sysdate);
exec prc_crear_acuerdo(extract(year from sysdate),sysdate,1,'0','Pagos',sysdate+30,sysdate);

exec prc_asignarAcuerdo_dpto(1,extract(year from sysdate),2,'1',sysdate,null);
exec prc_asignarAcuerdo_dpto(1,extract(year from sysdate),3,'1',sysdate,null);

exec prc_asignarAcuerdo_user(1,extract(year from sysdate),'3','2',sysdate,null);
exec prc_asignarAcuerdo_user(1,extract(year from sysdate),'4','2',sysdate,null);

COLUMN id_user format A1
COLUMN nombre format A6
COLUMN titulo_acuerdo format A6
COLUMN primer_apellido format A5
COLUMN segundo_apellido format A5
COLUMN email format A8
COLUMN password format A3
COLUMN puesto format A6
COLUMN rol format A6
COLUMN id_jefe format A1
COLUMN ultimo_acceso format A6
COLUMN ultim_modif_acuerdo format A6
COLUMN ultim_modif_sesion format A6
COLUMN estado_acuerdo format A6

-- CLEAR COLUMNS

select * from departamento;
select * from usuario;
select * from sesion;
select * from acuerdo;
select * from acuerdo_departamento;
select * from acuerdo_usuario;

spool off;
