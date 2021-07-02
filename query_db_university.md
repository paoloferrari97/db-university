## 1

SELECT \*
FROM `students`
WHERE `date_of_birth`
BETWEEN '1990-01-01'
AND '1990-12-31';

OPPURE

SELECT \*
FROM `students`
WHERE `date_of_birth` = '1990%';

## 2

SELECT \*
FROM `courses`
WHERE `cfu` > '10';
