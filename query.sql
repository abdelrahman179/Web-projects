/***********data base of dashpanel**************/
CREATE DATABASE adminpanel;

CREATE TABLE register(
    id int(11) primary key auto_increment,
    username varchar(50) not null,
    email varchar(50) not null,
    password varchar(50) not null
);
/***********data base of project**************/
CREATE DATABASE khalsana;

use khalsana;

CREATE TABLE Contact_us(
    inquiry_id INT(50) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    phone_num INT(50) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message VARCHAR(2000) NOT NULL,
    date_time datetime  NOT NULL
);



CREATE TABLE users(
    user_id INT(50) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    phone_num INT(50) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(2000) NOT NULL,
    gender  ENUM('male','female'),
    service_provider ENUM('yes','no'),
    date_time datetime  NOT NULL
) ;


CREATE TABLE service_provider(
    service_provider_id INT(50) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    phone_num INT(50) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(2000) NOT NULL,
    gender  ENUM('male','female'),
    service_provider ENUM('yes','no'),
    date_time datetime  NOT NULL,
    category VARCHAR(255) NOT NULL,
    speciality VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    district VARCHAR(255) NOT NULL,
    story VARCHAR(255),
    image VARCHAR(255) NOT NULL
) ;

 create table reviews(
    review_id int(50) primary key auto_increment,
    reviewer_name varchar(255),
    service_provider_email varchar(255),
    review_desc varchar(32767),
    date_time datetime
);

 create table favourite(
    favourite_id int(50) primary key auto_increment,
    user_email varchar(255),
    service_provider_email varchar(255),
    date_time datetime
);

/*********DROP speciality and change Category to profession*************/
ALTER TABLE service_provider DROP COLUMN speciality;
ALTER TABLE service_provider CHANGE COLUMN Category profession VARCHAR(255);
/*******change phone_num from int to varchat to show zero*******/
ALTER TABLE service_provider CHANGE COLUMN phone_num phone_num VARCHAR(255);
ALTER TABLE users CHANGE COLUMN phone_num phone_num VARCHAR(255);

/*********change primary key from id to email************/
/********fror users table***********/
ALTER TABLE users MODIFY user_id INT(50),  DROP PRIMARY KEY, ADD PRIMARY KEY (email);
ALTER TABLE users DROP COLUMN user_id; /*drop id column*/
/********fror service_provider table***********/
ALTER TABLE service_provider MODIFY service_provider_id INT(50),  DROP PRIMARY KEY, ADD PRIMARY KEY (email);
ALTER TABLE service_provider DROP COLUMN service_provider_id; /*drop id column*/

/*****************add update_date_time***************************/
alter table users add update_date_time datetime DEFAULT  CURRENT_TIMESTAMP;
alter table service_provider add update_date_time datetime DEFAULT  CURRENT_TIMESTAMP;
/*****************change date_time to register_date_time***************************/
ALTER TABLE service_provider CHANGE COLUMN date_time register_date_time datetime;
ALTER TABLE users CHANGE COLUMN date_time register_date_time datetime;


/**********************insert into database using queries***************************/
INSERT INTO service_provider
        (name,phone_num,email,password,gender,service_provider,date_time,profession,city,district,story,image)
        VALUES('أحمد خميس','01005287994','ahmedkhamis@gmail.com','123456','male','yes',NOW(),
        'سباك','القاهرة','شبرا','سباك محترم','ahmedkhamis@gmail.com');
        
INSERT INTO service_provider
        (name,phone_num,email,password,gender,service_provider,date_time,profession,city,district,story,image)
        VALUES('أحمد عادل','01125227994','ahmedadel@gmail.com','123456','male','yes',NOW(),
        'سباك','القاهرة','الرحاب','سباك محترم','ahmedadel@gmail.com.jpg');
        
INSERT INTO service_provider
        (name,phone_num,email,password,gender,service_provider,date_time,profession,city,district,story,image)
        VALUES('باسم خميس','01115211994','basemkhamis@gmail.com','123456','male','yes',NOW(),
        'سباك','القاهرة','مدينة نصر','سباك محترم','basemkhamis@gmail.com.jpg');
        
INSERT INTO service_provider
        (name,phone_num,email,password,gender,service_provider,date_time,profession,city,district,story,image)
        VALUES('باسم عماد','01135299994','basememad@gmail.com','123456','male','yes',NOW(),
        'سباك','القاهرة','المطرية','سباك محترم','basememad@gmail.com.jpg');
        
INSERT INTO service_provider
        (name,phone_num,email,password,gender,service_provider,date_time,profession,city,district,story,image)
        VALUES('تامر أمين','01155877994','tameramin@gmail.com','123456','male','yes',NOW(),
        'سباك','القاهرة','الشروق','سباك محترم','tameramin@gmail.com.jpg');
        
INSERT INTO service_provider
        (name,phone_num,email,password,gender,service_provider,date_time,profession,city,district,story,image)
        VALUES('أيمن أشرف','01275287111','aymanashraf@gmail.com','123456','male','yes',NOW(),
        'سباك','القاهرة','وسط البلد','سباك محترم','aymanashraf@gmail.com.jpg');
        
INSERT INTO service_provider
        (name,phone_num,email,password,gender,service_provider,date_time,profession,city,district,story,image)
        VALUES('تامر صالح','01005255594','tamersaleh@gmail.com','123456','male','yes',NOW(),
        'سباك','القاهرة','المطرية','سباك محترم','tamersaleh@gmail.com.jpg');
        
INSERT INTO service_provider
        (name,phone_num,email,password,gender,service_provider,date_time,profession,city,district,story,image)
        VALUES('إبراهيم سامي','01005222994','ibrahimsamy@gmail.com','123456','male','yes',NOW(),
        'سباك','القاهرة','الشروق','سباك محترم','ibrahimsamy@gmail.com.jpg');
        
INSERT INTO service_provider
        (name,phone_num,email,password,gender,service_provider,date_time,profession,city,district,story,image)
        VALUES('إبراهيم أشرف','01005333994','ibrahimashraf@gmail.com','123456','male','yes',NOW(),
        'سباك','القاهرة','وسط البلد','سباك محترم','ibrahimashraf@gmail.com.jpg');


/* 50 cleaner in Giza - 50 sabak in Cairo - 50 7adad in Alex  */

        