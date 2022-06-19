DROP TABLE IF EXISTS academics;

CREATE TABLE `academics` (
  `academics_id` int(11) NOT NULL AUTO_INCREMENT,
  `academics` varchar(100) NOT NULL,
  `code` varchar(11) NOT NULL,
  `active` int(1) NOT NULL,
  `in_trash` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`academics_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

INSERT INTO academics VALUES("32","Sharia","","1","0");



DROP TABLE IF EXISTS account_movement;

CREATE TABLE `account_movement` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `Ban_id` int(15) NOT NULL,
  `mov_date` date NOT NULL,
  `Outbound` int(30) NOT NULL,
  `Incoming` int(30) NOT NULL,
  `parem` varchar(30) NOT NULL,
  `note` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=414 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS allowancetype;

CREATE TABLE `allowancetype` (
  `allowancetype_id` int(11) NOT NULL AUTO_INCREMENT,
  `allowancetype` varchar(50) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`allowancetype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS auth_pages;

CREATE TABLE `auth_pages` (
  `auth_id` int(11) NOT NULL AUTO_INCREMENT,
  `main_pages` varchar(200) NOT NULL,
  `sub_pages` longtext NOT NULL,
  `usrid` int(11) NOT NULL,
  PRIMARY KEY (`auth_id`),
  KEY `usrid` (`usrid`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf32;

INSERT INTO auth_pages VALUES("18","employees","emlev,emlevdelete,emlevupdate,empcontact,empdistribution,empexpe,empexpeadd,empexpedelete,empexpeupdate,empfiles,empfilesadd,empfilesdelete,empfilesupdate,empinfo,empinfoadd,empinfodelete,empinfoprint,empinfosec,empinfoupdate,empjobs,empjobsadd,empjobsdelete,empjobsupdate,empqual,empqualadd,empqualdelete,empqualupdate,emptracou,emptracouadd,emptracoudelete,emptracouupdate,emsections,emsectionsdelete,emsectionsupdate,index","14");
INSERT INTO auth_pages VALUES("19","finance","PaymentRes,PaymentReseadd,PaymentResedel,PaymentResedite,allowancetype,deductiontype,deletestuFee,deletetransfeedo,empdeductionprint,empfinance,emprepdebtprint,emprepsellaryprint,empsellarypaid,expense,expensess,expensetype,expensetypeadd,expensetypedelete,expensetypeupdate,feeinfoadd,feeinfodel,getempSellay,reports,stufeeclasstrando,updatepaidstufee","14");
INSERT INTO auth_pages VALUES("20","edulevel","add,delete,index,update","14");
INSERT INTO auth_pages VALUES("21","faculty","add,delete,update","14");
INSERT INTO auth_pages VALUES("22","user","delete,index,login,register,userrols,usrsectanddep","15");
INSERT INTO auth_pages VALUES("23","filemanager","delfile,index","15");
INSERT INTO auth_pages VALUES("26","edulevel","update","15");
INSERT INTO auth_pages VALUES("28","student","index","15");
INSERT INTO auth_pages VALUES("29","employees","emlevdelete,emsections","15");
INSERT INTO auth_pages VALUES("35","home","exchange,index","15");
INSERT INTO auth_pages VALUES("37","finance","expensetype","12");
INSERT INTO auth_pages VALUES("41","group","add,delete,update","13");
INSERT INTO auth_pages VALUES("42","employees","emlevdelete,emlevupdate,emsectionsdelete,emsectionsupdate","13");



DROP TABLE IF EXISTS auth_roles;

CREATE TABLE `auth_roles` (
  `auth_id` int(11) NOT NULL AUTO_INCREMENT,
  `usrid` int(11) DEFAULT NULL,
  `prog_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`auth_id`),
  KEY `usrid` (`usrid`) USING BTREE,
  KEY `prog_id` (`prog_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf32;

INSERT INTO auth_roles VALUES("102","14","49");
INSERT INTO auth_roles VALUES("103","14","50");
INSERT INTO auth_roles VALUES("104","14","51");
INSERT INTO auth_roles VALUES("105","13","48");
INSERT INTO auth_roles VALUES("106","15","49");
INSERT INTO auth_roles VALUES("107","15","50");
INSERT INTO auth_roles VALUES("108","15","51");
INSERT INTO auth_roles VALUES("110","15","71");
INSERT INTO auth_roles VALUES("111","15","72");
INSERT INTO auth_roles VALUES("112","11","53");
INSERT INTO auth_roles VALUES("113","11","70");
INSERT INTO auth_roles VALUES("114","11","54");
INSERT INTO auth_roles VALUES("115","15","0");
INSERT INTO auth_roles VALUES("117","15","54");
INSERT INTO auth_roles VALUES("118","15","88");
INSERT INTO auth_roles VALUES("119","16","89");
INSERT INTO auth_roles VALUES("120","17","89");
INSERT INTO auth_roles VALUES("121","16","93");
INSERT INTO auth_roles VALUES("122","15","100");



DROP TABLE IF EXISTS ban_info;

CREATE TABLE `ban_info` (
  `Ban_id` int(11) NOT NULL AUTO_INCREMENT,
  `Ban_name` varchar(100) NOT NULL,
  `Ban_num` int(60) NOT NULL,
  `Ban_date` date NOT NULL,
  `Ban_op_acc` int(30) NOT NULL,
  `Ban_active` int(3) NOT NULL,
  `in_trash` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`Ban_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS buyment;

CREATE TABLE `buyment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` int(11) NOT NULL,
  `stu_num` int(11) NOT NULL,
  `want` int(11) NOT NULL,
  `ammont` int(11) NOT NULL,
  `buy_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Department` int(11) NOT NULL,
  `Section` int(11) NOT NULL,
  `stuGroup` int(11) NOT NULL,
  `StuLevel` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS cou_lesson;

CREATE TABLE `cou_lesson` (
  `les_id` int(11) NOT NULL AUTO_INCREMENT,
  `cou_id` int(11) NOT NULL,
  `les_link` varchar(200) NOT NULL,
  PRIMARY KEY (`les_id`),
  KEY `cou_id` (`cou_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS courses;

CREATE TABLE `courses` (
  `cou_id` int(11) NOT NULL AUTO_INCREMENT,
  `cou_title` varchar(200) NOT NULL,
  `cou_startdate` date NOT NULL,
  `cou_enddate` date NOT NULL,
  `cou_status` int(2) NOT NULL,
  PRIMARY KEY (`cou_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS deductiontype;

CREATE TABLE `deductiontype` (
  `deductiontype_id` int(11) NOT NULL AUTO_INCREMENT,
  `deductiontype` varchar(50) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`deductiontype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS department;

CREATE TABLE `department` (
  `dep_id` int(7) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(30) NOT NULL,
  `active` varchar(10) NOT NULL,
  `in_trash` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`dep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

INSERT INTO department VALUES("42","morning","1","0");
INSERT INTO department VALUES("43","evening","1","0");
INSERT INTO department VALUES("44","Night","1","0");



DROP TABLE IF EXISTS edu_quali;

CREATE TABLE `edu_quali` (
  `Edu_id` int(11) NOT NULL AUTO_INCREMENT,
  `Edu_quali` varchar(200) NOT NULL,
  `Edu_year` date NOT NULL,
  `Edu_lang` varchar(100) NOT NULL,
  `Edu_Issuer` varchar(100) NOT NULL,
  `Stu_id` int(11) NOT NULL,
  PRIMARY KEY (`Edu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO edu_quali VALUES("10","Scientific high school","2022-06-01","Arabic","sdfvdv","4055");



DROP TABLE IF EXISTS edulevel;

CREATE TABLE `edulevel` (
  `edulev_id` int(11) NOT NULL AUTO_INCREMENT,
  `edulev_name` varchar(100) NOT NULL,
  `code` varchar(11) NOT NULL,
  `active` int(1) NOT NULL,
  `in_trash` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`edulev_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

INSERT INTO edulevel VALUES("6","Diploma before university
","C","1","0");
INSERT INTO edulevel VALUES("7","Bachelor
","B","1","0");
INSERT INTO edulevel VALUES("8","Masters","M","1","0");
INSERT INTO edulevel VALUES("9","PhD","Ph","1","0");
INSERT INTO edulevel VALUES("10","Higher Diploma","D","1","0");



DROP TABLE IF EXISTS em_lev;

CREATE TABLE `em_lev` (
  `em_lev_id` int(11) NOT NULL AUTO_INCREMENT,
  `em_lev_name` varchar(30) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`em_lev_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS em_sections;

CREATE TABLE `em_sections` (
  `em_sec_id` int(11) NOT NULL AUTO_INCREMENT,
  `em_sec_name` varchar(30) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`em_sec_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO em_sections VALUES("4","الحراسة","1");



DROP TABLE IF EXISTS emailset;

CREATE TABLE `emailset` (
  `em_Host` varchar(100) NOT NULL,
  `em_userName` varchar(100) NOT NULL,
  `em_userPass` varchar(100) NOT NULL,
  `em_SmtpSecure` varchar(100) NOT NULL,
  `em_Port` varchar(100) NOT NULL,
  `em_site` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO emailset VALUES("smtp.hostinger.com","info@gollis.xyz","Maxamuud12$%","TLS","587","info@gollis.xyz");



DROP TABLE IF EXISTS emp_allowance;

CREATE TABLE `emp_allowance` (
  `emp_allowance_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `action_month` varchar(200) NOT NULL,
  `allowancetype_id` int(11) NOT NULL,
  `emp_allowance_date` date NOT NULL,
  `emp_allowance_amount` int(11) NOT NULL,
  `acc_close` int(2) NOT NULL,
  `acc_close_date` date NOT NULL,
  PRIMARY KEY (`emp_allowance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS emp_debt;

CREATE TABLE `emp_debt` (
  `emp_debt_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `action_month` varchar(200) NOT NULL,
  `emp_debt_date` date NOT NULL,
  `emp_debt_amount` int(11) NOT NULL,
  `emp_debt_amount_buy` int(11) NOT NULL,
  `acc_close` int(2) NOT NULL,
  `acc_close_date` date NOT NULL,
  PRIMARY KEY (`emp_debt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS emp_deductiont;

CREATE TABLE `emp_deductiont` (
  `emp_deductiont_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `action_month` varchar(200) NOT NULL,
  `deductiontype_id` int(11) NOT NULL,
  `emp_deductiont_date` date NOT NULL,
  `emp_deductiont_amount` int(11) NOT NULL,
  `acc_close` int(2) NOT NULL,
  `acc_close_date` date NOT NULL,
  PRIMARY KEY (`emp_deductiont_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS emp_file;

CREATE TABLE `emp_file` (
  `emp_file_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `emp_file_title` varchar(200) NOT NULL,
  `emp_file_type` varchar(11) NOT NULL,
  `emp_file_link` varchar(200) NOT NULL,
  `emp_file_date` date NOT NULL,
  PRIMARY KEY (`emp_file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS emp_level;

CREATE TABLE `emp_level` (
  `emp_lev_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_lev_name` varchar(30) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`emp_lev_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS emp_qual;

CREATE TABLE `emp_qual` (
  `emp_qual_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `emp_qual_type` varchar(100) NOT NULL,
  `emp_qual_degree` varchar(100) NOT NULL,
  `emp_qual_year` date NOT NULL,
  `emp_qual_hand` varchar(50) NOT NULL,
  `emp_qual_lang` varchar(50) NOT NULL,
  `emp_qual_note` longtext NOT NULL,
  PRIMARY KEY (`emp_qual_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS emp_sellary;

CREATE TABLE `emp_sellary` (
  `empSellary_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `em_sec_id` int(11) NOT NULL,
  `em_lev_id` int(11) NOT NULL,
  `action_month` varchar(200) NOT NULL,
  `upDates` date NOT NULL,
  `emp_deductiont` int(200) NOT NULL,
  `emp_debt` int(200) NOT NULL,
  `emp_allowance` int(200) NOT NULL,
  `empSellary` int(11) NOT NULL,
  `empSellaryTake` int(200) NOT NULL,
  `acc_close` int(2) NOT NULL,
  `acc_close_date` date NOT NULL,
  PRIMARY KEY (`empSellary_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf32;




DROP TABLE IF EXISTS emp_sellary_paid;

CREATE TABLE `emp_sellary_paid` (
  `emp_sellary_paid_id` int(30) NOT NULL AUTO_INCREMENT,
  `action_month` varchar(200) NOT NULL,
  `empSellary_id` int(30) NOT NULL,
  `emp_sellary_paid_ampount` int(30) NOT NULL,
  `emp_sellary_paid_date` date NOT NULL,
  `acc_close` int(2) NOT NULL,
  `acc_close_date` date NOT NULL,
  PRIMARY KEY (`emp_sellary_paid_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf32;




DROP TABLE IF EXISTS empdistribution;

CREATE TABLE `empdistribution` (
  `empdistribution_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `prog_id` int(11) NOT NULL,
  PRIMARY KEY (`empdistribution_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf32;




DROP TABLE IF EXISTS empexpe;

CREATE TABLE `empexpe` (
  `empexpe_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(100) NOT NULL,
  `empexpe_est` varchar(100) NOT NULL,
  `empexpe_strdate` date NOT NULL,
  `empexpe_title` varchar(100) NOT NULL,
  `empexpe_degree` varchar(100) NOT NULL,
  `empexpe_levdate` date NOT NULL,
  `empexpe_note` longtext NOT NULL,
  PRIMARY KEY (`empexpe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS empinfo;

CREATE TABLE `empinfo` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(200) NOT NULL,
  `emp_gender` int(11) NOT NULL,
  `emp_DOB` date NOT NULL,
  `emp_POB` varchar(200) NOT NULL,
  `emp_nationality` varchar(200) NOT NULL,
  `emp_address` varchar(200) NOT NULL,
  `emp_phones` varchar(200) NOT NULL,
  `emp_email` varchar(200) NOT NULL,
  `emp_regDate` date NOT NULL,
  `emp_pic` varchar(100) NOT NULL,
  `emp_note` mediumtext NOT NULL,
  `emp_stustatus` int(11) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS empjobs;

CREATE TABLE `empjobs` (
  `empjob_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(100) NOT NULL,
  `empjob_title` varchar(200) NOT NULL,
  `em_sec_id` int(11) NOT NULL,
  `em_lev_id` int(11) NOT NULL,
  `empjob_strdate` date NOT NULL,
  `empjob_sellary` int(100) NOT NULL,
  `empjob_levdate` date NOT NULL,
  `empjob_note` longtext NOT NULL,
  PRIMARY KEY (`empjob_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS exam_reports;

CREATE TABLE `exam_reports` (
  `ex_repid` int(11) NOT NULL AUTO_INCREMENT,
  `prog_id` int(11) NOT NULL,
  `report` varchar(30) NOT NULL,
  PRIMARY KEY (`ex_repid`),
  KEY `prog_id` (`prog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf32;




DROP TABLE IF EXISTS exams;

CREATE TABLE `exams` (
  `ex_id` int(6) NOT NULL AUTO_INCREMENT,
  `stu_id` int(11) NOT NULL,
  `prog_id` int(7) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `sec_id` int(6) NOT NULL,
  `lev_id` int(6) NOT NULL,
  `grp_id` int(6) NOT NULL,
  `sub_id` int(6) NOT NULL,
  `ex_code` varchar(30) NOT NULL,
  `ex_crid` int(6) NOT NULL,
  `qu1` int(6) NOT NULL,
  `as1` int(6) NOT NULL,
  `ex1` int(6) NOT NULL,
  `qu2` int(6) NOT NULL,
  `as2` int(6) NOT NULL,
  `ex2` int(6) NOT NULL,
  `att` int(6) NOT NULL,
  `sub_gradPoint` int(11) NOT NULL,
  `sub_Point` int(11) NOT NULL,
  `ex_date` varchar(15) NOT NULL,
  PRIMARY KEY (`ex_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4024 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS expensess;

CREATE TABLE `expensess` (
  `expensess_id` int(11) NOT NULL AUTO_INCREMENT,
  `exptypeid` int(11) NOT NULL,
  `expensess_date` date NOT NULL,
  `expensess_amount` int(11) NOT NULL,
  `expensess_note` longtext NOT NULL,
  `acc_close` int(2) NOT NULL,
  `acc_close_date` date NOT NULL,
  PRIMARY KEY (`expensess_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS exptype;

CREATE TABLE `exptype` (
  `exptypeid` int(11) NOT NULL AUTO_INCREMENT,
  `exptype` varchar(30) NOT NULL,
  `active` int(11) NOT NULL,
  `in_trash` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`exptypeid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS faculty;

CREATE TABLE `faculty` (
  `fac_id` int(11) NOT NULL AUTO_INCREMENT,
  `fac_name` varchar(100) NOT NULL,
  `code` varchar(11) NOT NULL,
  `active` int(1) NOT NULL,
  `in_trash` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`fac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

INSERT INTO faculty VALUES("24","sharia & islamic studies","","1","0");



DROP TABLE IF EXISTS fee_trans;

CREATE TABLE `fee_trans` (
  `sta_id` int(11) NOT NULL AUTO_INCREMENT,
  `Invoice_id` int(11) NOT NULL,
  `payDate` date NOT NULL,
  `Discount` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `statment_num` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL,
  `acc_close` int(2) NOT NULL,
  `acc_close_date` date NOT NULL,
  `is_canceled` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`sta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=398 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS feeinfo;

CREATE TABLE `feeinfo` (
  `feeinfo_id` int(11) NOT NULL AUTO_INCREMENT,
  `Pay_Res_id` int(11) NOT NULL,
  `prog_id` int(11) NOT NULL,
  `fee_amount` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `in_trash` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`feeinfo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS groups;

CREATE TABLE `groups` (
  `grp_id` int(7) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(30) NOT NULL,
  `active` varchar(30) NOT NULL,
  `in_trash` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`grp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

INSERT INTO groups VALUES("35","Batch-2022","1","0");



DROP TABLE IF EXISTS levels;

CREATE TABLE `levels` (
  `lev_id` int(7) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(20) NOT NULL,
  `active` varchar(10) NOT NULL,
  `in_trash` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`lev_id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;

INSERT INTO levels VALUES("97","One","1","0");
INSERT INTO levels VALUES("98","Two","1","0");



DROP TABLE IF EXISTS page;

CREATE TABLE `page` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(30) NOT NULL,
  `page_content` mediumtext NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS paymentinfo;

CREATE TABLE `paymentinfo` (
  `Invoice_id` int(100) NOT NULL AUTO_INCREMENT,
  `lev_id` int(100) NOT NULL,
  `grp_id` int(200) NOT NULL,
  `sec_id` int(100) NOT NULL,
  `dep_id` int(100) NOT NULL,
  `prog_id` int(100) NOT NULL,
  `Pay_Res_id` int(100) NOT NULL,
  `stu_id` int(20) NOT NULL,
  `want` int(11) NOT NULL,
  `Discount` int(11) NOT NULL,
  `AccountStatuse` int(11) NOT NULL,
  `AccountClase` int(11) NOT NULL,
  `AccountOppDate` date NOT NULL,
  `upDates` date NOT NULL,
  PRIMARY KEY (`Invoice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2702 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS paymentres;

CREATE TABLE `paymentres` (
  `Pay_Res_id` int(11) NOT NULL AUTO_INCREMENT,
  `PaymentRes` varchar(100) NOT NULL,
  `active` int(11) NOT NULL,
  `in_trash` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`Pay_Res_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS programs;

CREATE TABLE `programs` (
  `prog_id` int(11) NOT NULL AUTO_INCREMENT,
  `edulev_id` int(11) NOT NULL,
  `fac_id` int(11) NOT NULL,
  `academics_id` int(11) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`prog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

INSERT INTO programs VALUES("102","7","24","32","1");



DROP TABLE IF EXISTS pwdrest;

CREATE TABLE `pwdrest` (
  `PwdRestId` int(11) NOT NULL AUTO_INCREMENT,
  `PwdRestEmail` varchar(100) NOT NULL,
  `PwdRestKey` longtext NOT NULL,
  `PwdRestExpirs` varchar(100) NOT NULL,
  PRIMARY KEY (`PwdRestId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS section;

CREATE TABLE `section` (
  `sec_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(30) NOT NULL,
  `active` varchar(10) NOT NULL,
  `in_trash` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`sec_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO section VALUES("4","Boys","1","0");
INSERT INTO section VALUES("5","Girls","1","0");



DROP TABLE IF EXISTS settings;

CREATE TABLE `settings` (
  `siteName` varchar(200) NOT NULL,
  `siteDisc` varchar(200) NOT NULL,
  `siteAddr` varchar(200) NOT NULL,
  `sitePhones` varchar(200) NOT NULL,
  `siteEmail` varchar(100) NOT NULL,
  `siteUrl` varchar(200) NOT NULL,
  `rel_site` varchar(100) NOT NULL,
  `siteLogo` text NOT NULL,
  `siteTags` mediumtext NOT NULL,
  `siteStatus` varchar(11) NOT NULL,
  `siteColsemsg` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO settings VALUES("جامعة جولس","بوصاصو - بونتلاند","26 يونيو- هرجيسا-مروديجيح- صوماليلاند","0633059608-0633000027","shariica@gmail.com","http://192.168.1.254:800/bosaso/","http://gushari.xyz/","Logo.jpg","university","1","عفوا، لكن البرنامج مغلق للتحديث، الرجاء التواصل مع الإدارة");



DROP TABLE IF EXISTS socialmedia;

CREATE TABLE `socialmedia` (
  `socialmedia_id` int(11) NOT NULL AUTO_INCREMENT,
  `socialmedia_name` varchar(200) NOT NULL,
  `socialmedia_link` varchar(200) NOT NULL,
  `socialmedia_logo` varchar(200) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`socialmedia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS strurel;

CREATE TABLE `strurel` (
  `Rel_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_id` int(11) NOT NULL,
  `rel_name` varchar(30) NOT NULL,
  `rel_type` varchar(30) NOT NULL,
  `rel_lev` varchar(30) NOT NULL,
  `rel_Address` mediumtext NOT NULL,
  `rel_email` varchar(50) NOT NULL,
  `rel_phones` varchar(50) NOT NULL,
  PRIMARY KEY (`Rel_id`),
  KEY `stu_id` (`stu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO strurel VALUES("7","4055","Maxamuud Xuseen","11","1","26 june","gadhyare3@gmail.com","634115346");



DROP TABLE IF EXISTS stu_acadimi;

CREATE TABLE `stu_acadimi` (
  `stu_ac_pro` int(11) NOT NULL AUTO_INCREMENT,
  `stu_id` int(100) NOT NULL,
  `prog_id` int(100) NOT NULL,
  `lev_id` int(100) NOT NULL,
  `grp_id` int(100) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `sec_id` int(11) NOT NULL,
  `reg_date` date NOT NULL,
  `Prog_Discount` varchar(11) NOT NULL,
  `statues` varchar(100) NOT NULL,
  PRIMARY KEY (`stu_ac_pro`)
) ENGINE=InnoDB AUTO_INCREMENT=4343 DEFAULT CHARSET=utf8;

INSERT INTO stu_acadimi VALUES("4342","4055","102","98","35","42","4","2022-06-01","023","4");



DROP TABLE IF EXISTS stu_info;

CREATE TABLE `stu_info` (
  `stu_id` int(11) NOT NULL AUTO_INCREMENT,
  `StuName` varchar(300) NOT NULL,
  `stu_num` varchar(100) NOT NULL,
  `mothername` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `reg_date` date NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `POB` varchar(100) NOT NULL,
  `Natinality` varchar(100) NOT NULL,
  `StuAddress` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `contry` varchar(100) NOT NULL,
  `Phones` varchar(100) NOT NULL,
  `stu_pic` varchar(100) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`stu_id`),
  KEY `StuName` (`StuName`,`stu_num`),
  KEY `gender` (`gender`)
) ENGINE=InnoDB AUTO_INCREMENT=4057 DEFAULT CHARSET=utf8;

INSERT INTO stu_info VALUES("4055"," إبراهيم آدم جامع","GU-30","","1","2022-05-23","","","","","","","","","0");
INSERT INTO stu_info VALUES("4056","","","","1","0000-00-00","","","","","","","","","0");



DROP TABLE IF EXISTS stu_info_chk;

CREATE TABLE `stu_info_chk` (
  `StuNum` varchar(100) NOT NULL,
  `StuName` varchar(300) NOT NULL,
  `mothername` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `POB` varchar(100) NOT NULL,
  `Natinality` varchar(100) NOT NULL,
  `StuAddress` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `contry` varchar(100) NOT NULL,
  `Phones` varchar(100) NOT NULL,
  `relname` varchar(100) NOT NULL,
  `reltype` varchar(100) NOT NULL,
  `reldigree` varchar(100) NOT NULL,
  `relphones` varchar(100) NOT NULL,
  `Ctype` varchar(100) NOT NULL,
  `CYear` varchar(100) NOT NULL,
  `Cschool` varchar(100) NOT NULL,
  `CLanuage` varchar(100) NOT NULL,
  `Department` int(11) NOT NULL,
  `Section` int(11) NOT NULL,
  `stuGroup` int(11) NOT NULL,
  `StuLevel` int(11) NOT NULL,
  `stu_pic` varchar(100) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS subject;

CREATE TABLE `subject` (
  `sub_id` int(6) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(100) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `prog_id` int(100) NOT NULL,
  `active` int(1) NOT NULL,
  `in_trash` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=586 DEFAULT CHARSET=utf8;

INSERT INTO subject VALUES("515","القرآن الكريم","القرآن 1","102","1","0");
INSERT INTO subject VALUES("516","العقيدة","العقيدة 1","102","1","0");
INSERT INTO subject VALUES("517","تاريخ التشريع","التشريع 1","102","1","0");
INSERT INTO subject VALUES("518","أصول الفقه","أصول 1","102","1","0");
INSERT INTO subject VALUES("519","النحو","النحو 1","102","1","0");
INSERT INTO subject VALUES("520","مصطلح الحديث","مصطلح 1","102","1","0");
INSERT INTO subject VALUES("521","مهارات اللغة العربية","مهارات 1","102","1","0");
INSERT INTO subject VALUES("522","السيرة","السيرة 1","102","1","0");
INSERT INTO subject VALUES("523","الفقه","الفقه 1","102","1","0");
INSERT INTO subject VALUES("524","القرآن الكريم","القرآن 2","102","1","0");
INSERT INTO subject VALUES("525","مهارات اللغة العربية","مهارات 2","102","1","0");
INSERT INTO subject VALUES("526","أصول الفقه","أصول 2","102","1","0");
INSERT INTO subject VALUES("527","تاريخ الخلفاء","تاريخ 1","102","1","0");
INSERT INTO subject VALUES("528","النحو","النحو 2","102","1","0");
INSERT INTO subject VALUES("529","العقيدة","العقيدة 2","102","1","0");
INSERT INTO subject VALUES("530","مصطلح الحديث","مصطلح 2","102","1","0");
INSERT INTO subject VALUES("531","اللغة الإنجليزية","الإنجليزية 1","102","1","0");
INSERT INTO subject VALUES("532","الفقه","الفقه 2","102","1","0");
INSERT INTO subject VALUES("533","القرآن الكريم","القرآن 3","102","1","0");
INSERT INTO subject VALUES("534","العقيدة","العقيدة 3","102","1","0");
INSERT INTO subject VALUES("535","النفسير وأصوله","التفسير 1","102","1","0");
INSERT INTO subject VALUES("536","اصول الفقه","أصول 3","102","1","0");
INSERT INTO subject VALUES("537","الحديث","الحديث 1","102","1","0");
INSERT INTO subject VALUES("538","مناهح البحث","البحث العلمي 1","102","1","0");
INSERT INTO subject VALUES("539","الفقه","الفقه 3","102","1","0");
INSERT INTO subject VALUES("540","النحو","النحو 3","102","1","0");
INSERT INTO subject VALUES("541","الحاسوب","الحاسوب 1","102","1","0");
INSERT INTO subject VALUES("542","القرآن الكريم","القرآن 4","102","1","0");
INSERT INTO subject VALUES("543","التفسير وأصوله","التفسير 2","102","1","0");
INSERT INTO subject VALUES("544","الحديث","الحديث 2","102","1","0");
INSERT INTO subject VALUES("545","أصول الفقه","أصول 4","102","1","0");
INSERT INTO subject VALUES("546","العقيدة","العقيدة 4","102","1","0");
INSERT INTO subject VALUES("547","الفقه","الفقه 3","102","1","0");
INSERT INTO subject VALUES("548","علوم القرآن","علوم 1","102","1","0");
INSERT INTO subject VALUES("549","النحو","النحو 4","102","1","0");
INSERT INTO subject VALUES("550","حاضر العالم الإسلامي","حاضر 1","102","1","0");
INSERT INTO subject VALUES("551","أصول الفقه","أصول 5","102","1","0");
INSERT INTO subject VALUES("552","الفقه","الفقه 5","102","1","0");
INSERT INTO subject VALUES("553","القواعد الفقهية","القواعد 1","102","1","0");
INSERT INTO subject VALUES("554","الفقه المقارن","المقارن 1","102","1","0");
INSERT INTO subject VALUES("555","الصرف","الصرف 1","102","1","0");
INSERT INTO subject VALUES("556","القرآن الكريم","القرآن 5","102","1","0");
INSERT INTO subject VALUES("557","الحديث","الحديث 3","102","1","0");
INSERT INTO subject VALUES("558","التفسير وأصوله","التفسير 3","102","1","0");
INSERT INTO subject VALUES("559","مقاصد الشريعة","مقاصد 1","102","1","0");
INSERT INTO subject VALUES("560","الفقه","الفقه 6","102","1","0");
INSERT INTO subject VALUES("561","أصول الفقه","أصول 6","102","1","0");
INSERT INTO subject VALUES("562","الحديث","الحديث 4","102","1","0");
INSERT INTO subject VALUES("563","القوعد الفقهية","القواعد 2","102","1","0");
INSERT INTO subject VALUES("564","التفسير وأصوله","التفسير 4","102","1","0");
INSERT INTO subject VALUES("565","البلاغة","البلاغة 1","102","1","0");
INSERT INTO subject VALUES("566","الفقه المقارن","المقارن 2","102","1","0");
INSERT INTO subject VALUES("567","القرآن الكريم ","القرآن 6","102","1","0");
INSERT INTO subject VALUES("568","قاعة البحث","قاعة 1","102","1","0");
INSERT INTO subject VALUES("569","الأديان والفرق","الفرق 1","102","1","0");
INSERT INTO subject VALUES("570","الفقه","الفقه 7","102","1","0");
INSERT INTO subject VALUES("571","الحديث","الحديث 5","102","1","0");
INSERT INTO subject VALUES("572","الفرائض","الفرائض 1","102","1","0");
INSERT INTO subject VALUES("573","التفسير وأصوله","التفسير 5","102","1","0");
INSERT INTO subject VALUES("574","اصول الفقه","أصول 7","102","1","0");
INSERT INTO subject VALUES("575","القرآن الكريم","القرآن 7","102","1","0");
INSERT INTO subject VALUES("576","الصرف","الصرف 2","102","1","0");
INSERT INTO subject VALUES("577","طرق التدريس","طرق 1","102","1","0");
INSERT INTO subject VALUES("578","الفقه","الفقه 8","102","1","0");
INSERT INTO subject VALUES("579","الفرائض","الفرائض 2","102","1","0");
INSERT INTO subject VALUES("580","أصول الفقه","أصول 8","102","1","0");
INSERT INTO subject VALUES("581","أصول الدعوة","الدعوة 1","102","1","0");
INSERT INTO subject VALUES("582","القرآن الكريم ","القرآن 8","102","1","0");
INSERT INTO subject VALUES("583","بحث التخرج ","البحث","102","1","0");
INSERT INTO subject VALUES("584","السياسة الشرعية","السياسة 1","102","1","0");
INSERT INTO subject VALUES("585","القضاء في الإسلام","القضاء 1","102","1","0");



DROP TABLE IF EXISTS subjectlevel;

CREATE TABLE `subjectlevel` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `subject_name` int(6) NOT NULL,
  `level_name` int(6) NOT NULL,
  `active` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS tem_examss;

CREATE TABLE `tem_examss` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `stu_num` mediumtext DEFAULT NULL,
  `qu1` int(6) DEFAULT NULL,
  `as1` int(6) DEFAULT NULL,
  `ex1` int(6) DEFAULT NULL,
  `qu2` int(6) DEFAULT NULL,
  `as2` int(6) DEFAULT NULL,
  `ex2` int(6) DEFAULT NULL,
  `att` int(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3465 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS todo;

CREATE TABLE `todo` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `topic` text NOT NULL,
  `user` int(5) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`user_id`)),
  `active` int(1) NOT NULL,
  `regDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS tra_cou;

CREATE TABLE `tra_cou` (
  `tra_cou_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `tra_cou_title` varchar(200) NOT NULL,
  `tra_cou_date` date NOT NULL,
  `tra_cou_est` varchar(200) NOT NULL,
  `tra_cou_due` varchar(100) NOT NULL,
  PRIMARY KEY (`tra_cou_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `usrid` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `reg_date` date NOT NULL,
  `role` varchar(100) NOT NULL,
  `lan_se` varchar(11) NOT NULL,
  `themeColor` varchar(30) NOT NULL DEFAULT '#344352',
  `active` varchar(11) NOT NULL,
  PRIMARY KEY (`usrid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

INSERT INTO users VALUES("11","admin","albayaan@gmail.com","$2y$10$QUrVwsrH.zprx8vNZdweteSQx9WCD5XuiVUG3HFoqHk4nAN19EkNC","0000-00-00","manager","ar","#544667","1");
INSERT INTO users VALUES("12","gadhyare","gadhyare4@gmail.com","202cb962ac59075b964b07152d234b70","2018-02-05","finance","ar","#344352","1");



