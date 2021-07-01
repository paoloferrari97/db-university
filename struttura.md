# DB università

Modellizzare la struttura di una tabella per memorizzare tutti i dati riguardanti una università:

- sono presenti diversi dipartimenti, ciascuno con i propri corsi di laurea;
- ogni corso di laurea è formato da diversi corsi;
- ogni corso può essere tenuto da diversi insegnanti e prevede più appelli d'esame;
- ogni studente è iscritto ad un corso di laurea;
- per ogni appello d'esame a cui lo studente ha partecipato, è necessario memorizzare il voto ottenuto, anche se non sufficiente

## Nome tabella: dipartimenti

- id PRIMARY KEY AUTOINCREMENT NOTNULL UNIQUE
- nome VARCHAR(50) NOTNULL INDEX
- descrizione optional TEXT NULL

## Nome tabella: corsi_laurea

- id PRIMARY KEY AUTOINCREMENT NOTNULL UNIQUE
- id_dipartimenti FOREIGN KEY
- nome VARCHAR(50) NOTNULL INDEX
- descrizione optional TEXT NULL

## Nome tabella : corsi

- id PRIMARY KEY AUTOINCREMENT NOTNULL UNIQUE
- id_corsi_laurea FOREIGN KEY
- nome VARCHAR(50) NOTNULL INDEX
- descrizione optional TEXT NULL

## Nome tabella: insegnanti

- id PRIMARY KEY AUTOINCREMENT NOTNULL UNIQUE
- nome VARCHAR(50) NOTNULL INDEX
- cognome VARCHAR(50) NOTNULL INDEX
- data_nascita DATE NOTNULL

## Nome tabella: ponte_insegnanti_corsi

- id_corsi PRIMARY KEY FOREIGN KEY
- id_insegnanti PRIMARY KEY FOREIGN KEY

## Nome tabella: appelli_esami

- id PRIMARY KEY AUTOINCREMENT NOTNULL UNIQUE
- data DATETIME

## Nome tabella: ponte_appelli_esami_corsi

- id_corsi PRIMARY KEY FOREIGN KEY
- id_appelli_esami PRIMARY KEY FOREIGN KEY

## studenti

- id PRIMARY KEY AUTOINCREMENT NOTNULL UNIQUE
- id_corsi_laurea FOREIGN KEY
- nome VARCHAR(50) NOTNULL INDEX
- cognome VARCHAR(50) NOTNULL INDEX
- data_nascita DATE NOTNULL

## voti

- id_appelli FOREIGN KEY
- id_corsi FOREIGN KEY
- id_studenti FOREIGN KEY
- voto TINYINT
