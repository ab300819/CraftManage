CREATE TABLE property (
  id               INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  material_num     CHAR(50) UNIQUE KEY,
  material_model   CHAR(50),
  material_discern CHAR(50),
  blank            CHAR(20),
  per_num          INT,
  heat             CHAR(50)
)
  ENGINE = InnoDB;