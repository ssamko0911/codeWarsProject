-- https://www.codewars.com/kata/594a8f653b5b4e8f3d000035/sql

CREATE TABLE decimals
(
    id      integer NOT NULL,
    number1 float   NOT NULL,
    number2 float   NOT NULL
);

INSERT INTO decimals (id, number1, number2)
VALUES (1, 12.875, 3.0),
       (2, 8.133, 2.0),
       (3, 99, 2.0);

SELECT POWER(number1, number2) as result
FROM decimals;
