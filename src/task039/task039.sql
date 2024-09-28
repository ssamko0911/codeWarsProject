#https://www.codewars.com/kata/5910b0d378cc2ba91400000b/train/sql

CREATE TABLE students
(
    id               integer NOT NULL,
    age              integer NOT NULL,
    semester         integer NOT NULL,
    mentor           varchar NOT NULL,
    tuition_received boolean NOT NULL
);

INSERT INTO students (id, age, semester, mentor, tuition_received)
VALUES
    (1, 19, 2, 'John Doe', 1),
    (2, 18, 1, 'Joe Black', 0),
    (3, 18, 2, 'John Doe', 0),
    (4, 20, 1, 'Joe Black', 0);

SELECT
  *
FROM
    students
WHERE
    tuition_received = '0';
