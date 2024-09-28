--https://www.codewars.com/kata/66c71c893759d440748154f8/train/sql

CREATE TABLE people
(
    id   integer NOT NULL PRIMARY KEY,
    name varchar NOT NULL
);

CREATE TABLE countries
(
    id   integer NOT NULL PRIMARY KEY,
    name varchar NOT NULL
);

CREATE TABLE visits
(
    id         integer NOT NULL PRIMARY KEY,
    person_id  integer NOT NULL REFERENCES people,
    country_id integer NOT NULL REFERENCES countries,
    year       integer NOT NULL
);

INSERT INTO people (id, name)
VALUES (1, 'Tim'),
       (2, 'Bob'),
       (3, 'Sally'),
       (4, 'Alex');

INSERT INTO countries (id, name)
VALUES (1, 'Great Britain'),
       (2, 'Spain'),
       (3, 'Argentina'),
       (4, 'Montenegro'),
       (5, 'Japan');

INSERT INTO visits (id, person_id, country_id, year)
VALUES (1, 1, 1, 2019),
       (2, 1, 4, 2024),
       (3, 2, 1, 2000),
       (4, 2, 2, 2010),
       (5, 2, 4, 2012),
       (6, 2, 4, 2022),
       (7, 2, 5, 2023),
       (8, 3, 4, 2021);

SELECT people.name,
       COUNT(DISTINCT visits.country_id) as countries_visited
FROM people
         LEFT JOIN
     visits
     ON
         people.id = visits.person_id
GROUP BY name
ORDER BY countries_visited DESC,
         name;
