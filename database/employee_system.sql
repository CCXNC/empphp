/*
MySQL Data Transfer
Source Host: localhost
Source Database: employee_system
Target Host: localhost
Target Database: employee_system
Date: 12/6/2019 2:05:08 PM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for employees
-- ----------------------------
CREATE TABLE `employees` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` int(10) NOT NULL,
  `address` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `telephone_no` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `manager_coor` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for users
-- ----------------------------
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  'first_name' varchar(200) NOT NULL,
  'last_name' varchar(200) NOT NULL,
  'email' varchar(200) NOT NULL,
  'age' int(11) NOT NULL,
  'address' varchar(200) NOT NULL,
  'zip_code' int(11) NOT NULL,
  'title' varchar(250) NOT NULL,
  'company' varchar(200) NOT NULL,
  'telephone_no' int(11) NOT NULL,
  'website' varchar(200) NOT NULL,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `employees` VALUES ('33', 'Jasmine Claire', 'Diaz', 'Jdmiranda@yahoo.com', '23', 'San Juan City Manila', '0000-00-00', '909090909', 'I.T dept.', 'Ms. Cecille Mendoza', 'Female');
INSERT INTO `employees` VALUES ('34', 'Keith Vincent', 'Pauso', 'kiethvincentpauso@yahoo.com', '30', 'San Juan City Manila', '0000-00-00', '909090909', 'I.T dept.', 'Ms. Cecille Mendoza', 'Male');
INSERT INTO `employees` VALUES ('35', 'Raffy', 'Tulfo', 'raffytulfo@gmail.com', '50', 'TV5', '1960-01-01', '55555', 'New Dept', 'Ben Tulfo', 'Male');
INSERT INTO `users` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3');
