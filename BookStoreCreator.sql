Create database bookworld;
use bookworld;
CREATE TABLE IF NOT EXISTS books_table (
  id int not null auto_increment primary key,
  book_isn varchar(20) NOT NULL,
  book_Nmae varchar(60) NOT NULL,
  book_writer varchar(60) NOT NULL,
  book_pics varchar(40) NOT NULL,
  book_desc varchar(1500),
  book_price decimal(6,2) NOT NULL,
  book_publisherid int(10) NOT NULL,
  book_qty int not null
);

CREATE TABLE IF NOT EXISTS customer_table (
  customer_id int not null auto_increment primary key,
  f_name varchar(60) NOT NULL,
  l_name varchar(60) NOT NULL,
  c_address varchar(80)  NOT NULL,
  C_city varchar(30)  NOT NULL,
  c_postal_code varchar(10)  NOT NULL,
  c_country varchar(60)  NOT NULL
);

CREATE TABLE IF NOT EXISTS order_table (
  order_id int not null auto_increment primary key,
  customer_id int NOT NULL,
  o_amount decimal(6,2) NOT NULL,
  date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  shipping_name char(60) NOT NULL,
  shipping_address char(80) NOT NULL,
  shipping_city char(30) NOT NULL,
  shipping_zip_code char(10) NOT NULL,
  shipping_country char(20) NOT NULL
);

CREATE TABLE IF NOT EXISTS ordered_item (
  order_id int not null auto_increment primary key,
  book_isn varchar(20) NOT NULL,
  item_price decimal(6,2) NOT NULL,
  quantity int NOT NULL
);

CREATE TABLE IF NOT EXISTS book_publisher (
  publisher_id int not null auto_increment primary key,
  publisher_name varchar(60) NOT NULL
);




