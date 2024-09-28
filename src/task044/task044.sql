#https://www.codewars.com/kata/57a0885cbb9944e24c00008e/train/sql

CREATE TABLE removeexclamationmarks
(
    random_string varchar NOT NULL
);

INSERT INTO removeexclamationmarks (random_string)
VALUES ('Hello World!'),
       ('Hello World!!!'),
       ('Hi! World!'),
       (''),
       ('Oh, no!!!');

SELECT random_string,
       REPLACE(random_string, '!', '') AS res
FROM removeexclamationmarks;
