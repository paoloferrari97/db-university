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

OPPURE

SELECT \*
FROM `students`
WHERE YEAR(date_of_birth) = 1990;

## 2

SELECT \*
FROM `courses`
WHERE `cfu` > '10';

## 3

SELECT \*
FROM `students`
WHERE `date_of_birth` < '1991%';

OPPURE

SELECT \*
FROM `students`
WHERE YEAR(CURDATE()) - YEAR(date_of_birth) > 30;

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

OPPURE

SELECT \*
FROM `exams`
WHERE `date` = '2020-06-20'
AND HOUR(`hour`) >= 14;

## 6

SELECT \*
FROM `degrees`
WHERE `name`
LIKE 'Corso di Laurea Magistrale%'; //oppure solo '%Magistrale%'

OPPURE

SELECT \*
FROM `degrees`
WHERE `level` = 'magistrale';

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

OPPURE

SELECT
COUNT(\*)
AS 'teachers_without_phone'
FROM `teachers`
WHERE `phone`
IS NULL;

# GROUP BY

## 1

SELECT COUNT(`id`), YEAR(`enrolment_date`)
FROM `students`
GROUP BY YEAR(`enrolment_date`);

OPPURE

SELECT COUNT(`id`) as numero_studenti, YEAR(`enrolment_date`) AS `anno_di_iscrizione`
FROM `students`
GROUP BY `anno_di_iscrizione`;

## 2

SELECT COUNT(`id`) as `numero_insegnanti`, `office_address` AS `edificio_ufficio`
FROM `teachers`
GROUP BY `edificio_ufficio`;

## 3

SELECT ROUND(SUM(`vote`) / COUNT(`vote`)) AS `media_voti`, `exam_id` AS `appello_id`
FROM `exam_student`
GROUP BY `exam_id`;

## 4

SELECT `department_id` AS `dipartimento_id`, COUNT(`id`) AS `numero_corsi_di_laurea`
FROM `degrees`
GROUP BY `department_id`;
