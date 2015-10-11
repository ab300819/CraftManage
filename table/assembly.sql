CREATE TABLE assembly (
  id               INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  craft_num        CHAR(50),
  material_num     CHAR(50),
  step_num         INT,
  name             CHAR(20),
  content          CHAR(50),
  self_check       CHAR(30),
  operate          CHAR(20),
  check_record     CHAR(30),
  check_conclusion CHAR(30),
  checker          CHAR(20),
  witness          CHAR(20),
  craft_machine    CHAR(25),
  version          INT,
  list             INT
)
  ENGINE = InnoDB;