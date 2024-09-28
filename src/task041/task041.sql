#https://www.codewars.com/kata/594a6133704e4daf5d00003d/train/sql

CREATE TABLE decimals
(
    id      integer NOT NULL,
    number1 float   NOT NULL,
    number2 float   NOT NULL
);

INSERT INTO decimals (id, number1, number2)
VALUES (1, 0.99, 1.77),
       (2, 67.99, 890.9988),
       (3, 78.9980, 99.11);

SELECT FLOOR(number1) as number1,
       CEIL(number2)  as number2
FROM decimals;
