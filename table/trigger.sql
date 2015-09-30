CREATE TRIGGER product_property
AFTER INSERT ON product
FOR EACH ROW
BEGIN 
	INSERT INTO property(material_num) VALUES(NEW.material_num);


CREATE TRIGGER `product_property` 
AFTER INSERT ON `product` 
FOR EACH ROW 
INSERT INTO property(material_num) VALUES(NEW.material_num);

