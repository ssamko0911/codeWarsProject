-- https://www.codewars.com/kata/53da3dbb4a5168369a0000fe

create table if not exists numbers
(
    number int
);

insert into numbers(number)
values (4),
       (7),
       (11),
       (15),
       (6),
       (0);

SELECT numbers.number,
       case when numbers.number % 2 = 0 then 'Even'
       else 'Odd' end
       AS is_even
from numbers;
