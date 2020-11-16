-- 1 = scored
-- 2 = escalated
-- 3 = accepted
-- 4 = rejected
-- 5 = scored and flagged
-- 6 = reviewed and flagged

CREATE TABLE `users` (
 `userid` varchar(255),
 `type` char(50) DEFAULT 'entreprenuer',
 `first_name` char(50) NOT NULL,
 `last_name` char(50) NOT NULL,
 `dob` date NOT NULL,
 `gender` char(20) NOT NULL,
 `email` char(50) UNIQUE NOT NULL,
 `phone` varchar(50) UNIQUE NOT NULL,
 `phone2` varchar(50) DEFAULT NULL,
 `apply_for` varchar(50) DEFAULT NULL,
 `company_register` tinyint(1) DEFAULT 1,
 `created_on` datetime DEFAULT current_timestamp(),
 `score` decimal(3,2) DEFAULT NULL,
 `status` int(2) DEFAULT NULL,
 PRIMARY KEY (`userid`)
) ;

CREATE TABLE `profiles` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `userid` varchar(255) NOT NULL,
 `profile_brief` varchar(255) NOT NULL,
 PRIMARY KEY (`id`),
 KEY `userid` (`userid`),
 CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `company` (`userid`)
) ;

CREATE TABLE `history` (
 `userid` varchar(255) NOT NULL,
 `fy_year` int(4) DEFAULT 2020,
 `customer_count` int(11) NOT NULL,
 `average_billing` decimal(11,2) NOT NULL,
 `revenue` decimal(11,2) NOT NULL,
 `profit` decimal(11,2) NOT NULL,
 UNIQUE KEY `UC_history` (`userid`,`fy_year`)
) ;

CREATE TABLE `extras` (
 `userid` varchar(255) NOT NULL,
 `heard_from` varchar(255) DEFAULT NULL,
 `part` varchar(50) DEFAULT NULL,
 `hold` varchar(50) DEFAULT NULL,
 `why` varchar(255) DEFAULT NULL,
 PRIMARY KEY (`userid`),
 CONSTRAINT `extras_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`)
) 

CREATE TABLE `company` (
 `userid` varchar(255) NOT NULL,
 `company_name` varchar(50) NOT NULL,
 `nature` varchar(50) NOT NULL,
 `incorporated_on` date NOT NULL,
 `founders_count` int(2) NOT NULL,
 PRIMARY KEY (`userid`),
 CONSTRAINT `company_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`)
);

	
CREATE TABLE `business` (
 `userid` varchar(255) NOT NULL,
 `sector` char(50) NOT NULL,
 `category` char(50) NOT NULL,
 `idea` varchar(255) NOT NULL,
 `solution_to` varchar(255) DEFAULT NULL,
 `your_solution` varchar(255) DEFAULT NULL,
 `competitors` varchar(255) DEFAULT NULL,
 `last_funding` char(50) DEFAULT NULL,
 `revenue` varchar(225) DEFAULT NULL,
 `founder_invest` decimal(11, 2),
 `external_invest` decimal(11, 2),
 `kuberan_house` decimal(11,2) NOT NULL,
 `share` decimal(3,2) NOT NULL,
 PRIMARY KEY (`userid`),
 CONSTRAINT `business_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`)
);

CREATE TABLE `attachments` (
 `userid` varchar(255) NOT NULL,
 `pitch_deck` varchar(255) NOT NULL,
 `aadhar_img` varchar(255) DEFAULT NULL,
 `video` varchar(255) DEFAULT NULL,
 `img1` varchar(255) DEFAULT NULL,
 `img2` varchar(255) DEFAULT NULL,
 `img3` varchar(255) DEFAULT NULL,
 `img4` varchar(255) DEFAULT NULL,
 `img5` varchar(255) DEFAULT NULL,
 PRIMARY KEY (`userid`),
 CONSTRAINT `attachments_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`)
);

CREATE TABLE `score` (
 `userid` int(3) DEFAULT 0,
 `type` int(3) DEFAULT 0,
 `first_name` int(3) DEFAULT 0,
 `last_name` int(3) DEFAULT 0,
 `dob` int(3) DEFAULT 0,
 `gender` int(3) DEFAULT 0,
 `email` int(3) DEFAULT 0,
 `phone` int(3) DEFAULT 0,
 `phone2` int(3) DEFAULT 0,
 `apply_for` int(3) DEFAULT 0,
 `company_register` int(3) DEFAULT 0,
 `created_on` int(3) DEFAULT 0,
 `score` int(3) DEFAULT 0,
 `status` int(3) DEFAULT 0,
 `profile_brief` int(3) DEFAULT 0, 
 `heard_from` int(3) DEFAULT 0,
 `part` int(3) DEFAULT 0,
 `hold` int(3) DEFAULT 0,
 `why` int(3) DEFAULT 0,
 `company_name` int(3) DEFAULT 0,
 `nature` int(3) DEFAULT 0,
 `incorporated_on` int(3) DEFAULT 0,
 `founders_count` int(3) DEFAULT 0,
 `sector` int(3) DEFAULT 0,
 `category` int(3) DEFAULT 0,
 `idea` int(3) DEFAULT 0,
 `solution_to` int(3) DEFAULT 0,
 `your_solution` int(3) DEFAULT 0,
 `competitors` int(3) DEFAULT 0,
 `last_funding` int(3) DEFAULT 0,
 `revenue` int(3) DEFAULT 0,
 `founder_invest` int(3) DEFAULT 0,
 `external_invest` int(3) DEFAULT 0,
 `kuberan_house`int(3) DEFAULT 0,
 `share` int(3) DEFAULT 0,
 `pitch_deck` int(3) DEFAULT 0,
 `aadhar_img` int(3) DEFAULT 0,
 `video` int(3) DEFAULT 0,
 `images` int(3) DEFAULT 0
);

CREATE TABLE moderator ( userid int(11) PRIMARY key AUTO_INCREMENT, name CHAR(11) NOT NULL, email VARCHAR(255) unique NOT NULL, password VARCHAR(255) NOT NULL, sector CHAR(11) NOT NULL );

CREATE TABLE admin (id varchar(255) primary key, password varchar(255) not null);

create table assigned (
	userid varchar(255) primary key,
	moderator int(11) not null,
	FOREIGN KEY (`userid`) REFERENCES `users` (`userid`),
	FOREIGN KEY (`moderator`) REFERENCES `moderator` (`userid`)
);