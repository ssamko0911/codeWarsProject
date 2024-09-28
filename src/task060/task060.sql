-- https://www.codewars.com/kata/64ce962d7d57e3001f8521b8/train/sql

CREATE TABLE ip_addresses
(
    id integer NOT NULL,
    ip varchar NOT NULL
);

INSERT INTO ip_addresses (id, ip)
VALUES (1, '035.123.041.093'),
       (2, '210.071.126.190'),
       (3, '008.028.009.024');

SELECT id,
       ip::inet AS cleaned_ip
FROM ip_addresses
ORDER BY id DESC;