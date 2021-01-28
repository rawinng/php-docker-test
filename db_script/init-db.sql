-- create database
CREATE TABLE db_product.PRODUCT (
	prod_id BIGINT UNSIGNED NOT NULL auto_increment,
	`name` varchar(100) NOT NULL,
	`price` DECIMAL NOT NULL,
	CONSTRAINT Product_PK PRIMARY KEY (prod_id)
)
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_ai_ci;
