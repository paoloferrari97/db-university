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

## 3

SELECT \*
FROM `students`
WHERE `date_of_birth` < '1991%';

## 4

SELECT \*
FROM `courses`
WHERE `year` = '1'
AND `period` = 'I semestre';

## 5

SELECT \*
FROM `exams`
WHERE `date` = '2020-06-20'
AND `hour` >= '14%';
