drop database groceries;
create database groceries;
use groceries;

CREATE TABLE IF NOT EXISTS retailer(
    retailer_id INT primary key not null AUTO_INCREMENT,
    name VARCHAR(75),
    location VARCHAR(75),
    address  VARCHAR(150),
    contact_no   VARCHAR(45),
    email_id varchar(150)

);
INSERT INTO retailer(name,location,address,contact_no,email_id)VALUES('Aldi','Werribe','Werribee_plaza','41123456','plazaaldi@gmail.com');
INSERT INTO retailer(name,location,address,contact_no,email_id)VALUES('Coles','Werribe','Werribee_plaza','41123454','plazacoles@gmail.com');
INSERT INTO retailer(name,location,address,contact_no,email_id)VALUES('Woolworths','Werribe','Werribee_plaza','41123453','plazawoolworths@gmail.com');
SELECT * from retailer;

create table if not exists buy_preference(
    buy_preference_id int(11) primary key not null AUTO_INCREMENT,
    name varchar(25),
    description varchar(75)
);
INSERT INTO buy_preference(name,description)VALUES('Monthly','Buying every month');
INSERT INTO buy_preference(name,description)VALUES('Weekly','every week saturday');
INSERT INTO buy_preference(name,description)VALUES('twice a week','every week saturday');
INSERT INTO buy_preference(name,description)VALUES('Half price','when product half price');
SELECT * from buy_preference;



create table if not exists product(
    product_id int primary key not null AUTO_INCREMENT,
    buy_preference_id int not null,
    name varchar(90),
    description varchar(250),
    uom varchar(30),
    min_qty decimal(9,2),
    max_qty decimal(9,2),

    FOREIGN KEY(buy_preference_id) REFERENCES buy_preference(buy_preference_id)
);
INSERT INTO product(buy_preference_id,name,description,uom,min_qty,max_qty)VALUES('2','Milk','Pura','Litter','1.00','3.00');
INSERT INTO product(buy_preference_id,name,description,uom,min_qty,max_qty)VALUES('4','Cereal','','packet','1.00','4.00');
INSERT INTO product(buy_preference_id,name,description,uom,min_qty,max_qty)VALUES('1','CoconutMilk','','can','1.00','6.00');
INSERT INTO product(buy_preference_id,name,description,uom,min_qty,max_qty)VALUES('1','BodyCream','','bottle','1.00','2.00');
SELECT * from product;


create table if not exists stock(
    stock_id int primary key not null AUTO_INCREMENT,
    product_id int,
    qtyathand int,

    FOREIGN KEY(product_id) REFERENCES product(product_id)
);
INSERT INTO stock(product_id,qtyathand)VALUES('1','1');
INSERT INTO stock(product_id,qtyathand)VALUES('2','2');
SELECT * from stock;


create table if not exists brand(
    brand_id int(11) primary key not null AUTO_INCREMENT,
    product_id int,
    name varchar(75),
    location varchar(125),

    FOREIGN KEY(product_id) REFERENCES product(product_id)
);
INSERT INTO brand(product_id,name,location)VALUES('2','Kelogges','');
INSERT INTO brand(product_id,name,location)VALUES('4','Aveno','');
INSERT INTO brand(product_id,name,location)VALUES('1','pura','');
SELECT * from brand;

create table if not exists retailshop(
    reatailshop_id int primary key not null AUTO_INCREMENT,
    product_id int not null,
    retailer_id int not null,
    price decimal(12,2),

    FOREIGN KEY(product_id) REFERENCES product(product_id),
    FOREIGN KEY(retailer_id) REFERENCES retailer(retailer_id)
);
INSERT INTO retailshop(product_id,retailer_id,price)VALUES('2','2','4.80');
INSERT INTO retailshop(product_id,retailer_id,price)VALUES('2','3','4.80');

create table if not exists shoppinglist(
    shoppinglist_id int primary key not null AUTO_INCREMENT,
    product_id int not null,
    buy_preference_id int not null,
    shop_date date,
    qty decimal(9,2),
    pricetopay decimal(9,2),
    shopper_name varchar(45),
    confirm tinyint(1),

    FOREIGN KEY(product_id) REFERENCES product(product_id),
    FOREIGN KEY(buy_preference_id) REFERENCES buy_preference(buy_preference_id)

);
INSERT INTO shoppinglist(product_id,retailer_id,price)VALUES('2','2','4.80');


create table if not exists ledger(
    id int primary key not null AUTO_INCREMENT,
    product_id int not null,
    buy_preference_id int not null,
    ledger_date date,
    qty decimal(9,2),

    FOREIGN KEY(product_id) REFERENCES product(product_id),
    FOREIGN KEY(buy_preference_id) REFERENCES buy_preference(buy_preference_id)
);

create table if not exists category(
    id int(11) primary key not null AUTO_INCREMENT,
    product_id int not null,
    description VARCHAR(75),

    FOREIGN KEY(product_id) REFERENCES product(product_id)
);