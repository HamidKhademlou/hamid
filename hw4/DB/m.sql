USE classicmodels;

SELECT products.productCode, products.productName, products.MSRP
FROM products
HAVING products.MSRP > (SELECT AVG(products.MSRP) FROM products)
ORDER BY products.MSRP DESC;