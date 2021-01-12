/*



create table register(
    id int(11) primary key auto_increment,
    username varchar(50) not null,
    email varchar(50) not null,
    password varchar(50) not null
)

alter table users add update_date_time datetime DEFAULT  CURRENT_TIMESTAMP;
alter table service_provider add update_date_time datetime DEFAULT  CURRENT_TIMESTAMP;

ALTER TABLE service_provider CHANGE COLUMN date_time register_date_time datetime;
ALTER TABLE users CHANGE COLUMN date_time register_date_time datetime;




select * from users;*/

