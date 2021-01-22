
--從MySQL直接貼過來的資料須修改(原始檔)
INSERT INTO `address_book` (`sid`, `name`, `email`, `mobile`, `address`, `birthday`, `created_at`)
 VALUES (NULL, 'BIANCA', '33RFWFW3', '3R3R', '32R32R', '2020-12-01', '16:37:38');


--修改後再貼回去MySQL
--INSERT INTO指要新增資料
--PRIMARY空值會直接顯示1
--括弧外面須改為,
--最後一個要用;(可以不用)
--手動匯入，最多不要超過20筆
INSERT INTO `address_book` (`sid`, `name`, `email`, `mobile`, `address`, `birthday`, `created_at`) 
VALUES (NULL, 'Bianca2', 'hhgttt@gmail.com', '0922145875', '台北市中正區', '1990-01-01', '2020-12-08 10:35:31'),
 (NULL, 'Bianca3', 'hhgttt@gmail.com', '0922145875', '台北市中正區', '1990-01-01', '2020-12-08 10:35:31'),
 (NULL, 'Bianca4', 'hhgttt@gmail.com', '0922145875', '台北市中正區', '1990-01-01', '2020-12-08 10:35:31'),
 (NULL, 'Bianca5', 'hhgttt@gmail.com', '0922145875', '台北市中正區', '1990-01-01', '2020-12-08 10:35:31'),
 (NULL, 'Bianca6', 'hhgttt@gmail.com', '0922145875', '台北市中正區', '1990-01-01', '2020-12-08 10:35:31'),
 (NULL, 'Bianca7', 'hhgttt@gmail.com', '0922145875', '台北市中正區', '1990-01-01', '2020-12-08 10:35:31'),
 (NULL, 'Bianca8', 'hhgttt@gmail.com', '0922145875', '台北市中正區', '1990-01-01', '2020-12-08 10:35:31'),
 (NULL, 'Bianca9', 'hhgttt@gmail.com', '0922145875', '台北市中正區', '1990-01-01', '2020-12-08 10:35:31')
 