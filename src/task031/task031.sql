--https://www.codewars.com/kata/593ed37c93350098d600001d/train/sql

create table if not exists companies
(
    id int,
    ceo varchar(256),
    motto varchar(256),
    employees int,
);

insert into companies(id, ceo, motto, employees)
values (1, 'Kennith Brekke', 'maximize wireless content', 98446),
       (2, 'Debora Sporer PhD', 'maximize wireless content', 9477),
       (3, 'Elaine Collier V', 'integrate rich eyeballs', 1112),
       (4, 'Susannah Dietrich CPA', 'generate turn-key schemas', 6677),
       (5, 'Jolanda Stanton', 'whiteboard one-to-one functionalities', 4678),
       (6, 'Hung Hammes', 'maximize wireless content', 59209),
       (7, 'Saul Anderson', 'deploy seamless convergence', 86606);

SELECT
    id, ceo, motto, employees
FROM
    companies
ORDER BY
    employees DESC;
