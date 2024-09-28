-- https://www.codewars.com/kata/594a9592704e4d21bc000131/sql

CREATE TABLE decimals
(
    id   integer NOT NULL,
    number1 decimal NOT NULL,
    number2  decimal NOT NULL,
);

INSERT INTO decimals (id, number1, number2)
VALUES (1, 18.17, 11.22),
       (2, 15.4, 4.1),
       (3, 99.8, 11.22);

SELECT
    MOD(number1, number2)
FROM
    decimals;
