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

OPPURE

SELECT ROUND(AVG(`vote`)) AS `media_voti`, `exam_id` AS `appello_id`
FROM `exam_student`
GROUP BY `exam_id`;

## 4

SELECT `department_id` AS `dipartimento_id`, COUNT(`id`) AS `numero_corsi_di_laurea`
FROM `degrees`
GROUP BY `department_id`;

# JOINS

## 1

SELECT \*
FROM `students`
JOIN `degrees`
ON `degrees`.`id` = `students`.`degree_id`
WHERE `degrees`.`name`
LIKE 'Corso di Laurea in Economia';

OPPURE

SELECT `students`.`id`, `students`.`name`, `students`.`surname`, `students`.`date_of_birth`, `students`.`fiscal_code`, `students`.`enrolment_date`, `students`.`registration_number`, `students`.`email`
FROM `students`
JOIN `degrees`
ON `degrees`.`id` = `students`.`degree_id`
WHERE `degrees`.`name`
LIKE 'Corso di Laurea in Economia';

## 2

SELECT `degrees`.`id`, `degrees`.`name`, `degrees`.`level`, `degrees`.`address`, `degrees`.`email`, `degrees`.`website`
FROM `degrees`
JOIN `departments`
ON `departments`.`id` = `degrees`.`department_id`
WHERE `departments`.`name`
LIKE 'Dipartimento di Neuroscienze';
// AND `degrees`.`level` = 'magistrale'

## 3

SELECT `courses`.`id`, `courses`.`name`, `courses`.`description`, `courses`.`period`, `courses`.`year`, `courses`.`cfu`, `courses`.`website`
FROM `courses`
JOIN `course_teacher`
ON `course_teacher`.`course_id` = `courses`.`id`
WHERE `course_teacher`.`teacher_id` = 44;

## 4

SELECT \*
FROM `degrees`
JOIN `departments`
ON `degrees`.`department_id` = `departments`.`id`
JOIN `students`
ON `degrees`.`id` = `students`.`degree_id`
ORDER BY `students`.`surname` ASC, `students`.`name` ASC;

## 5

SELECT \*
FROM `courses`
JOIN `degrees`
ON `courses`.`degree_id` = `degrees`.`id`
JOIN `course_teacher`
ON `course_teacher`.`course_id` = `courses`.`id`
JOIN `teachers`
ON `teachers`.`id` = `course_teacher`.`teacher_id`;

## 6

SELECT \*
FROM `teachers`
JOIN `course_teacher`
ON `course_teacher`.`teacher_id` = `teachers`.`id`
JOIN `courses`
ON `courses`.`id` = `course_teacher`.`course_id`
JOIN `degrees`
ON `degrees`.`id` = `courses`.`degree_id`
JOIN `departments`
ON `departments`.`id` = `degrees`.`department_id`
WHERE `departments`.`name` LIKE 'Dipartimento di Matematica';

## 7 (BONUS)

SELECT COUNT(`courses`.`name`) AS `tentativi`, `students`.`name` AS `student_name`, `students`.`surname` AS `student_surname` , `courses`.`name` AS `course_name`
FROM `exam_student`
JOIN `exams`
ON `exam_student`.`exam_id` = `exams`.`id`
JOIN `students`
ON `exam_student`.`student_id` = `students`.`id`
JOIN `courses`
ON `exams`.`course_id` = `courses`.`id`
GROUP BY `students`.`id`, `courses`.`name`;

OPPURE (con controllo < 18)

SELECT `students`.`name` AS `nome_studente`, `students`.`surname` AS `cognome_studente`, `courses`.`name` AS `nome_corso`, COUNT(`exams`.`id`) AS `tentativi`
FROM `courses`
JOIN `exams` ON `courses`.`id` = `exams`.`course_id`
JOIN `exam_student` ON `exams`.`id` = `exam_student`.`exam_id`
JOIN `students` ON `exam_student`.`student_id` = `students`.`id`
WHERE `exam_student`.`vote` < 18
GROUP BY `courses`.`id`, `students`.`id`;
