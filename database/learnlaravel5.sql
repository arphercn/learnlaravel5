/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : learnlaravel5

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-03-31 11:10:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES ('1', '未闻花名', '剧情介绍：\r\n从小时候起一直青梅竹马的6人，却在升上高中之后彼此有了距离。不太与人们接触的主角宿海仁太、有点被小太妹熏染的安城鸣子、进入重点高中的松雪集与鹤见知利子、放弃读高中而展开旅行的久川铁道、只有幼年死去的本间芽衣子（灵魂，只有仁太能看见）还是一如从前。有一天，芽衣子对仁太说：“帮我实现一个愿望吧”。仁太虽然有点为难，却还是答应帮助面码[1] 实现愿望。以此为契机，为了实现芽衣子的愿望，分散在各处的大家又再次地聚集在一起。', '1', '2016-11-26 16:22:29', '2016-11-27 14:12:14');
INSERT INTO `articles` VALUES ('2', '东京食尸鬼', '剧情介绍：\r\n在纷乱嘈杂的现代化城市——东京，蔓延着一种吞食人类的怪物，人们称之为喰种。他们外表与人几乎没有差异，但却只以人类为食，是人类的天敌。那一日，金木研——上井大学的一名普通学生——遇上了某位神秘女子神代利世小姐（实为喰种），进而卷入了一场精心策划的事故。自此，被改造为半人半喰种，一度感到孤独无助的他却被“古董”（动画版译作“安定区”）咖啡店的喰种收留，但好景不长，喰种组织“青铜树”很快找到了他并被带走承受酷刑，最终明白“软弱即是罪恶”，并决意变强，从此走上了另一条路', '1', '2016-11-26 16:22:29', '2016-11-27 14:12:55');
INSERT INTO `articles` VALUES ('3', '你好', '你好,这个arpher的文章了', '1', '2016-11-27 09:36:40', '2016-11-27 09:36:40');

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `article_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL COMMENT '归属节点',
  `item_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '归属节点类型',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES ('1', 'bearpher', 'bearpher@gmail.com', '', '楼主想说：心里扎进了一根刺，然后生根，发芽，开放在多年后的夏天。\r\n《未闻花名》的故事，简略的说，就是这样~ ', null, '1', '1', 'App\\Models\\Article', '2016-11-27 14:16:33', '2016-11-27 14:16:33');
INSERT INTO `comments` VALUES ('2', 'bearpher', 'bearpher@gmail.com', '', '楼主想说：每一个人都有一段故事\r\n每一个人都有不得已 \r\n每一个人都有想守护的东西\r\n\r\n\r\n没有绝对的坏人 也没有绝对的好人', null, '2', '2', 'App\\Models\\Video', '2016-11-27 14:17:23', '2016-11-27 14:17:23');
INSERT INTO `comments` VALUES ('3', 'bearpher', 'bearpher@gmail.com', null, '文章很棒!!', null, '3', '1', 'App\\Models\\Article', '2016-12-04 17:42:35', '2016-12-04 17:42:38');
INSERT INTO `comments` VALUES ('5', 'bbbb', 'bbbb@qq.com', '', 'bbbbbbbbbbbbbbbbbbbb', null, '1', null, null, '2017-02-20 02:04:12', '2017-02-20 02:04:12');

-- ----------------------------
-- Table structure for countries
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of countries
-- ----------------------------
INSERT INTO `countries` VALUES ('1', '中国', '2016-12-04 16:24:44', '2016-12-04 16:24:46');
INSERT INTO `countries` VALUES ('2', '美国', '2016-12-04 16:24:48', '2016-12-04 16:24:50');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2016_11_26_160814_create_article_table', '2');
INSERT INTO `migrations` VALUES ('2016_11_27_131108_create_comments_table', '3');
INSERT INTO `migrations` VALUES ('2016_12_04_124356_create_user_accounts_table', '4');
INSERT INTO `migrations` VALUES ('2016_12_04_171351_create_videos_table', '5');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', 'create-post', 'can create post', null, '2016-12-05 13:52:31', '2016-12-05 13:52:33');
INSERT INTO `permissions` VALUES ('2', 'edit-post', 'can edit post', '', '2016-12-05 13:52:31', '2016-12-05 13:52:33');
INSERT INTO `permissions` VALUES ('3', 'delete-post', 'can delete post', '', '2016-12-05 13:52:59', '2016-12-05 13:53:04');

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES ('1', '1', '1');
INSERT INTO `permission_role` VALUES ('2', '1', '2');
INSERT INTO `permission_role` VALUES ('3', '1', '3');
INSERT INTO `permission_role` VALUES ('4', '2', '1');
INSERT INTO `permission_role` VALUES ('5', '2', '2');

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) unsigned DEFAULT NULL,
  `views` int(11) unsigned DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('1', '向内走，寻找幸福', '美国作家梭罗说：“生命并不长，别再赶时间了”；\r\n向内走，寻找幸福　　人本主义心理学家马斯洛说：“人如果不能时刻倾听自己的心声，就无法明智选择人生的道路”；\r\n　　“苹果之父”乔布斯在斯坦福大学毕业典礼上演讲：“你的时间有限，不要让别人意见的嘈杂声淹没你自己内心的声音，勇敢的去追随自己的内心和直觉，它们从来都知道你真正会成为什么人”。', '1', '1', '300', '1', '2147483647', '1480825453', null);
INSERT INTO `posts` VALUES ('2', '往事煮酒', '我们都在学着去做一个成熟稳重的大人，遇到所有的事情都能做到不动声色，于是我们学会了掩饰和伪装，即使想哭也会笑着说出一些难过，用一种平淡或者遥远的语气，诉说着一件对别人不重要却对自己很刻骨铭心的事情。', '1', '2', '600', '1', '2147483647', '1480825453', null);
INSERT INTO `posts` VALUES ('3', '白狐之恋', '古寺，青灯，焚香袅袅，散去了千年的浅恨离殇。\r\n\r\n　　千年之前，是一只狐， 为你所救，得你悉心照顾，伴你寒窗苦读，终，迎来你的金榜题名，洞房花烛夜，我飘然离去。\r\n\r\n　　为你，我沦为江边那位笛的女子。浮萍掠影，以一曲音韵，乱了那韶华绚烂，烟火迷漓。', '2', '2', '500', '0', '2147483647', '1480825453', null);
INSERT INTO `posts` VALUES ('17', 'test 4', 'test content 4', '3', '1', '100', null, '1480826173', '1480826173', null);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'admin', 'The administrator of the site', '', '2016-12-04 15:38:10', '2016-12-04 15:38:13');
INSERT INTO `roles` VALUES ('2', 'editor', 'The editor of the site', '', '2016-12-04 15:38:20', '2016-12-04 15:38:23');
INSERT INTO `roles` VALUES ('3', 'writer', '', '', '2016-12-04 15:38:28', '2016-12-04 15:38:33');
INSERT INTO `roles` VALUES ('4', 'reader', '', '', '2016-12-04 15:38:37', '2016-12-04 15:38:39');

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES ('1', '1', '1');
INSERT INTO `role_user` VALUES ('2', '2', '2');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` tinyint(3) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'arpher', 'arpher@qq.com', '$2y$10$qe1pLn3Hbb7QZDBgtjL2qO9lIVoCeQjWjCBUZ0nXV2dKyU.JXk/E.', 'x9trFoG8xYs8sWkCVq15ZeiTteVlPMP8II8KjhBXAZJHQjx9ZlhitAm1JTx2', '1', '2016-11-26 16:01:50', '2017-02-06 09:41:48');
INSERT INTO `users` VALUES ('2', 'bbbb', 'bbbb@qq.com', '$2y$10$Nxm8JygW2HVmnvQCIne/E.hGsVbsYXMIXfr4GTGRTr0cVHVujMQKW', 'Cheb9XzldhAFBmMvChVXH2R63qRDAJgWqjFn0TGv3LyYsnM1AXVNrGu6dq7c', '2', '2016-12-01 23:26:09', '2016-12-04 22:49:49');
INSERT INTO `users` VALUES ('5', 'Laravel-Academy', 'laravelacademy@test.com', '123456', null, '2', null, null);
INSERT INTO `users` VALUES ('3', 'Laravel', 'laravel@test.com', '123456', null, '1', null, null);
INSERT INTO `users` VALUES ('4', 'Academy', 'academy@test.com', '123456', null, '2', null, null);
INSERT INTO `users` VALUES ('10', '201313488', '201313488@qq.com', '$2y$10$1J6XtiHaEsqgn.SpJsZrPOYgm1ibfWPf3TSAhgRlDL015A3iHuDo.', null, null, '2017-02-06 09:42:18', '2017-02-06 09:42:18');

-- ----------------------------
-- Table structure for user_accounts
-- ----------------------------
DROP TABLE IF EXISTS `user_accounts`;
CREATE TABLE `user_accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `qq` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weixin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weibo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user_accounts
-- ----------------------------
INSERT INTO `user_accounts` VALUES ('1', '1', '201313488', 'bqy0622', 'myweibo', '2016-12-04 12:47:13', '2016-12-04 12:47:18');

-- ----------------------------
-- Table structure for videos
-- ----------------------------
DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of videos
-- ----------------------------
INSERT INTO `videos` VALUES ('1', '心理测量者', '常守朱监查管', null, '1', '1', '2016-12-04 17:31:31', '2016-12-04 17:31:31');
INSERT INTO `videos` VALUES ('2', '杀手老师', '可乐色色,小渚', null, '1', '0', '2016-12-04 17:31:31', '2016-12-04 17:31:31');
INSERT INTO `videos` VALUES ('3', '小骨-对花', '尊上,你看到了吗', null, '2', '1', '2016-12-04 17:31:31', '2016-12-04 17:31:31');
