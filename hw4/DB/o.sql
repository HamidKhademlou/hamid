USE classicmodels;

SELECT A.firstName, A.lastName, B.firstName AS boss_name, B.lastName AS boss_family
FROM employees AS A
INNER JOIN employees AS B ON A.reportsTo=B.employeeNumber;