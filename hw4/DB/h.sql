USE classicmodels;

SELECT orders.orderNumber, SUM(orderdetails.quantityOrdered * orderdetails.priceEach) AS Total_Price
FROM orders
INNER JOIN orderdetails ON orderdetails.orderNumber = orders.orderNumber
GROUP BY orders.orderNumber
ORDER BY orders.orderNumber;