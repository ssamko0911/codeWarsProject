-- https://www.codewars.com/kata/64ce962d7d57e3001f8521b8/train/sql

CREATE TABLE customers
(
    id  integer NOT NULL,
    age integer NOT NULL
);

CREATE TABLE loans
(
    id          integer NOT NULL,
    customer_id integer NOT NULL,
    loan_status varchar NOT NULL,
    loan_amount float   NOT NULL
);

INSERT INTO customers (id, age)
VALUES (1, 80),
       (2, 62),
       (3, 61),
       (4, 60),
       (5, 21),
       (6, 33),
       (7, 26),
       (8, 32),
       (9, 36),
       (10, 27),
       (11, 41),
       (12, 31),
       (13, 39),
       (14, 46),
       (15, 12);

INSERT INTO loans (id, customer_id, loan_status, loan_amount)
VALUES (1, 8, 'paid', 8726),
       (2, 8, 'paid', 6044),
       (3, 11, 'unpaid', 3982),
       (4, 1, 'paid', 2541),
       (5, 3, 'unpaid', 796),
       (6, 15, 'unpaid', 9308),
       (7, 4, 'paid', 4626),
       (8, 14, 'unpaid', 3337),
       (9, 15, 'paid', 1200),
       (10, 6, 'unpaid', 6290),
       (11, 8, 'paid', 4964),
       (12, 15, 'paid', 676),
       (13, 4, 'unpaid', 9163),
       (14, 12, 'unpaid', 8790),
       (15, 14, 'unpaid', 4245),
       (16, 6, 'unpaid', 2624),
       (17, 12, 'paid', 3773),
       (18, 15, 'unpaid', 6080),
       (19, 1, 'unpaid', 3687),
       (20, 1, 'paid', 4541);

SELECT c.id    as customer_id,
       CASE
           WHEN (18 <= c.age AND c.age <= 65)
               AND 'unpaid' NOT IN (select loan_status from loans l where l.customer_id = c.id)
               THEN 'loan can be given'
           ELSE 'loan cannot be given'
           END as loan_eligibility
FROM customers c
WHERE 1 <= c.id
  AND c.id <= 10
ORDER BY c.id DESC
