-- https://www.codewars.com/kata/5933a1f8552bc2750a0000ed/train/sql

CREATE TABLE ntheven
(
    id  integer NOT NULL,
    n   integer NOT NULL
);

insert into ntheven(id, n)
values (1, 1),
       (2, 2),
       (3, 3),
       (4, 100),
       (5, 1298734),
       (6, 491136946),
       (7, 949803002);

SELECT
    n AS number,
    ((n * 2) - 2) AS res
FROM
    ntheven;
