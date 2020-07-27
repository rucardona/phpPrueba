
 
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
 
 