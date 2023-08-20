

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_admin VALUES("1","admin","admin","2022-08-10 19:00:04");



CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `team_assigned` varchar(255) DEFAULT NULL,
  `hired_date` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT current_timestamp(),
  `project_id` varchar(11) DEFAULT NULL,
  `subproject_id` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_employee VALUES("1","Juana","Dela","Cruz","2022-08-13","test","Single","Team Leads","Team A","Aug 21, 2020","Hired","1","0000-00-00 00:00:00","1","27");
INSERT INTO tbl_employee VALUES("5","asdd","asd","asd","2022-08-13","asd","Single","Worker","Team A","2022-08-13","Hired","1","2022-08-13 15:15:06","1","27");
INSERT INTO tbl_employee VALUES("12","Test","test","test","1998-02-04","test address","Married","Construction Worker","Test Teams","2022-08-27","Hired","1","2022-08-27 18:02:19","1","26");



CREATE TABLE `tbl_materials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subproject_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_materials VALUES("1","26","Concrete Cement","Lafarge","60 kgs","21","Active","1","2022-08-12 17:01:01");
INSERT INTO tbl_materials VALUES("8","28","asd","asd","asd","1","","1","2022-08-13 16:13:36");
INSERT INTO tbl_materials VALUES("9","29","test","test","test","1","","1","2022-08-25 10:46:27");
INSERT INTO tbl_materials VALUES("10","33","Cement","Sample","50 Kg","7","","1","2022-08-27 17:45:49");



CREATE TABLE `tbl_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_created` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_notes VALUES("41","Lorem ipsum dolor sit amet.","Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda consectetur at, nam vero tempore consequuntur.","1","Aug 11, 2022 08:16 am");
INSERT INTO tbl_notes VALUES("52","asd","asd","1","Aug 18, 2022 09:14 am");
INSERT INTO tbl_notes VALUES("53","asd","asd","1","Aug 25, 2022 04:43 am");
INSERT INTO tbl_notes VALUES("54","test","test","1","Aug 27, 2022 11:20 am");



CREATE TABLE `tbl_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_type` varchar(255) DEFAULT NULL,
  `project_name` text DEFAULT NULL,
  `client_name` text DEFAULT NULL,
  `client_contact` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `cost` float DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `team_assigned` varchar(255) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_projects VALUES("1","Residential","Twin House Project","Juan Dela Cruz","09999999999","Lokasyon","100000","2022-08-11","2022-08-12","Team A","1","2022-08-11 15:11:26","Active");
INSERT INTO tbl_projects VALUES("2","Residential","asd","asd","asd","asd","0","Aug 11, 2022","Aug 11, 2022","asd","1","2022-08-11 18:48:09","Active");
INSERT INTO tbl_projects VALUES("28","Industrial","Testing data","Testing client","09090909","Testing location","20000","Aug 27, 2022","Nov 27, 2022","Testing team","1","2022-08-27 17:36:07","Active");



CREATE TABLE `tbl_subprojects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `work_type` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `team_assigned` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `progress` int(255) DEFAULT NULL,
  `syy` int(255) DEFAULT NULL,
  `smm` int(255) DEFAULT NULL,
  `sdd` int(255) DEFAULT NULL,
  `eyy` int(255) DEFAULT NULL,
  `emm` int(255) DEFAULT NULL,
  `edd` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_subprojects VALUES("26","1","Floor","Aug 12, 2022","Sep 12, 2022","Team A","1","2022-08-12 15:49:14","20","2022","8","12","2022","9","12");
INSERT INTO tbl_subprojects VALUES("27","1","Wall","Aug 13, 2022","Sep 12, 2022","Team A","1","2022-08-12 16:33:52","20","2022","8","13","2022","9","12");
INSERT INTO tbl_subprojects VALUES("28","1","asd","Aug 13, 2022","Aug 13, 2022","asd","1","2022-08-13 16:13:10","1","2022","8","13","2022","8","13");
INSERT INTO tbl_subprojects VALUES("32","2","test","Aug 25, 2022","Sep 25, 2022","test","1","2022-08-25 10:47:18","20","2022","8","25","2022","9","25");
INSERT INTO tbl_subprojects VALUES("33","28","Test","Aug 27, 2022","Jan 27, 2023","Test Team","1","2022-08-27 17:41:35","20","2022","8","27","2023","1","27");
INSERT INTO tbl_subprojects VALUES("34","28","Wall","Aug 30, 2022","Oct 30, 2022","Team A","1","2022-08-30 12:51:21","0","2022","8","30","2022","10","30");

