#https://www.codewars.com/kata/594a691720ac16a544000075/train/sql

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

SELECT SQRT(number1) as root,
       LOG(number2)  as log
FROM decimals;
