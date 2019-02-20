USE classicmodels;

SELECT customers.customerName 
FROM customers INNER JOIN employees
ON employees.employeeNumber = customers.salesRepEmployeeNumber
WHERE employees.firstName = 'Gerard' AND employees.lastName = 'Hernandez';

