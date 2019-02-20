USE classicmodels;

SELECT employees.lastName , employees.firstName , COUNT(customerNumber)
FROM customers INNER JOIN employees
ON employees.employeeNumber = customers.salesRepEmployeeNumber
GROUP BY employees.employeeNumber;

