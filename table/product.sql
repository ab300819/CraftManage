CREATE TABLE product (
  id                INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  material_num      CHAR(50) UNIQUE KEY,
  material_name     CHAR(50),
  name              CHAR(50),
  modle             CHAR(50),
  standard          CHAR(50),
  component_discern CHAR(20),
  component_num     CHAR(20),
  craft_line        CHAR(50),
  produce_model     CHAR(50),
  craft_num         CHAR(50) UNIQUE KEY,
  produce_num       CHAR(50),
  property          INT

)
  ENGINE = InnoDB;
