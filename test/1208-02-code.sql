
--SQL 參考

-- 通常不這樣用，選取範圍過大
SELECT * FROM `products` JOIN `categories`; 

--JOIN用法--兩張表交集部分的合併查詢(呈現:前後兩表並列顯示)
SELECT * FROM `products` JOIN `categories` ON `products`.`category_sid` = `categories`.`sid`;

--簡化及取新名稱代替寫法
SELECT `products`.*, `categories`.`name` FROM `products` JOIN `categories` ON `products`.`category_sid` = `categories`.`sid`;
SELECT p.*, c.`name` FROM `products` AS p JOIN `categories` AS c ON p.`category_sid` = c.`sid`;
SELECT p.*, c.`name` cate_name FROM `products` p JOIN `categories` c ON p.`category_sid` = c.`sid`;

--JOIN的種類
SELECT p.*, c.`name` cate_name FROM `products` p LEFT JOIN `categories` c ON p.`category_sid` = c.`sid`;
SELECT p.*, c.`name` cate_name FROM `categories` c LEFT OUTER JOIN `products` p ON p.`category_sid` = c.`sid`;
SELECT p.*, c.`name` cate_name FROM `categories` c JOIN `products` p ON p.`category_sid` = c.`sid`;

-- 模糊比對
SELECT * FROM `products` WHERE `author` LIKE '%陳%';
SELECT * FROM `products` WHERE `author` LIKE '%計%' OR `bookname` LIKE '%計%';
SELECT * FROM `products` WHERE `author` LIKE '%科技%' OR `bookname` LIKE '%科技%';

-- 設定範圍用IN、尋找後排序(一定要設範圍)
SELECT * FROM `products` WHERE `sid` IN (10,14,21,6);--由小排到大
SELECT * FROM `products` WHERE `sid` IN (10,14,21,6) ORDER BY sid DESC;--倒著排序
SELECT * FROM `products` WHERE `sid` IN (10,14,21,6) ORDER BY RAND();--隨機排序(一定要設範圍)

--查詢某筆訂單明細使用(=的指定用法)
SELECT d.*, p.bookname FROM `order_details` d JOIN `products` p ON
d.product_sid=p.sid WHERE d.`order_sid`=11;

-- COUNT + GROUP 的用法 GROUP指有相同值的欄位歸為同一個群組
SELECT `category_sid`, COUNT(*) num FROM `products` GROUP BY `category_sid`;
SELECT
p.`category_sid`,
COUNT(*) num,
c.name
FROM `products` p
JOIN `categories` c ON p.category_sid=c.sid
GROUP BY p.`category_sid`;

-- $today = date("Y-m-d H:i:s");
-- time()
-- strtotime()

-- 查詢訂單歷史紀錄
SELECT * FROM `orders` WHERE `order_date`>= '2017-04-01';
SELECT * FROM `orders`
WHERE `order_date`>= '2017-04-07'-- =可以不用加
AND `order_date` < '2017-04-08';

-- 2017-04-07 23:59:59
-- 查看某個會員的訂購記錄
SELECT *
FROM `orders` o
JOIN `order_details` d ON o.`sid`=d.`order_sid`
WHERE o.member_sid=1;
SELECT *
FROM `orders` o
JOIN `order_details` d ON o.`sid`=d.`order_sid`
WHERE o.member_sid=1 AND `order_date` > '2017-04-01';
SELECT *
FROM `orders` o
JOIN `order_details` d ON o.`sid`=d.`order_sid`
JOIN `products` p ON p.sid=d.product_sid
WHERE o.member_sid=1 AND `order_date` > '2017-04-01';
SELECT now(), now()+1, now()+7*24*60*60;