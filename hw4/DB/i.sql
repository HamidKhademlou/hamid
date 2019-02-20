USE classicmodels;

SELECT products.productName, productlines.productLine
FROM products
INNER JOIN productlines ON productlines.productLine = products.productLine
ORDER BY productlines.productLine;