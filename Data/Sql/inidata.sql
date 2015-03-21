# MySQL-Front 5.0  (Build 1.0)

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='NO_ENGINE_SUBSTITUTION' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;


# Host: localhost    Database: jxmb
# ------------------------------------------------------
# Server version 5.6.21

#
# Table structure for table think_contact
#

DROP TABLE IF EXISTS `think_contact`;
CREATE TABLE `think_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '姓名',
  `letter` varchar(50) NOT NULL DEFAULT '' COMMENT '拼音',
  `company` varchar(30) NOT NULL DEFAULT '' COMMENT '公司',
  `dept` varchar(20) NOT NULL DEFAULT '' COMMENT '部门',
  `position` varchar(20) NOT NULL DEFAULT '' COMMENT '职位',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '邮件',
  `office_tel` varchar(20) NOT NULL DEFAULT '' COMMENT '办公电话',
  `mobile_tel` varchar(20) NOT NULL DEFAULT '' COMMENT '移动电话',
  `website` varchar(50) NOT NULL DEFAULT '' COMMENT '网站',
  `im` varchar(20) NOT NULL DEFAULT '' COMMENT '即时通讯',
  `address` varchar(50) NOT NULL DEFAULT '' COMMENT '地址',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `remark` text COMMENT '备注',
  `is_del` tinyint(3) NOT NULL DEFAULT '0' COMMENT '删除标记',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='think_user_info';
INSERT INTO `think_contact` VALUES (1,'张三','ZS','百度','新事业推进部','高级总监','zhangsan@baidu.com','1234-5678','','','','',1,'',0);
INSERT INTO `think_contact` VALUES (2,'李四','LS','腾讯','物联网事业部','副总裁','lisi@qq.com','1234-5678','','','','',1,'',0);
/*!40000 ALTER TABLE `think_contact` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_dept
#

DROP TABLE IF EXISTS `think_dept`;
CREATE TABLE `think_dept` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父级ID',
  `dept_no` varchar(20) NOT NULL DEFAULT '' COMMENT '部门编号',
  `dept_grade_id` int(11) NOT NULL DEFAULT '0' COMMENT '部门等级ID',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '名称',
  `short` varchar(20) NOT NULL DEFAULT '' COMMENT '简称',
  `sort` varchar(20) NOT NULL DEFAULT '' COMMENT '排序',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `is_del` tinyint(3) NOT NULL DEFAULT '0' COMMENT '删除标记',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
INSERT INTO `think_dept` VALUES (1,0,'JXSJQ',16,'江西省军区','省军区','','',0);
INSERT INTO `think_dept` VALUES (6,1,'GLB',18,'管理部','管理','2','',0);
INSERT INTO `think_dept` VALUES (8,1,'CWB',18,'财务部','财务','2','',0);
INSERT INTO `think_dept` VALUES (23,6,'HR',13,'人事科','人事','','',0);
INSERT INTO `think_dept` VALUES (24,6,'ZWK',13,'总务科','总务','','',0);
INSERT INTO `think_dept` VALUES (25,8,'KJK',13,'会计科','会计','','',0);
INSERT INTO `think_dept` VALUES (26,8,'JRK',13,'金融科','金融','','',0);
INSERT INTO `think_dept` VALUES (27,1,'XLB',16,'训练部','训练','3','',0);
/*!40000 ALTER TABLE `think_dept` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_dept_grade
#

DROP TABLE IF EXISTS `think_dept_grade`;
CREATE TABLE `think_dept_grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grade_no` varchar(10) NOT NULL DEFAULT '' COMMENT '部门级别编码',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '名称',
  `sort` varchar(10) NOT NULL DEFAULT '' COMMENT '排序',
  `is_del` tinyint(3) NOT NULL DEFAULT '0' COMMENT '删除标记',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
INSERT INTO `think_dept_grade` VALUES (13,'DG3','第三级','3',0);
INSERT INTO `think_dept_grade` VALUES (16,'DG1','第一级','1',0);
INSERT INTO `think_dept_grade` VALUES (18,'DG2','第二级','2',0);
/*!40000 ALTER TABLE `think_dept_grade` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_duty
#

DROP TABLE IF EXISTS `think_duty`;
CREATE TABLE `think_duty` (
  `id` smallint(3) NOT NULL AUTO_INCREMENT,
  `duty_no` varchar(20) NOT NULL DEFAULT '' COMMENT '职责编号',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '名称',
  `sort` varchar(20) NOT NULL DEFAULT '' COMMENT '排序',
  `is_del` tinyint(3) NOT NULL DEFAULT '0' COMMENT '删除标记',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
INSERT INTO `think_duty` VALUES (14,'P001','采购员','',0,'采购员');
INSERT INTO `think_duty` VALUES (15,'S001','业务员','',0,'');
INSERT INTO `think_duty` VALUES (16,'W001','文员','',0,'');
INSERT INTO `think_duty` VALUES (17,'TASK_ASSIGN','任务分配','',0,'');
INSERT INTO `think_duty` VALUES (18,'SHOW_LOG','日志查看','',0,'');
/*!40000 ALTER TABLE `think_duty` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_info
#

DROP TABLE IF EXISTS `think_info`;
CREATE TABLE `think_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_no` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `folder` int(11) NOT NULL DEFAULT '0',
  `is_sign` tinyint(3) DEFAULT '0',
  `is_public` tinyint(3) DEFAULT NULL,
  `scope_user_id` text,
  `scope_user_name` text,
  `add_file` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `dept_name` varchar(20) DEFAULT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `is_del` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40000 ALTER TABLE `think_info` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_info_scope
#

DROP TABLE IF EXISTS `think_info_scope`;
CREATE TABLE `think_info_scope` (
  `info_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  KEY `user_id` (`user_id`),
  KEY `info_id` (`info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `think_info_scope` VALUES (109,1);
INSERT INTO `think_info_scope` VALUES (109,42);
INSERT INTO `think_info_scope` VALUES (109,43);
INSERT INTO `think_info_scope` VALUES (109,44);
INSERT INTO `think_info_scope` VALUES (109,48);
INSERT INTO `think_info_scope` VALUES (109,49);
INSERT INTO `think_info_scope` VALUES (109,50);
INSERT INTO `think_info_scope` VALUES (109,51);
INSERT INTO `think_info_scope` VALUES (109,52);
INSERT INTO `think_info_scope` VALUES (109,55);
INSERT INTO `think_info_scope` VALUES (109,56);
INSERT INTO `think_info_scope` VALUES (109,57);
INSERT INTO `think_info_scope` VALUES (109,58);
INSERT INTO `think_info_scope` VALUES (109,59);
INSERT INTO `think_info_scope` VALUES (109,60);
INSERT INTO `think_info_scope` VALUES (109,61);
INSERT INTO `think_info_scope` VALUES (109,62);
INSERT INTO `think_info_scope` VALUES (109,65);
INSERT INTO `think_info_scope` VALUES (109,66);
INSERT INTO `think_info_scope` VALUES (109,67);
INSERT INTO `think_info_scope` VALUES (116,44);
INSERT INTO `think_info_scope` VALUES (116,67);
INSERT INTO `think_info_scope` VALUES (116,48);
INSERT INTO `think_info_scope` VALUES (116,42);
INSERT INTO `think_info_scope` VALUES (116,43);
INSERT INTO `think_info_scope` VALUES (116,49);
INSERT INTO `think_info_scope` VALUES (116,50);
INSERT INTO `think_info_scope` VALUES (116,51);
INSERT INTO `think_info_scope` VALUES (116,52);
INSERT INTO `think_info_scope` VALUES (116,55);
INSERT INTO `think_info_scope` VALUES (116,57);
INSERT INTO `think_info_scope` VALUES (116,58);
INSERT INTO `think_info_scope` VALUES (116,59);
INSERT INTO `think_info_scope` VALUES (116,60);
INSERT INTO `think_info_scope` VALUES (116,61);
INSERT INTO `think_info_scope` VALUES (116,56);
INSERT INTO `think_info_scope` VALUES (116,62);
INSERT INTO `think_info_scope` VALUES (116,1);
INSERT INTO `think_info_scope` VALUES (116,65);
INSERT INTO `think_info_scope` VALUES (116,66);
INSERT INTO `think_info_scope` VALUES (124,44);
INSERT INTO `think_info_scope` VALUES (124,67);
INSERT INTO `think_info_scope` VALUES (124,48);
INSERT INTO `think_info_scope` VALUES (124,42);
INSERT INTO `think_info_scope` VALUES (124,43);
INSERT INTO `think_info_scope` VALUES (124,49);
INSERT INTO `think_info_scope` VALUES (124,50);
INSERT INTO `think_info_scope` VALUES (124,51);
INSERT INTO `think_info_scope` VALUES (124,52);
INSERT INTO `think_info_scope` VALUES (124,55);
INSERT INTO `think_info_scope` VALUES (124,57);
INSERT INTO `think_info_scope` VALUES (124,58);
INSERT INTO `think_info_scope` VALUES (124,59);
INSERT INTO `think_info_scope` VALUES (124,60);
INSERT INTO `think_info_scope` VALUES (124,61);
INSERT INTO `think_info_scope` VALUES (124,56);
INSERT INTO `think_info_scope` VALUES (124,62);
INSERT INTO `think_info_scope` VALUES (124,1);
INSERT INTO `think_info_scope` VALUES (124,65);
INSERT INTO `think_info_scope` VALUES (124,66);
/*!40000 ALTER TABLE `think_info_scope` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_info_sign
#

DROP TABLE IF EXISTS `think_info_sign`;
CREATE TABLE `think_info_sign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_name` varchar(20) NOT NULL,
  `is_sign` tinyint(3) NOT NULL DEFAULT '0',
  `sign_time` int(11) unsigned DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `dept_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;
INSERT INTO `think_info_sign` VALUES (71,109,1,'管理员',1,1417533958,NULL,NULL);
INSERT INTO `think_info_sign` VALUES (72,124,1,'管理员',1,1422806114,1,'XX企业');
/*!40000 ALTER TABLE `think_info_sign` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_mail
#

DROP TABLE IF EXISTS `think_mail`;
CREATE TABLE `think_mail` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `folder` int(11) NOT NULL,
  `mid` varchar(200) DEFAULT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `add_file` varchar(200) DEFAULT NULL,
  `from` varchar(2000) DEFAULT NULL,
  `to` varchar(2000) DEFAULT NULL,
  `reply_to` varchar(2000) DEFAULT NULL,
  `cc` varchar(2000) DEFAULT NULL,
  `read` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `is_del` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mid` (`mid`),
  KEY `create_time` (`create_time`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
INSERT INTO `think_mail` VALUES (1,0,NULL,'1','',NULL,NULL,NULL,NULL,NULL,0,1,'管理员',1422796543,0,0);
/*!40000 ALTER TABLE `think_mail` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_mail_account
#

DROP TABLE IF EXISTS `think_mail_account`;
CREATE TABLE `think_mail_account` (
  `id` mediumint(6) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mail_name` varchar(50) NOT NULL,
  `pop3svr` varchar(50) NOT NULL,
  `smtpsvr` varchar(50) NOT NULL,
  `mail_id` varchar(50) NOT NULL,
  `mail_pwd` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='think_user_info';
INSERT INTO `think_mail_account` VALUES (1,'11','111','1','111','11','111');
/*!40000 ALTER TABLE `think_mail_account` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_mail_organize
#

DROP TABLE IF EXISTS `think_mail_organize`;
CREATE TABLE `think_mail_organize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `sender_check` int(11) NOT NULL,
  `sender_option` int(11) NOT NULL,
  `sender_key` varchar(50) NOT NULL,
  `domain_check` int(11) NOT NULL DEFAULT '0',
  `domain_option` int(11) NOT NULL,
  `domain_key` varchar(50) NOT NULL,
  `recever_check` int(11) NOT NULL,
  `recever_option` int(11) NOT NULL,
  `recever_key` varchar(50) NOT NULL,
  `title_check` int(11) NOT NULL,
  `title_option` int(11) NOT NULL,
  `title_key` varchar(50) NOT NULL,
  `to` int(11) NOT NULL,
  `is_del` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
INSERT INTO `think_mail_organize` VALUES (18,0,0,1,1,'XX',0,1,'',0,1,'',0,1,'',0,0);
INSERT INTO `think_mail_organize` VALUES (19,1,0,1,1,'1111',0,1,'',0,1,'',0,1,'',31,0);
/*!40000 ALTER TABLE `think_mail_organize` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_meet_attachment
#

DROP TABLE IF EXISTS `think_meet_attachment`;
CREATE TABLE `think_meet_attachment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(100) DEFAULT NULL,
  `local_file_name` varchar(200) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `meet_no` varchar(50) DEFAULT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file_type` char(10) DEFAULT NULL,
  `model_type` enum('FILESHARE','PRESENTATION') DEFAULT 'FILESHARE',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40000 ALTER TABLE `think_meet_attachment` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_meet_type
#

DROP TABLE IF EXISTS `think_meet_type`;
CREATE TABLE `think_meet_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type_no` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `sort` varchar(10) NOT NULL,
  `is_del` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
INSERT INTO `think_meet_type` VALUES (7,'1','支委会议','1',0);
INSERT INTO `think_meet_type` VALUES (8,'2','党小组会议','2',0);
INSERT INTO `think_meet_type` VALUES (9,'3','党员会议','3',0);
/*!40000 ALTER TABLE `think_meet_type` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_meeting
#

DROP TABLE IF EXISTS `think_meeting`;
CREATE TABLE `think_meeting` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `meet_no` varchar(50) DEFAULT NULL,
  `meet_name` varchar(50) DEFAULT NULL,
  `meet_type_id` int(11) DEFAULT NULL,
  `meet_pwd` varchar(200) DEFAULT NULL,
  `holder_id` int(11) DEFAULT NULL,
  `holder` varchar(100) DEFAULT NULL,
  `subject` varchar(5000) DEFAULT NULL,
  `join_user_id` text,
  `join_user_name` text,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `capacity` int(11) DEFAULT NULL,
  `is_allowed_guest` tinyint(1) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `summary` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
INSERT INTO `think_meeting` VALUES (22,'CS','测试会议',NULL,NULL,43,'民兵A/无职位','硕士','43,49,','民兵A/无职位|43;民兵B/无职位|49;','2015-02-24 17:10:00','2015-03-12 17:10:00',NULL,0,0,NULL);
INSERT INTO `think_meeting` VALUES (23,'CS','测试会议',8,NULL,0,'民兵A/无职位','但是大多数','1,43,49,','管理员/训练参谋|1;民兵A/无职位|43;民兵B/无职位|49;','2015-02-24 17:50:00','2015-03-11 02:50:00',NULL,0,0,NULL);
/*!40000 ALTER TABLE `think_meeting` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_meeting_user
#

DROP TABLE IF EXISTS `think_meeting_user`;
CREATE TABLE `think_meeting_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `meeting_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mrole` tinyint(3) unsigned DEFAULT '4',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=utf8;
INSERT INTO `think_meeting_user` VALUES (178,22,43,4);
INSERT INTO `think_meeting_user` VALUES (179,22,49,4);
INSERT INTO `think_meeting_user` VALUES (184,23,1,4);
INSERT INTO `think_meeting_user` VALUES (185,23,43,4);
INSERT INTO `think_meeting_user` VALUES (186,23,49,4);
/*!40000 ALTER TABLE `think_meeting_user` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_message
#

DROP TABLE IF EXISTS `think_message`;
CREATE TABLE `think_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `add_file` varchar(200) DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `sender_name` varchar(20) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `receiver_name` varchar(20) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `is_del` tinyint(3) DEFAULT '0',
  `is_read` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40000 ALTER TABLE `think_message` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_node
#

DROP TABLE IF EXISTS `think_node`;
CREATE TABLE `think_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `url` varchar(200) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `sub_folder` varchar(20) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `sort` varchar(20) DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `is_del` tinyint(3) NOT NULL DEFAULT '0',
  `badge_function` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`is_del`)
) ENGINE=InnoDB AUTO_INCREMENT=259 DEFAULT CHARSET=utf8;
INSERT INTO `think_node` VALUES (84,'管理','User/index','fa fa-cogs','','','999',0,0,NULL);
INSERT INTO `think_node` VALUES (91,'通讯录','Staff/index','fa fa-calendar bc-personal-schedule','','','9',198,0,'badge_sum');
INSERT INTO `think_node` VALUES (94,'职位','Position/index',NULL,NULL,'','',1,0,NULL);
INSERT INTO `think_node` VALUES (110,'单位信息管理','','','','','1',84,0,'');
INSERT INTO `think_node` VALUES (112,'权限管理','',NULL,NULL,'','3',84,0,NULL);
INSERT INTO `think_node` VALUES (113,'系统设定','',NULL,NULL,'','4',84,0,NULL);
INSERT INTO `think_node` VALUES (114,'系统参数设置','SystemConfig/index','','','','1',113,0,NULL);
INSERT INTO `think_node` VALUES (115,'组织图','Dept/index','','','','1',110,0,NULL);
INSERT INTO `think_node` VALUES (116,'人员登记','User/index','','','','5',110,0,'');
INSERT INTO `think_node` VALUES (118,'权限组管理','Role/index','','','','1',112,0,NULL);
INSERT INTO `think_node` VALUES (119,'权限设置','Role/node','','','','2',112,0,NULL);
INSERT INTO `think_node` VALUES (120,'权限分配','Role/user','','','','3',112,0,NULL);
INSERT INTO `think_node` VALUES (121,'菜单管理','Node/index','','','','1',113,0,NULL);
INSERT INTO `think_node` VALUES (122,'职级','Rank/index',NULL,'','','3',110,0,NULL);
INSERT INTO `think_node` VALUES (123,'职位','Position/index',NULL,'','','2',110,0,NULL);
INSERT INTO `think_node` VALUES (125,'联系人','Contact/index','','','','1',198,0,NULL);
INSERT INTO `think_node` VALUES (153,'部门级别','DeptGrade/index','','','','4',110,0,NULL);
INSERT INTO `think_node` VALUES (191,'用户设置','','','','','',198,0,NULL);
INSERT INTO `think_node` VALUES (192,'用户资料','Profile/index','','','','',191,0,NULL);
INSERT INTO `think_node` VALUES (193,'修改密码','Profile/password','','','','',191,0,NULL);
INSERT INTO `think_node` VALUES (198,'个人','Contact/index','fa fa-user bc-personal','','','8',0,0,'badge_sum');
INSERT INTO `think_node` VALUES (205,'业务角色管理','Duty/index','','','','4',112,0,'');
INSERT INTO `think_node` VALUES (206,'业务权限分配','Role/duty','','','','5',112,0,'');
INSERT INTO `think_node` VALUES (226,'网上支部','Party/index','fa fa-pencil bc-flow','','','1',0,0,'badge_sum');
INSERT INTO `think_node` VALUES (227,'党员情况','PartyMember/index','fa fa-envelope-o bc-mail','','','1',226,0,'badge_sum');
INSERT INTO `think_node` VALUES (228,'党员心声','PartyMember/index','fa fa-envelope-o bc-mail','','','4',226,0,'badge_sum');
INSERT INTO `think_node` VALUES (229,'工作动态','PartyWork/index','fa fa-envelope-o bc-mail','','','3',226,0,'badge_sum');
INSERT INTO `think_node` VALUES (230,'议事大厅','','fa fa-envelope-o bc-mail','','','2',226,0,'badge_sum');
INSERT INTO `think_node` VALUES (231,'支委议事厅','Meeting/list_type?type=ZWHY','fa fa-envelope-o bc-mail','','','1',230,0,'badge_sum');
INSERT INTO `think_node` VALUES (232,'党小组议事厅','Meeting/list_type?type=DXZHY','fa fa-envelope-o bc-mail','','','2',230,0,'badge_sum');
INSERT INTO `think_node` VALUES (233,'党员议事厅','Meeting/list_type?type=DYHY','fa fa-envelope-o bc-mail','','','3',230,0,'badge_sum');
INSERT INTO `think_node` VALUES (234,'教育管理','EducationManager/index','fa fa-file-o','','','2',0,0,'badge_sum');
INSERT INTO `think_node` VALUES (235,'学习训练','StudyManager/index','fa fa-inbox','','','3',0,0,'badge_sum');
INSERT INTO `think_node` VALUES (236,'舆情报告','SentimentManager/index','fa fa-cloud','','','4',0,0,'badge_sum');
INSERT INTO `think_node` VALUES (237,'日常办公','OfficeManager/index','fa fa-book','','','5',0,0,'badge_sum');
INSERT INTO `think_node` VALUES (238,'组织指挥','CommandManager/index','fa fa-envelope-o bc-mail','','','6',0,0,'badge_sum');
INSERT INTO `think_node` VALUES (239,'人员管理','PeopleManager/index','fa fa-envelope-o bc-mail','','','1',234,0,'badge_sum');
INSERT INTO `think_node` VALUES (240,'量化考评','PeopleManager/index','fa fa-envelope-o bc-mail','','','2',234,0,'badge_sum');
INSERT INTO `think_node` VALUES (241,'视频考评','PeopleManager/index','fa fa-envelope-o bc-mail','','','2',234,0,'badge_sum');
INSERT INTO `think_node` VALUES (242,'电子文库','DocumentManager/index','fa fa-envelope-o bc-mail','','','1',235,0,'badge_sum');
INSERT INTO `think_node` VALUES (243,'政治教育','DocumentManager/index','fa fa-envelope-o bc-mail','','','2',235,0,'badge_sum');
INSERT INTO `think_node` VALUES (244,'网络课堂','DocumentManager/index','fa fa-envelope-o bc-mail','','','3',235,0,'badge_sum');
INSERT INTO `think_node` VALUES (245,'舆情上报','SentimentManager/index','fa fa-envelope-o bc-mail','','','1',236,0,'badge_sum');
INSERT INTO `think_node` VALUES (246,'舆情查询','SentimentManager/index','fa fa-envelope-o bc-mail','','','2',236,0,'badge_sum');
INSERT INTO `think_node` VALUES (247,'网络硬盘','OfficeManager/index','fa fa-envelope-o bc-mail','','','1',237,0,'badge_sum');
INSERT INTO `think_node` VALUES (248,'信息发布','','fa fa-envelope-o bc-mail','','','2',237,0,'badge_sum');
INSERT INTO `think_node` VALUES (249,'文典传输','OfficeManager/index','fa fa-envelope-o bc-mail','','','3',237,0,'badge_sum');
INSERT INTO `think_node` VALUES (250,'指令下达','CommandManager/index','fa fa-envelope-o bc-mail','','','1',238,0,'badge_sum');
INSERT INTO `think_node` VALUES (251,'指令反馈','CommandManager/index','fa fa-envelope-o bc-mail','','','2',238,0,'badge_sum');
INSERT INTO `think_node` VALUES (252,'会议管理','','','','','2',84,0,'');
INSERT INTO `think_node` VALUES (253,'信息搜索','Info/index','fa fa-envelope-o bc-mail','','','1',248,0,'badge_sum');
INSERT INTO `think_node` VALUES (254,'我的信息','Info/my_info','fa fa-envelope-o bc-mail','','','B1',248,0,'badge_sum');
INSERT INTO `think_node` VALUES (255,'我的签收','Info/my_sign','fa fa-envelope-o bc-mail','','','B2',248,0,'badge_sum');
INSERT INTO `think_node` VALUES (256,'信息分类','Info/folder_manage','fa fa-envelope-o bc-mail','','','C1',248,0,'badge_sum');
INSERT INTO `think_node` VALUES (257,'会议列表','Meeting/index','','','','1',252,0,'');
INSERT INTO `think_node` VALUES (258,'类型管理','MeetType/index','','','','2',252,0,'');
/*!40000 ALTER TABLE `think_node` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_position
#

DROP TABLE IF EXISTS `think_position`;
CREATE TABLE `think_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_no` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `sort` varchar(10) NOT NULL,
  `is_del` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
INSERT INTO `think_position` VALUES (5,'01','训练参谋','1',0);
INSERT INTO `think_position` VALUES (8,'A1','司令员','0',0);
INSERT INTO `think_position` VALUES (9,'99','无职位','99',0);
/*!40000 ALTER TABLE `think_position` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_rank
#

DROP TABLE IF EXISTS `think_rank`;
CREATE TABLE `think_rank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rank_no` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `sort` varchar(10) NOT NULL,
  `is_del` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
INSERT INTO `think_rank` VALUES (1,'RG10','师','1',0);
INSERT INTO `think_rank` VALUES (2,'RG30','营','2',0);
INSERT INTO `think_rank` VALUES (3,'RG40','连','3',0);
INSERT INTO `think_rank` VALUES (4,'RG60','班','5',0);
INSERT INTO `think_rank` VALUES (5,'RG00','军','0',0);
INSERT INTO `think_rank` VALUES (6,'RG20','团','1',0);
INSERT INTO `think_rank` VALUES (7,'RG90','无级别','9',0);
/*!40000 ALTER TABLE `think_rank` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_role
#

DROP TABLE IF EXISTS `think_role`;
CREATE TABLE `think_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `pid` smallint(6) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `sort` varchar(20) DEFAULT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `is_del` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `parentId` (`pid`),
  KEY `ename` (`sort`),
  KEY `status` (`is_del`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
INSERT INTO `think_role` VALUES (1,'管理员',0,'','1',1208784792,1426870462,0);
INSERT INTO `think_role` VALUES (2,'基本权限',0,'','3',1215496283,1426870492,0);
INSERT INTO `think_role` VALUES (7,'领导',0,'','2',1254325787,1401288337,0);
/*!40000 ALTER TABLE `think_role` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_role_duty
#

DROP TABLE IF EXISTS `think_role_duty`;
CREATE TABLE `think_role_duty` (
  `role_id` smallint(6) unsigned NOT NULL,
  `duty_id` smallint(6) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `think_role_duty` VALUES (1,15);
INSERT INTO `think_role_duty` VALUES (7,14);
INSERT INTO `think_role_duty` VALUES (1,14);
INSERT INTO `think_role_duty` VALUES (7,15);
INSERT INTO `think_role_duty` VALUES (2,14);
INSERT INTO `think_role_duty` VALUES (2,15);
/*!40000 ALTER TABLE `think_role_duty` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_role_node
#

DROP TABLE IF EXISTS `think_role_node`;
CREATE TABLE `think_role_node` (
  `role_id` int(11) NOT NULL,
  `node_id` int(11) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `read` tinyint(1) DEFAULT NULL,
  `write` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `think_role_node` VALUES (2,136,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,135,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,94,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,97,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,98,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,99,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,69,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,6,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,2,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,7,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,131,1,1,1);
INSERT INTO `think_role_node` VALUES (1,130,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,133,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,132,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,135,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,136,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,117,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,134,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,103,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,133,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,130,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,134,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,132,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,103,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,103,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,109,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,117,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,117,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,117,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,117,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,103,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,109,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,117,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,117,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,163,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,170,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,164,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,155,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,154,1,1,1);
INSERT INTO `think_role_node` VALUES (1,111,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,168,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,162,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,166,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,161,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,171,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,165,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,174,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,172,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,173,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,160,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,175,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,176,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,167,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,128,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,225,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,226,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,227,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,230,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,231,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,232,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,233,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,229,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,228,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,234,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,239,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,240,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,241,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,235,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,242,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,243,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,244,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,236,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,245,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,237,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,247,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,248,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,249,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,238,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,251,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,198,1,1,1);
INSERT INTO `think_role_node` VALUES (2,191,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,193,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (2,192,1,1,1);
INSERT INTO `think_role_node` VALUES (2,125,1,1,1);
INSERT INTO `think_role_node` VALUES (2,91,1,1,1);
INSERT INTO `think_role_node` VALUES (7,226,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,227,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,230,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,231,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,232,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,233,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,229,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,228,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,234,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,239,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,240,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,241,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,235,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,242,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,243,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,244,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,236,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,245,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,246,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,237,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,247,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,248,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,249,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,238,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,250,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,251,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,198,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,191,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,193,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,192,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,125,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,91,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,84,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,110,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,115,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,123,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,122,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,153,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,116,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,252,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,112,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,118,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,119,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,120,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,205,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,206,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,113,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,121,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (7,114,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,226,1,1,1);
INSERT INTO `think_role_node` VALUES (1,227,1,1,1);
INSERT INTO `think_role_node` VALUES (1,230,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,231,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,232,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,233,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,229,1,1,1);
INSERT INTO `think_role_node` VALUES (1,228,1,1,1);
INSERT INTO `think_role_node` VALUES (1,234,1,1,1);
INSERT INTO `think_role_node` VALUES (1,239,1,1,1);
INSERT INTO `think_role_node` VALUES (1,240,1,1,1);
INSERT INTO `think_role_node` VALUES (1,241,1,1,1);
INSERT INTO `think_role_node` VALUES (1,235,1,1,1);
INSERT INTO `think_role_node` VALUES (1,242,1,1,1);
INSERT INTO `think_role_node` VALUES (1,243,1,1,1);
INSERT INTO `think_role_node` VALUES (1,244,1,1,1);
INSERT INTO `think_role_node` VALUES (1,236,1,1,1);
INSERT INTO `think_role_node` VALUES (1,245,1,1,1);
INSERT INTO `think_role_node` VALUES (1,246,1,1,1);
INSERT INTO `think_role_node` VALUES (1,237,1,1,1);
INSERT INTO `think_role_node` VALUES (1,247,1,1,1);
INSERT INTO `think_role_node` VALUES (1,248,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,253,1,1,1);
INSERT INTO `think_role_node` VALUES (1,254,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,255,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,256,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,249,1,1,1);
INSERT INTO `think_role_node` VALUES (1,238,1,1,1);
INSERT INTO `think_role_node` VALUES (1,250,1,1,1);
INSERT INTO `think_role_node` VALUES (1,251,1,1,1);
INSERT INTO `think_role_node` VALUES (1,198,1,1,1);
INSERT INTO `think_role_node` VALUES (1,191,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,192,1,1,1);
INSERT INTO `think_role_node` VALUES (1,193,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,125,1,1,1);
INSERT INTO `think_role_node` VALUES (1,91,1,1,1);
INSERT INTO `think_role_node` VALUES (1,84,1,1,1);
INSERT INTO `think_role_node` VALUES (1,110,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,115,1,1,1);
INSERT INTO `think_role_node` VALUES (1,123,1,1,1);
INSERT INTO `think_role_node` VALUES (1,122,1,1,1);
INSERT INTO `think_role_node` VALUES (1,153,1,1,1);
INSERT INTO `think_role_node` VALUES (1,116,1,1,1);
INSERT INTO `think_role_node` VALUES (1,252,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,257,1,1,1);
INSERT INTO `think_role_node` VALUES (1,258,1,1,1);
INSERT INTO `think_role_node` VALUES (1,112,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,118,1,1,1);
INSERT INTO `think_role_node` VALUES (1,119,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,120,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,205,1,1,1);
INSERT INTO `think_role_node` VALUES (1,206,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,113,NULL,NULL,NULL);
INSERT INTO `think_role_node` VALUES (1,121,1,1,1);
INSERT INTO `think_role_node` VALUES (1,114,1,1,1);
/*!40000 ALTER TABLE `think_role_node` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_role_user
#

DROP TABLE IF EXISTS `think_role_user`;
CREATE TABLE `think_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `think_role_user` VALUES (1,'1');
INSERT INTO `think_role_user` VALUES (2,'44');
INSERT INTO `think_role_user` VALUES (7,'44');
INSERT INTO `think_role_user` VALUES (7,'48');
INSERT INTO `think_role_user` VALUES (2,'43');
INSERT INTO `think_role_user` VALUES (2,'49');
/*!40000 ALTER TABLE `think_role_user` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_system_config
#

DROP TABLE IF EXISTS `think_system_config`;
CREATE TABLE `think_system_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `val` varchar(255) DEFAULT NULL,
  `is_del` tinyint(3) NOT NULL DEFAULT '0',
  `sort` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
INSERT INTO `think_system_config` VALUES (1,'SYSTEM_NAME','系统名称','网络民兵指挥管理系统',1,'');
INSERT INTO `think_system_config` VALUES (7,'UPLOAD_FILE_TYPE','上传文件类型','doc,docx,xls,xlsx,ppt,pptx,pdf,gif,png,tif,zip,rar,jpg,jpeg,txt',0,NULL);
INSERT INTO `think_system_config` VALUES (8,'IS_VERIFY_CODE','验证码','0',0,NULL);
INSERT INTO `think_system_config` VALUES (19,'MEET_TYPE_ZWHY','支委会议','7',0,'');
INSERT INTO `think_system_config` VALUES (20,'MEET_TYPE_DXZHY ','党小组会议','8',0,'');
INSERT INTO `think_system_config` VALUES (21,'MEET_TYPE_DYHY ','党员会议','9',0,'');
/*!40000 ALTER TABLE `think_system_config` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_system_folder
#

DROP TABLE IF EXISTS `think_system_folder`;
CREATE TABLE `think_system_folder` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `controller` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `admin` varchar(200) NOT NULL,
  `write` varchar(200) NOT NULL,
  `read` varchar(200) NOT NULL,
  `sort` varchar(20) NOT NULL,
  `is_del` tinyint(3) NOT NULL DEFAULT '0',
  `remark` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='信息功能中使用';
/*!40000 ALTER TABLE `think_system_folder` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_system_tag
#

DROP TABLE IF EXISTS `think_system_tag`;
CREATE TABLE `think_system_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `controller` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sort` varchar(20) NOT NULL,
  `remark` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;
/*!40000 ALTER TABLE `think_system_tag` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_system_tag_data
#

DROP TABLE IF EXISTS `think_system_tag_data`;
CREATE TABLE `think_system_tag_data` (
  `row_id` int(11) NOT NULL DEFAULT '0',
  `tag_id` int(11) NOT NULL DEFAULT '0',
  `controller` varchar(20) NOT NULL DEFAULT '',
  KEY `row_id` (`row_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40000 ALTER TABLE `think_system_tag_data` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_user
#

DROP TABLE IF EXISTS `think_user`;
CREATE TABLE `think_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `emp_no` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(20) NOT NULL,
  `letter` varchar(10) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `rank_id` int(11) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `birthday` date DEFAULT NULL,
  `last_login_ip` varchar(40) DEFAULT NULL,
  `login_count` int(8) DEFAULT NULL,
  `pic` varchar(200) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `duty` varchar(2000) NOT NULL,
  `office_tel` varchar(20) NOT NULL,
  `mobile_tel` varchar(20) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `is_del` tinyint(3) NOT NULL DEFAULT '0',
  `openid` varchar(50) DEFAULT NULL,
  `westatus` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`emp_no`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;
INSERT INTO `think_user` VALUES (1,'admin','管理员','GLY','21232f297a57a5a743894a0e4a801fc3',1,5,2,'male','2013-09-18','0.0.0.0',2864,'emp_pic/1.jpeg','','','5086-2222-2222','12123123',1222907803,1426871280,0,'1231512315123',1);
INSERT INTO `think_user` VALUES (41,'2002','总监2002','ZJ','4ba29b9f9e5732ed33761840f4ba6c53',6,3,1,'male','2013-10-30','0.0.0.0',NULL,'','','行政，财务','','',1376896154,1407565312,1,NULL,1);
INSERT INTO `think_user` VALUES (43,'minbing001','民兵A','MBA','21232f297a57a5a743894a0e4a801fc3',27,9,4,'female','0000-00-00','0.0.0.0',NULL,'emp_pic/43.jpeg','','销售','','',1381035116,1426873682,0,NULL,1);
INSERT INTO `think_user` VALUES (44,'1001','首长','SC','b8c37e33defde51cf91e1e03e51657da',1,5,5,'male','0000-00-00','127.0.0.1',NULL,'emp_pic/44.jpeg','','全面管理','','138-1123-1234',1381502796,1426871395,0,NULL,1);
INSERT INTO `think_user` VALUES (48,'1003','团长','TC','aa68c75c4a77c87f97fb686b2f068676',6,5,1,'female','0000-00-00','0.0.0.0',NULL,'','','销售，运营','','',1381503490,1426871427,0,NULL,1);
INSERT INTO `think_user` VALUES (49,'minbing002','民兵B','MBB','21232f297a57a5a743894a0e4a801fc3',27,9,4,'female','2013-10-10','127.0.0.1',NULL,'','','','123','12312312',1391694170,1426873691,0,NULL,1);
/*!40000 ALTER TABLE `think_user` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_user_folder
#

DROP TABLE IF EXISTS `think_user_folder`;
CREATE TABLE `think_user_folder` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `controller` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sort` varchar(20) NOT NULL,
  `is_del` tinyint(3) NOT NULL DEFAULT '0',
  `remark` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='邮件功能中使用';
INSERT INTO `think_user_folder` VALUES (34,0,'Mail',1,'1','1',0,'');
INSERT INTO `think_user_folder` VALUES (35,0,'Mail',1,'2','2',0,'');
INSERT INTO `think_user_folder` VALUES (36,0,'Mail',1,'3','3',0,'');
/*!40000 ALTER TABLE `think_user_folder` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_user_tag
#

DROP TABLE IF EXISTS `think_user_tag`;
CREATE TABLE `think_user_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `controller` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sort` varchar(20) NOT NULL,
  `remark` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40000 ALTER TABLE `think_user_tag` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_user_tag_data
#

DROP TABLE IF EXISTS `think_user_tag_data`;
CREATE TABLE `think_user_tag_data` (
  `row_id` int(11) NOT NULL DEFAULT '0',
  `tag_id` int(11) NOT NULL DEFAULT '0',
  `controller` varchar(20) NOT NULL DEFAULT '',
  KEY `row_id` (`row_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40000 ALTER TABLE `think_user_tag_data` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table think_work_log
#

DROP TABLE IF EXISTS `think_work_log`;
CREATE TABLE `think_work_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_name` varchar(20) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `dept_name` varchar(20) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `content` text,
  `plan` text,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `is_del` tinyint(3) NOT NULL DEFAULT '0',
  `add_file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40000 ALTER TABLE `think_work_log` ENABLE KEYS */;
UNLOCK TABLES;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
