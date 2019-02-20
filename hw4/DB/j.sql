USE classicmodels;

SELECT products.productName, SUM(orderdetails.quantityOrdered)
FROM products
INNER JOIN orderdetails ON orderdetails.productCode = products.productCode
GROUP BY orderdetails.productCode
ORDER BY orderdetails.productCode;