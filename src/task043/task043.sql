#https://www.codewars.com/kata/594901ba44645fd7bd00005f/train/sql

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

SELECT BIT_LENGTH(name) + CHAR_LENGTH(race) AS calculation
FROM demographics;
