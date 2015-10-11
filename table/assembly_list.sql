CREATE TABLE assembly_list (
  id           INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  craft_num    CHAR(50),
  material_num CHAR(50),
  num INT,
  drawing_num CHAR(30),
  component CHAR(30),
  material CHAR(20),
  num INT,
  component_num CHAR(30)
# TODO 还需添加
)
  ENGINE = InnoDB;