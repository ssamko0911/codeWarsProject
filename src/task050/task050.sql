-- https://www.codewars.com/kata/581113dce10b531b1d0000bd/train/sql

CREATE TABLE people
(
    id   integer NOT NULL,
    name varchar NOT NULL,
    age  int     NOT NULL
);

INSERT INTO people (id, name, age)
VALUES (1, 'Serhii', 40),
       (2, 'Jack', 22),
       (3, 'John', 32),
       (4, 'Misha', 10),
       (5, 'Moe', 12);

SELECT MIN(age) as age_min,
       MAX(age) as age_max
FROM people;
