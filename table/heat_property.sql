CREATE TABLE heat_property (
  id               INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  craft_num        CHAR(50),
  material_num     CHAR(50),

  component        CHAR(30),
  material         CHAR(30),
  tensile_strength CHAR(20),
  elongation       CHAR(20),
  Stiffness        CHAR(20),
  machine          CHAR(40),
  heat_type        CHAR(40),
  version          INT,
  craft            INT

)
  ENGINE = InnoDB;