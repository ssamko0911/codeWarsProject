# https://leetcode.com/problems/product-sales-analysis-i

CREATE TABLE products
(
    product_id   integer NOT NULL PRIMARY KEY,
    product_name varchar NOT NULL
);

CREATE TABLE sales
(
    sale_id    integer NOT NULL PRIMARY KEY,
    product_id integer NOT NULL REFERENCES products,
    year       integer NOT NULL,
    quantity   integer NOT NULL,
    price      integer NOT NULL
);

INSERT INTO products (product_id, product_name)
VALUES (100, 'Nokia'),
       (200, 'Apple'),
       (300, 'Samsung');

INSERT INTO sales (sale_id, product_id, year, quantity, price)
VALUES (1, 100, 2008, 10, 5000),
       (2, 100, 2009, 12, 5000),
       (7, 200, 2011, 15, 9000);

SELECT
    product_name,
    year,
    price
FROM
    sales
INNER JOIN
    products
ON
    sales.product_id = products.product_id;
