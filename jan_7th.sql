 create table reviews(
    review_id int(50) primary key auto_increment,
    reviewer_name varchar(255),
    service_provider_email varchar(255),
    review_desc varchar(32767),
    date_time datetime
)


select * from reviews;



