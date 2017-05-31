
-- ----------------------------
--  Table structure for `five_admin`
-- ----------------------------
DROP TABLE IF EXISTS `five_admin`;
CREATE TABLE `five_admin` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lasttime` int(10) unsigned NOT NULL,
  `lastip` varchar(20) NOT NULL,
  `encrypt` char(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `five_article`
-- ----------------------------
DROP TABLE IF EXISTS `five_article`;
CREATE TABLE `five_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `inputtime` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(100) NOT NULL,
  `updatetime` int(10) unsigned NOT NULL,
  `catid` mediumint(8) unsigned NOT NULL,
  `description` varchar(200) NOT NULL,
  `keywords` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `listorder` smallint(5) unsigned NOT NULL,
  `username` varchar(20) NOT NULL,
  `posids` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `five_article_data`
-- ----------------------------
DROP TABLE IF EXISTS `five_article_data`;
CREATE TABLE `five_article_data` (
  `id` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  `gallery` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `five_attachment`
-- ----------------------------
DROP TABLE IF EXISTS `five_attachment`;
CREATE TABLE `five_attachment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) NOT NULL,
  `filepath` varchar(200) NOT NULL,
  `fileext` varchar(10) NOT NULL,
  `filesize` int(10) NOT NULL,
  `inputtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `five_category`
-- ----------------------------
DROP TABLE IF EXISTS `five_category`;
CREATE TABLE `five_category` (
  `catid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `catname` varchar(30) NOT NULL,
  `pid` mediumint(8) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(100) NOT NULL,
  `listorder` smallint(5) unsigned NOT NULL,
  `category` varchar(100) NOT NULL,
  `list` varchar(100) NOT NULL,
  `show` varchar(100) NOT NULL,
  `ispart` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ishidden` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `issend` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `keywords` varchar(100) NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `five_flink`
-- ----------------------------
DROP TABLE IF EXISTS `five_flink`;
CREATE TABLE `five_flink` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `url` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `listorder` smallint(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `five_guestbook`
-- ----------------------------
DROP TABLE IF EXISTS `five_guestbook`;
CREATE TABLE `five_guestbook` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `name` varchar(20) NOT NULL,
  `qq` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `replytime` int(10) unsigned NOT NULL,
  `replycontent` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `five_hits`
-- ----------------------------
DROP TABLE IF EXISTS `five_hits`;
CREATE TABLE `five_hits` (
  `hid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contentid` int(10) unsigned NOT NULL,
  `catid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `yesterdayviews` int(10) unsigned NOT NULL DEFAULT '0',
  `dayviews` int(10) unsigned NOT NULL DEFAULT '0',
  `weekviews` int(10) unsigned NOT NULL DEFAULT '0',
  `monthviews` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`hid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `five_position`
-- ----------------------------
DROP TABLE IF EXISTS `five_position`;
CREATE TABLE `five_position` (
  `posid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `catid` mediumint(8) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `listorder` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`posid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `five_position_data`
-- ----------------------------
DROP TABLE IF EXISTS `five_position_data`;
CREATE TABLE `five_position_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `posid` smallint(5) unsigned NOT NULL,
  `listorder` smallint(5) unsigned NOT NULL,
  `contentid` int(10) unsigned NOT NULL,
  `catid` mediumint(8) unsigned NOT NULL,
  `inputtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `five_system`
-- ----------------------------
DROP TABLE IF EXISTS `five_system`;
CREATE TABLE `five_system` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `isthumb` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `width` smallint(5) unsigned NOT NULL DEFAULT '320',
  `height` smallint(5) unsigned NOT NULL DEFAULT '240',
  `iswater` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `pwater` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `daypoint` smallint(5) unsigned NOT NULL DEFAULT '0',
  `addpoint` smallint(5) unsigned NOT NULL DEFAULT '0',
  `delpoint` smallint(5) unsigned NOT NULL DEFAULT '0',
  `regpoint` smallint(5) unsigned NOT NULL DEFAULT '0',
  `template` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `five_tag`
-- ----------------------------
DROP TABLE IF EXISTS `five_tag`;
CREATE TABLE `five_tag` (
  `tagid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(100) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `hits` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tagid`),
  KEY `keyword` (`tag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `five_tag_data`
-- ----------------------------
DROP TABLE IF EXISTS `five_tag_data`;
CREATE TABLE `five_tag_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tagid` int(10) unsigned NOT NULL DEFAULT '0',
  `contentid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tagid` (`tagid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `five_user`
-- ----------------------------
DROP TABLE IF EXISTS `five_user`;
CREATE TABLE `five_user` (
  `userid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `lasttime` int(10) unsigned NOT NULL,
  `money` int(10) unsigned NOT NULL,
  `email` varchar(50) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `encrypt` char(6) NOT NULL,
  `lastip` varchar(20) NOT NULL,
  `regip` varchar(20) NOT NULL,
  `regtime` int(10) unsigned NOT NULL,
  `point` int(10) unsigned NOT NULL DEFAULT '0',
  `groupid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `headpic` varchar(100) NOT NULL,
  `islock` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `five_user_group`
-- ----------------------------
DROP TABLE IF EXISTS `five_user_group`;
CREATE TABLE `five_user_group` (
  `groupid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `point` int(10) unsigned NOT NULL DEFAULT '0',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`groupid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `five_position` VALUES ('1','0','首页焦点图推荐','0'), ('2','0','首页头条推荐','0');
INSERT INTO `five_system` VALUES ('1','我的网站','我的网站','我的网站','1','320','240','0','0','20','5','5','500','default');
INSERT INTO `five_user_group` VALUES ('1','初级会员','1000','0'), ('2','中级会员','2000','0'), ('3','高级会员','3000','0');
