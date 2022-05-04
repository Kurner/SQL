SELECT * FROM school;

SELECT prenom FROM students;

SELECT prenom, datenaissance, school.school FROM students st INNER JOIN school ON st.school = idschool;

SELECT prenom FROM students WHERE genre = 'F';

SELECT prenom FROM students st INNER JOIN school ON st.school = idschool WHERE st.school = 'Addy';

SELECT prenom FROM students ORDER BY prenom DESC;

SELECT prenom FROM students ORDER BY prenom DESC LIMIT 2;

INSERT INTO students VALUES (0, 'Ginette', 'Dalor', '1930/01/01', 'F', 1);

UPDATE students SET genre = "M", prenom = "Omer" WHERE nom="Ginette";

DELETE FROM students WHERE idStudent = 3;

UPDATE school SET school = "Central" WHERE idschool=1;
UPDATE school SET school = "Anderlecht" WHERE idschool=2; 