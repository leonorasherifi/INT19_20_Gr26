create database smarthome;

drop table users;
create TABLE users(
	uid int AUTO_INCREMENT PRIMARY KEY,
    ufirstname varchar(40) not null,
    ulastname varchar(40) not null,
    uphone char(12) not null,
    uemail varchar(150) not null unique,
    usalt varchar(150) not null,
    upassword varchar(300) not null
);


create TABLE personalinfos(
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    lastname VARCHAR(20) NOT NULL,
    phonenr VARCHAR(20) NOT NULL,
    address VARCHAR(40) NOT NULL,
    zipcode VARCHAR(20) NOT NULL,
    primary key(id)

);

CREATE TABLE productdetails
(
    ttype VARCHAR(30) NOT NULL,
    datelast VARCHAR(30) NOT NULL,
    prod VARCHAR(30) NOT NULL
);


CREATE TABLE paymentdetails
( 
    id INT NOT NULL AUTO_INCREMENT,
    cardnum VARCHAR(30) NOT NULL,
    cardholder VARCHAR(30) NOT NULL,
    expdate VARCHAR(10) NOT NULL,
    CCV VARCHAR(50) NOT NULL,
    price VARCHAR(10) NOT NULL,
    primary key(id)
);


create table classes(
		classid int primary key,
        product varchar(200) not null,
        buypack varchar(200) not null
		);

insert into classes values(1,'../images/about/lighting.webp',
'Our lightning product is one of the best in the region. ');

insert into classes values(2,'../images/smart-heating/heat4.jpg',
'Our  heating product is one of the best in the region. ');

insert into classes values(3,'../images/about/cam.jpg',
'Our security product is one of the best in the region. ');
