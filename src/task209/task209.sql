-- https://www.codewars.com/kata/67741444c77444b19e8b5223/train/sql

CREATE TABLE product_tags
(
    product_id VARCHAR NOT NULL,
    tag        VARCHAR NOT NULL
);

insert into product_tags(product_id, tag)
values (101, 'Electronics'),
       (101, 'Gadgets'),
       (102, 'Home'),
       (103, 'Electronics'),
       (103, 'Accessories'),
       (104, 'Kitchen'),
       (105, 'Electronics'),
       (105, 'Gadgets'),
       (105, 'Accessories'),
       (106, 'Gadgets'),
       (106, 'Accessories');

SELECT DISTINCT product_id
FROM product_tags
WHERE tag IN ('Electronics', 'Gadgets')
GROUP BY product_id
HAVING COUNT(DISTINCT tag) = 2
ORDER BY product_id
    DESC;
