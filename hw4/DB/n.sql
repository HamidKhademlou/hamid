USE classicmodels;

SELECT products.productCode, products.productName, products.productLine, products.MSRP
FROM products
HAVING products.MSRP > (SELECT AVG(B.MSRP) FROM products AS B WHERE B.productLine=products.productLine GROUP BY B.productLine)
ORDER BY products.productLine DESC;