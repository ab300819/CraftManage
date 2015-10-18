CREATE TABLE product (
  id                INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  material_num      CHAR(50) UNIQUE KEY,
  material_name     CHAR(50),
  name              CHAR(50),
  model             CHAR(50),
  num               CHAR(20),
  standard          CHAR(50),
  component_discern CHAR(20),
  component_num     CHAR(20),
  component_draw    CHAR(30),
  assemble_draw     CHAR(30),
  craft_line        CHAR(50),
  produce_model     CHAR(50),
  craft_num         CHAR(50),
  produce_num       CHAR(50),
  material          CHAR(50),
  material_discern  CHAR(50),
  blank             CHAR(20),
  per_num           INT,
  heat              CHAR(50),
  craft_type        CHAR(20)

)
  ENGINE = InnoDB;
