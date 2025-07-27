-- https://www.codewars.com/kata/64c4d0011141cb003eca9e18/train/sql

CREATE TABLE orders
(
    id            integer NOT NULL,
    customer_id   integer NOT NULL,
    delivery_date date
);

insert into orders (id, customer_id, delivery_date)
values (1, 1, '2023-07-01'),
       (2, 1, NULL),
       (3, 2, NULL),
       (4, 2, NULL),
       (5, 3, '2023-07-01'),
       (6, 3, '2023-07-01'),
       (7, 4, NULL),
       (8, 4, NULL),
       (9, 5, '2023-07-01'),
       (10, 5, NULL);

SELECT DISTINCT customer_id
FROM orders
WHERE customer_id IN
      (SELECT customer_id
       FROM orders
       GROUP BY customer_id
       HAVING COUNT(delivery_date) = 0)
ORDER BY customer_id
    DESC;
