USE classicmodels;

SELECT orders.orderNumber, SUM(orderdetails.quantityOrdered)
FROM orders
INNER JOIN orderdetails ON orderdetails.orderNumber = orders.orderNumber
GROUP BY orders.orderNumber
ORDER BY orders.orderNumber;