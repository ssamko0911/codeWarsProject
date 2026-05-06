-- https://www.codewars.com/kata/57a0556c7cb1f31ab3000ad7/train/sql

CREATE TABLE makeuppercase
(
    id  integer NOT NULL,
    s   varchar NOT NULL
);

insert into makeuppercase(id, s)
values (1, 'hello'),
       (2, 'hello world'),
       (3, 'hello world !'),
       (4, 'heLlO wORLd !'),
       (5, '1,2,3 hello world!'),
       (6, 'Wk YhmPSOghOEEaO3phZZ!PQRkw !zqusTma0PXz');

SELECT
    s as str
    UPPER(s) as res
FROM
    makeuppercase;
