-- https://www.codewars.com/kata/58111f4ee10b5301a7000175/train/sql

create table if not exists people
(
    id int,
    name varchar(256),
    age int
);

insert into people(id, name, age)
values (1, 'Serhii', 39),
       (2, 'Volodya', 29),
       (3, 'Jack', 29),
       (4, 'Lida', 29),
       (5, 'Katya', 29),
       (6, 'John', 18),
       (2, 'Chris', 18),
       (2, 'Ivan', 39);

SELECT age, COUNT(name) as people_count
FROM people
GROUP BY age;
