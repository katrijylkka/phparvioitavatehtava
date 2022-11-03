drop DATABASE if EXISTS shoppinglist;

CREATE DATABASE shoppinglist;

USE shoppinglist;

create table item (
    id int PRIMARY key auto_increment,
    description varchar(255) not null,
    amount smallint UNSIGNED NOT NULL
);

INSERT INTO item (description, amount) values ('Test item', 1);
INSERT INTO item (description, amount) values ('Another test item', 2);
INSERT INTO item (description, amount) values ('Third  test item', 3);