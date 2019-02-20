USE classicmodels;

SELECT A.firstName, A.lastName, B.firstName AS Report_to_firstname, B.lastName AS Report_to_lastname
FROM employees AS A
INNER JOIN employees AS B ON A.reportsTo=B.employeeNumber
ORDER BY A.lastName;
