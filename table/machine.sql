CREATE TABLE machine(
	id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	craft_num CHAR(50) NOT NULL ,
	material_num CHAR(50) NOT NULL ,
	step_num INT NOT NULL,
	room CHAR(20),
	name CHAR(20) NOT NULL,
	content CHAR(100) NOT NULL,
	self_check CHAR(50) ,
	operator CHAR(50) ,
	special_check CHAR(50) NOT NULL,
	checker CHAR(20) ,
	machine CHAR(50) NOT NULL,
	craft_machine CHAR(50) NOT NULL,
	prepare_time CHAR(20) NOT NULL,
	run_time CHAR(20) NOT null,
	version INT NOT null
) ENGINE=InnoDB;