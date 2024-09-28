#https://www.codewars.com/kata/594800ba6fb152624300006d/train/sql

CREATE TABLE demographics
(
    id       integer NOT NULL,
    name     varchar NOT NULL,
    birthday date    NOT NULL,
    race     varchar NOT NULL
);

INSERT INTO demographics (id, name, birthday, race)
VALUES (1, 'Serhii', '1994-10-27', 'European'),
       (2, 'Jack', '1984-11-01', 'Afro American'),
       (1, 'Moe', '1989-08-27', 'Caribbean Hawaiian');

SELECT id,
       name,
       birthday,
       LOWER(race) as race
FROM demographics;
