--https://www.codewars.com/kata/523b623152af8a30c6000027/train/sql

CREATE TABLE square
(
    id  integer NOT NULL,
    n   integer NOT NULL
);

insert into square(id, n)
values (1, 1),
       (2, 2),
       (3, 3),
       (4, 4),
       (5, 35),
       (6, 6298),
       (7, 2892);

SELECT
    n AS number,
    n * n AS res
FROM
    square;
