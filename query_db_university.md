## 1

SELECT \*
FROM `students`
WHERE `date_of_birth`
BETWEEN '1990-01-01'
AND '1990-12-31';

OPPURE

SELECT \*
FROM `students`
WHERE `date_of_birth`
LIKE '1990%';

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

## 6

SELECT \*
FROM `degrees`
WHERE `name`
LIKE 'Corso di Laurea Magistrale%';

## 7

SELECT
COUNT(`id`)
AS 'numero_dipartimenti'
FROM `departments`;

## 8

SELECT \*
FROM `teachers`
WHERE `phone`
IS NULL;
