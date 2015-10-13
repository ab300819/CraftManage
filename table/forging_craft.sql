CREATE TABLE forging (
  id            INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  craft_num     CHAR(50),
  material_num  CHAR(50),

  step_num      INT,
  content       CHAR(50),
  machine       CHAR(20),
  craft_machine CHAR(20),
  start         INT,
  end           INT,
  cool          CHAR(20),
  spend         INT,
  notes         CHAR(20),
  version       INT
)
  ENGINE = InnoDB;