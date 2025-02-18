-- https://leetcode.com/problems/invalid-tweets/description/

CREATE TABLE tweets
(
    tweet_id           integer NOT NULL,
    content            varchar NOT NULL
);

INSERT INTO tweets (tweet_id, content)
VALUES (1, 'Let us Code '),
       (2, 'More than fifteen chars are here!'),
       (3, 'Blah, blah, blah ...');

SELECT
    tweet_id
FROM
    tweets
WHERE
    CHAR_LENGTH(content) > 15;
