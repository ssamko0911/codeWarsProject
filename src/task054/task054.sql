-- https://www.codewars.com/kata/59414360f5c3947364000070/train/sql

CREATE TABLE monsters
(
    id              integer NOT NULL,
    name            varchar NOT NULL,
    legs            varchar NOT NULL,
    arms            varchar NOT NULL,
    characteristics varchar NOT NULL
);

INSERT INTO monsters (id, name, legs, arms, characteristics)
VALUES (1, 'Fluffy', 'leggy legs', 'huge arms', 'mad, furious'),
       (2, 'Ugly', 'spider legs', 'crab claws', 'poisonous, crazy, stupid'),
       (3, 'Mic', 'no legs', 'no arms', 'head with sharp teeth');

SELECT REPEAT(name, 3)          as name,
       REVERSE(characteristics) as characteristics
FROM monsters;
