CREATE TABLE machine (
  id            INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  craft_num     CHAR(50),
  material_num  CHAR(50),

  step_num      INT,
  room          CHAR(20),
  name          CHAR(20),
  content       CHAR(100),
  self_check    CHAR(50),
  operator      CHAR(50),
  special_check CHAR(50),
  checker       CHAR(20),
  machine       CHAR(50),
  craft_machine CHAR(50),
  prepare_time  CHAR(20),
  run_time      CHAR(20),
  version       INT
)
  ENGINE = InnoDB;
