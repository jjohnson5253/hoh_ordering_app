--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'Canned Fruit', 'CANFRUT', 'product-images/canned_fruit.jpg', 0),
(2, 'Canned Vegetables', 'CANVEGI', 'product-images/canned_vegetables.jpg', 0),
(3, 'Tuna', 'TUNA', 'product-images/canned_tuna.jpg', 0),
(4, 'Peanut Butter', 'PB', 'product-images/peanut_butter.jpg', 0),
(5, 'Chili', 'CHILI', 'product-images/canned_chili.jpg', 0),
(6, 'Pasta/Rice', 'PASTA', 'product-images/pasta.jpg', 0),
(7, 'Canned Soup', 'CANSOUP', 'product-images/canned_soup.jpg', 0),
(8, 'Snacks', 'SNACKS', 'product-images/fruit_snacks.jpg', 0),
(9, 'Bread', 'BREAD', 'product-images/bread.jpg', 0),
(10, 'Fresh Produce', 'PRODUCE', 'product-images/fresh_produce.jpg', 0);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;