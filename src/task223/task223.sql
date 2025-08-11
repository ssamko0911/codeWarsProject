-- https://www.codewars.com/kata/5763bb0af716cad8fb000580/train/sql

CREATE TABLE squares
(
    n integer NOT NULL
);

INSERT INTO squares(n)
VALUES (0),
       (5),
       (16),
       (23),
       (1009);

SELECT n,
       CASE
           WHEN n = 0 THEN 1
           ELSE (((n + 1)::bigint * (n + 1)) * (n + 1))
               - (((n - 1)::bigint * (n - 1)) * (n - 1))
           END AS res
FROM squares;
