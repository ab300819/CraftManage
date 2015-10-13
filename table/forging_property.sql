CREATE TABLE forging_property (
  id                  INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  craft_num           CHAR(50),
  material_num        CHAR(50),

  material            CHAR(20),
  material_standard   CHAR(20),
  blank_length        INT,
  blank_per           INT,
  per_num             INT,
  forging_weight      INT,
  blank_weight        INT,
  core_mat_weight     INT,
  fire_weight         INT,
  forging_batch       INT,
  forgiong_proportion CHAR(10),
  version             INT,
  drawing             CHAR(20),
  craft               INT
)
  ENGINE = InnoDB;