USE classicmodels;
SELECT A.firstName, A.lastName, B.firstName AS Report_toB.lastName
FROM employees
INNER JOIN offices ON employees.officeCode=offices.officeCode

ORDER BY employees.lastName;
SELECT emp.firstname , empr.lastname
FROM employees AS emp INNER JOIN employees AS empr
ON emp.employeeNumber = empr.reportsTo;