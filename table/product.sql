CREATE TABLE product(
	id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	material_num CHAR(50) NOT NULL UNIQUE KEY,
	material_name CHAR(50) NOT NULL,
	name CHAR(50) NOT NULL,
	modle CHAR(50) NOT NULL,
	standard CHAR(50) NOT NULL,
	component_discern CHAR(20),
	component_num CHAR(20) NOT NULL,
	craft_line CHAR(50) NOT NULL,
	produce CHAR(50),
	craft_num CHAR(50) NOT NULL UNIQUE KEY,
	batch CHAR(50)
) ENGINE=InnoDB ;
