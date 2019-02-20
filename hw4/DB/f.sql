USE classicmodels;

SELECT offices.city, COUNT(customerNumber)
FROM employees
INNER JOIN customers ON employees.employeeNumber = customers.salesRepEmployeeNumber
INNER JOIN offices ON employees.officeCode = offices.officeCode
GROUP BY offices.officeCode;