create db_empresa`;
use db_empresa;
CREATE TABLE `db_empresa`.`Empresa` ( 
	`id` INT NOT NULL AUTO_INCREMENT ,
	 `Nit` VARCHAR(20) NOT NULL , 
	 `RazonSocial` VARCHAR(100) NOT NULL , 
	 `Direccion` VARCHAR(20) NOT NULL ,
	 `Telefono` VARCHAR(12) NOT NULL , 
	 PRIMARY KEY (`id`)
) 
 ENGINE = InnoDB;
 
 
 create db_usuario`;
use db_usuario;
CREATE TABLE `db_usuario`.`Usuario` ( 
	 `id` INT NOT NULL AUTO_INCREMENT ,
	 `Nombres` VARCHAR(20) NOT NULL , 
	 `Apellidos` VARCHAR(100) NOT NULL , 
	 `NroIdentificacion` VARCHAR(20) NOT NULL ,
	 `empresaId` Int NOT NULL , 
	 PRIMARY KEY (`id`)
) 
 ENGINE = InnoDB;
 
 