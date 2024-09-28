-- https://www.codewars.com/kata/64536dc25d1ebb000fa7b9b3/train/sql
-- PostgreSQL

CREATE TABLE film
(
    film_id          integer   NOT NULL,
    title            varchar   NOT NULL,
    description      text      NOT NULL,
    release_year     integer   NOT NULL,
    language_id      integer   NOT NULL,
    rental_duration  integer   NOT NULL,
    rental_rate      numeric   NOT NULL,
    length           integer   NOT NULL,
    replacement_cost numeric   NOT NULL,
    rating           varchar   NOT NULL,
    last_update      timestamp NOT NULL,
    special_features text[]    NOT NULL
);


INSERT INTO film (film_id, title, description, release_year, language_id, rental_duration, rental_rate, length,
                  replacement_cost, rating, last_update, special_features)
VALUES (1, 'Adventure Movie', 'An exciting adventure film', 2023, 1, 3, 4.99, 120, 19.99, 'PG', '2023-08-26 12:00:00',
        ARRAY ['Trailers', 'Deleted Scenes']),
       (2, 'Comedy Blast', 'A hilarious comedy', 2023, 1, 5, 3.99, 95, 14.99, 'PG-13', '2023-08-26 12:00:00',
        ARRAY ['Trailers', 'Deleted Scenes']),
       (3, 'Drama Delight', 'A touching drama', 2023, 1, 4, 3.99, 110, 16.99, 'PG', '2023-08-26 12:00:00',
        ARRAY ['Behind the Scenes', 'Commentaries']);

SELECT film_id,
       title,
       special_features
FROM film
WHERE 'Deleted Scenes' = ANY (special_features)
  AND 'Trailers' = ANY (special_features)
  AND array_length(special_features, 1) = 2
ORDER BY title,
         film_id;
