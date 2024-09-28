--https://www.codewars.com/kata/58111670e10b53be31000108/train/sql

CREATE TABLE people
(
    id   integer NOT NULL,
    name varchar NOT NULL,
    age  integer NOT NULL,
);


INSERT INTO people (id, name, age)
VALUES (1, 'Serhii', 12),
       (2, 'Jack', 12),
       (3, 'Misha', 22),
       (4, 'John', 17),
       (5, 'Mary', 22),
       (6, 'Liam', 19);

SELECT DISTINCT
    age
FROM
    people;
