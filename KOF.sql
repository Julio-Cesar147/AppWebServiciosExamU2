Create Database KOF;
Use KOF;

Create Table Tipo_Lucha (
	id_lucha bigint not null primary key,
    Lucha varchar (20)
);

Create Table Tipo_Magia (
	id_magia bigint not null primary key,
    Magia varchar (20)
);

Create Table Personaje (
	id bigint auto_increment primary key not null,
	`name` varchar (20) not null,
    lastname varchar (20) not null,
    `type_fight` bigint not null,
    magia bigint,
    estatura decimal (2) not null,
    peso numeric not null, 
    equipo numeric,
    
    CONSTRAINT fight_fk FOREIGN KEY (`type_fight`) REFERENCES Tipo_Lucha(id_lucha),
    CONSTRAINT magic_fk FOREIGN KEY (magia) REFERENCES Tipo_Magia (id_magia)
);

Insert into Tipo_Lucha (id_lucha, Lucha) VALUES (1, "Karate");
Insert into Tipo_Lucha (id_lucha, Lucha) VALUES (2, "Muay Thai");
Insert into Tipo_Lucha (id_lucha, Lucha) VALUES (3, "Callejero");
Insert into Tipo_Lucha (id_lucha, Lucha) VALUES (4, "Propio");