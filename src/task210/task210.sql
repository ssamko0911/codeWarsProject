-- https://www.codewars.com/kata/66acd927c487bb5f867a38c5/train/sql

CREATE TABLE applications
(
    application_id     INTEGER NOT NULL,
    application_status INTEGER NOT NULL
);

INSERT INTO applications(application_id, application_status)
values (1, 3),
       (2, 6),
       (3, 4),
       (4, 7),
       (5, 5),
       (6, 8),
       (7, 2),
       (8, 9);



SELECT 'Rejected'            as status_group,
       count(application_id) AS application_num
FROM applications
WHERE application_status <= 5

UNION ALL

SELECT 'Approved'            as status_group,
       count(application_id) AS application_num
FROM applications
WHERE application_status > 5
