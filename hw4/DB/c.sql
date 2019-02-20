USE classicmodels;

SELECT employees.employeeNumber, employees.firstName, employees.lastName
FROM employees
WHERE employeeNumber NOT IN (SELECT A.reportsTo FROM employees AS A WHERE A.reportsTo IS NOT NULL GROUP BY A.reportsTo);
