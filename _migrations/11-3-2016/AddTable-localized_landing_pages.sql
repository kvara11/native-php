CREATE TABLE localized_landing_pages
(
  id INT PRIMARY KEY AUTO_INCREMENT,
  state VARCHAR(255),
  city VARCHAR(255),
  state_flag_img VARCHAR(255),
  background_img VARCHAR(255),
  welcome_msg TEXT,
  active BOOLEAN DEFAULT 0
);