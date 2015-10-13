CREATE TABLE metallurgy_machine (
  id           INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  craft_num    CHAR(50),
  material_num CHAR(50),

  step_num     INT,
  name         CHAR(20),
  content      CHAR(50),
  prepare      CHAR(30),
  version      INT
)
  ENGINE = InnoDB;