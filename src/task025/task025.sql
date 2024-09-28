-- https://www.codewars.com/kata/5a8eb3fb57c562110f0000a1/train/sql

create table if not exists products
(
    id int,
    name varchar(256),
    price float,
    stock int,
    producent varchar(256)
);

insert into products(id, name, price, stock, producent)
values (1, 'Potatoes', 5.77, 2, 'CompanyA'),
       (2, 'Tomatoes', 1.70, 1, 'CompanyA'),
       (3, 'Grapes', 2.90, 7, 'CompanyA'),
       (4, 'StarFruit', 5.77, 2, 'CompanyB'),
       (5, 'Jam', 6.10, 1, 'CompanyB'),
       (6, 'Ketchup', 2.15, 8, 'CompanyB'),
       (7, 'Honey', 5.77, 3, 'CompanyC');

SELECT id, name, stock
FROM products
WHERE stock <= 2
  AND producent = 'CompanyA'
ORDER BY id;
