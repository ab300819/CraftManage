CREATE TABLE assembly_list (
  id            INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  craft_num     CHAR(50),
  material_num  CHAR(50),

  serial_num    INT,
  drawing_num   CHAR(30),
  component     CHAR(30),
  material      CHAR(20),
  number        INT,
  component_num CHAR(30),
  notes         CHAR(45),
  version       INT
)
  ENGINE = InnoDB;