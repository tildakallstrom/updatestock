
--
-- Table `cart`
--

CREATE TABLE `cart` (
  `orderId` int(11) NOT NULL,
  `article1` int(11) NOT NULL,
  `article2` int(11) NOT NULL,
  `article3` int(11) NOT NULL,
  `article4` int(11) NOT NULL
);

--
-- Trigger `cart`
--

DELIMITER $$
CREATE TRIGGER `updateInStock1` AFTER INSERT ON `cart` FOR EACH ROW UPDATE shop SET inStock = 10 WHERE inStock = 0 AND articleId = 1
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateInStock3` AFTER INSERT ON `cart` FOR EACH ROW UPDATE shop SET inStock = inStock + 20 WHERE inStock < 20 AND articleId = 3
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateInStock4` AFTER INSERT ON `cart` FOR EACH ROW UPDATE shop 
SET shop.inStock = shop.instock + new.article4
WHERE shop.articleId = 4
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateInStock` AFTER INSERT ON `cart` FOR EACH ROW UPDATE shop SET shop.inStock = shop.inStock - new.article1 WHERE shop.articleId = 1
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateInStockB` AFTER INSERT ON `cart` FOR EACH ROW UPDATE shop SET shop.inStock = shop.inStock - new.article2 WHERE shop.articleId = 2
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateInStockC` AFTER INSERT ON `cart` FOR EACH ROW UPDATE shop SET shop.inStock = shop.inStock - new.article3 WHERE shop.articleId = 3
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateInStockD` AFTER INSERT ON `cart` FOR EACH ROW UPDATE shop SET shop.inStock = shop.inStock - new.article4 WHERE shop.articleId = 4
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table `shop`
--

CREATE TABLE `shop` (
  `articleId` int(11) NOT NULL,
  `inStock` int(11) NOT NULL
) ;

--
-- Add data to `shop`
--

INSERT INTO `shop` (`articleId`, `inStock`) VALUES
(1, 4),
(2, 2),
(3, 0),
(4, 1);


--
-- Index for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`orderId`);

--
-- Index for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`articleId`);


--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

