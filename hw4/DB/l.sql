USE classicmodels;

SELECT products.productLine, SUM(orderdetails.quantityOrdered * orderdetails.priceEach) AS Total_Price
FROM products
INNER JOIN orderdetails ON orderdetails.productCode = products.productCode
GROUP BY products.productLine
ORDER BY products.productLine;