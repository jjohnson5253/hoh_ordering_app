CREATE TABLE `tblusers` (
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `ethnicity` varchar(255) NOT NULL,
  `workstatus` varchar(255) NOT NULL,
  `veteran` varchar(255) NOT NULL,
  `publicassistance` varchar(255) NOT NULL,
  `hearabout` varchar(255) NOT NULL,
  `schoolenrolled` varchar(255) NOT NULL,
  `householdsize` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;