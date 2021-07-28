CREATE DATABASE fnf;
USE fnf;

CREATE TABLE sign_in
(
  verify_code_id INT NOT NULL,
  email_check VARCHAR(255) NOT NULL,
  PRIMARY KEY (verify_code_id)
);

CREATE TABLE Register
(
  reg_form VARCHAR(255) NOT NULL,
  reg_id INT NOT NULL,
  verify_code_id INT NOT NULL,
  PRIMARY KEY (reg_id),
  FOREIGN KEY (verify_code_id) REFERENCES sign_in(verify_code_id)
);

CREATE TABLE cart
(
  product_id INT NOT NULL AUTO_INCREMENT,
  product_price INT NOT NULL,
  product_name VARCHAR(255) NOT NULL,
  PRIMARY KEY (product_id)
);

CREATE TABLE Customer
(
  customer_name VARCHAR(255) NOT NULL,
  id INT NOT NULL,
  age INT NOT NULL,
  verify_code_id INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (verify_code_id) REFERENCES sign_in(verify_code_id)
);

CREATE TABLE checkout_option
(
  payment INT NOT NULL,
  order_confirmation VARCHAR(255) NOT NULL,
  cash_delivery INT NOT NULL,
  id INT NOT NULL,
  reg_id INT NOT NULL,
  PRIMARY KEY (payment),
  FOREIGN KEY (id) REFERENCES Customer(id),
  FOREIGN KEY (reg_id) REFERENCES Register(reg_id)
);

CREATE TABLE Record
(
  license_id INT NOT NULL,
  license_type VARCHAR(255) NOT NULL,
  amount INT NOT NULL,
  id INT NOT NULL,
  product_id INT NOT NULL,
  PRIMARY KEY (license_id),
  FOREIGN KEY (id) REFERENCES Customer(id),
  FOREIGN KEY (product_id) REFERENCES cart(product_id)
);

CREATE TABLE category_view
(
  item_search_id INT NOT NULL,
  result VARCHAR(255) NOT NULL,
  payment INT NOT NULL,
  PRIMARY KEY (item_search_id),
  FOREIGN KEY (payment) REFERENCES checkout_option(payment)
);