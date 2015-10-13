CREATE TABLE heat_craft (
  id               INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  craft_num        CHAR(50),
  material_num     CHAR(50),

  Charging CHAR(20),
  heat_up CHAR(20),
  heating CHAR(20),
  thermal_insulation CHAR(20),
  Cooling_medium CHAR(20),
  Cooling_speed CHAR(20),
  drawing char(20),
  version INT

)
  ENGINE = InnoDB;