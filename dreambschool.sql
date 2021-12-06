/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50723
 Source Host           : localhost:3306
 Source Schema         : dreambschool

 Target Server Type    : MySQL
 Target Server Version : 50723
 File Encoding         : 65001

 Date: 06/12/2021 13:54:46
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for adminuser
-- ----------------------------
DROP TABLE IF EXISTS `adminuser`;
CREATE TABLE `adminuser`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nickname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of adminuser
-- ----------------------------
INSERT INTO `adminuser` VALUES (1, 'test', 'fb469d7ef430b0baf0cab6c436e70375', '管理员');

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `des` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `reader` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `weight` int(255) NOT NULL DEFAULT 0,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `thumb` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES (1, '企业网站内容营销文案怎么写？', '企业网站上线之后，就进入了运营阶段。而内容营销，是企业网站运营的重要工作之一。而如何创作内容营销文案', '<p>test</p>', '0', 0, '2021-05-06 22:45:25', '/imgs/article/5eccac6627ec5.jpg');
INSERT INTO `article` VALUES (2, '企业网站内容营销文案怎么写？', '企业网站上线之后，就进入了运营阶段。而内容营销，是企业网站运营的重要工作之一。而如何创作内容营销文案', '<p>test</p>', '0', 0, '2021-05-06 22:45:31', '/imgs/article/5eccac6627ec5.jpg');
INSERT INTO `article` VALUES (3, '企业网站内容营销文案怎么写？', '企业网站上线之后，就进入了运营阶段。而内容营销，是企业网站运营的重要工作之一。而如何创作内容营销文案', '<p>test</p>', '0', 0, '2021-04-25 20:05:12', '/imgs//609407c9462f8.jpg');
INSERT INTO `article` VALUES (4, '企业网站内容营销文案怎么写？', '企业网站上线之后，就进入了运营阶段。而内容营销，是企业网站运营的重要工作之一。而如何创作内容营销文案', '<p>test</p>', '0', 0, '2021-04-25 20:05:12', NULL);
INSERT INTO `article` VALUES (5, '企业网站内容营销文案怎么写？', '企业网站上线之后，就进入了运营阶段。而内容营销，是企业网站运营的重要工作之一。而如何创作内容营销文案', '<p>test</p>', '0', 0, '2021-04-25 20:05:12', NULL);

-- ----------------------------
-- Table structure for banner
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner`  (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO `banner` VALUES (1, 'banner1.jpg', 'index', '首页轮播1');
INSERT INTO `banner` VALUES (2, 'banner2.jpg?1620916472', 'index', '首页轮播2');
INSERT INTO `banner` VALUES (3, 'banner3.jpg?1620916477', 'index', '首页轮播3');
INSERT INTO `banner` VALUES (4, 'banner4.jpg', 'index', '首页轮播4');
INSERT INTO `banner` VALUES (5, 'banner_2.jpg', 'index', '首页banner');
INSERT INTO `banner` VALUES (6, 'banner.jpg', 'aboutus', '关于我们banner');
INSERT INTO `banner` VALUES (7, 'banner.jpg', 'service', '业务板块banner');
INSERT INTO `banner` VALUES (8, 'map1.jpg', 'aboutus', '店铺图1');
INSERT INTO `banner` VALUES (9, 'map2.jpg', 'aboutus', '店铺图2');
INSERT INTO `banner` VALUES (10, 'history.png?1622029929', 'aboutus', '公司大事记');
INSERT INTO `banner` VALUES (11, 'art1.png?1622029908', 'service', '业务图1');
INSERT INTO `banner` VALUES (12, 'art2.jpg', 'service', '业务图2');
INSERT INTO `banner` VALUES (13, 'art3.jpg', 'service', '业务图3');
INSERT INTO `banner` VALUES (14, 'bg1_on.jpg?1620916824', 'index', '首页业务1彩');
INSERT INTO `banner` VALUES (15, 'bg1.jpg?1620916871', 'index', '首页业务1灰');
INSERT INTO `banner` VALUES (16, 'bg2_on.jpg', 'index', '首页业务2彩');
INSERT INTO `banner` VALUES (17, 'bg2.jpg', 'index', '首页业务2灰');
INSERT INTO `banner` VALUES (18, 'bg3_on.jpg', 'index', '首页业务3彩');
INSERT INTO `banner` VALUES (19, 'bg3.jpg', 'index', '首页业务3灰');

-- ----------------------------
-- Table structure for joinus
-- ----------------------------
DROP TABLE IF EXISTS `joinus`;
CREATE TABLE `joinus`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `num` int(11) NULL DEFAULT 1,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of joinus
-- ----------------------------
INSERT INTO `joinus` VALUES (1, '法务经理', 1, '<p><strong>岗位名称</strong></p><p><span class=\"ql-size-small\">新媒体写手</span></p><p><strong>招聘人数</strong></p><p><span class=\"ql-size-small\">2人</span></p><p><strong>岗位职责</strong></p><p><span class=\"ql-size-small\">1. 负责公司旗下各新媒体渠道（包括微信、知乎、微博、小红书、头条等）内容运营工作，包括撰写、排版推送、粉丝互动等</span></p><p><span class=\"ql-size-small\">2. 对公司产品文案、活动文案、宣传文案等进行内容支持</span></p><p><span class=\"ql-size-small\">3. 跟踪自媒体内容运营效果，分析数据并及时反馈优化</span></p><p><strong>岗位要求</strong></p><p><span class=\"ql-size-small\">1. 本科以上学历，2年以上微信公众平台运营经验，30岁以下</span></p><p><span class=\"ql-size-small\">2. 了解互联网运营规律，行动力强，文笔好，沟通和团队协作能力强</span></p><p><span class=\"ql-size-small\">3. 熟悉教育行业、知识付费、留学生者优先</span></p>');
INSERT INTO `joinus` VALUES (2, '法务经理', 1, '<p><strong>岗位名称</strong></p><p><span class=\"ql-size-small\">新媒体写手</span></p><p><strong>招聘人数</strong></p><p><span class=\"ql-size-small\">2人</span></p><p><strong>岗位职责</strong></p><p><span class=\"ql-size-small\">1. 负责公司旗下各新媒体渠道（包括微信、知乎、微博、小红书、头条等）内容运营工作，包括撰写、排版推送、粉丝互动等</span></p><p><span class=\"ql-size-small\">2. 对公司产品文案、活动文案、宣传文案等进行内容支持</span></p><p><span class=\"ql-size-small\">3. 跟踪自媒体内容运营效果，分析数据并及时反馈优化</span></p><p><strong>岗位要求</strong></p><p><span class=\"ql-size-small\">1. 本科以上学历，2年以上微信公众平台运营经验，30岁以下</span></p><p><span class=\"ql-size-small\">2. 了解互联网运营规律，行动力强，文笔好，沟通和团队协作能力强</span></p><p><span class=\"ql-size-small\">3. 熟悉教育行业、知识付费、留学生者优先</span></p>');
INSERT INTO `joinus` VALUES (3, '法务经理', 1, '<p><strong>岗位名称</strong></p><p><span class=\"ql-size-small\">新媒体写手</span></p><p><strong>招聘人数</strong></p><p><span class=\"ql-size-small\">2人</span></p><p><strong>岗位职责</strong></p><p><span class=\"ql-size-small\">1. 负责公司旗下各新媒体渠道（包括微信、知乎、微博、小红书、头条等）内容运营工作，包括撰写、排版推送、粉丝互动等</span></p><p><span class=\"ql-size-small\">2. 对公司产品文案、活动文案、宣传文案等进行内容支持</span></p><p><span class=\"ql-size-small\">3. 跟踪自媒体内容运营效果，分析数据并及时反馈优化</span></p><p><strong>岗位要求</strong></p><p><span class=\"ql-size-small\">1. 本科以上学历，2年以上微信公众平台运营经验，30岁以下</span></p><p><span class=\"ql-size-small\">2. 了解互联网运营规律，行动力强，文笔好，沟通和团队协作能力强</span></p><p><span class=\"ql-size-small\">3. 熟悉教育行业、知识付费、留学生者优先</span></p>');
INSERT INTO `joinus` VALUES (4, '法务经理', 1, '<p><strong>岗位名称</strong></p><p><span class=\"ql-size-small\">新媒体写手</span></p><p><strong>招聘人数</strong></p><p><span class=\"ql-size-small\">2人</span></p><p><strong>岗位职责</strong></p><p><span class=\"ql-size-small\">1. 负责公司旗下各新媒体渠道（包括微信、知乎、微博、小红书、头条等）内容运营工作，包括撰写、排版推送、粉丝互动等</span></p><p><span class=\"ql-size-small\">2. 对公司产品文案、活动文案、宣传文案等进行内容支持</span></p><p><span class=\"ql-size-small\">3. 跟踪自媒体内容运营效果，分析数据并及时反馈优化</span></p><p><strong>岗位要求</strong></p><p><span class=\"ql-size-small\">1. 本科以上学历，2年以上微信公众平台运营经验，30岁以下</span></p><p><span class=\"ql-size-small\">2. 了解互联网运营规律，行动力强，文笔好，沟通和团队协作能力强</span></p><p><span class=\"ql-size-small\">3. 熟悉教育行业、知识付费、留学生者优先</span></p>');
INSERT INTO `joinus` VALUES (5, '法务经理', 1, '<p><strong>岗位名称</strong></p><p><span class=\"ql-size-small\">新媒体写手</span></p><p><strong>招聘人数</strong></p><p><span class=\"ql-size-small\">2人</span></p><p><strong>岗位职责</strong></p><p><span class=\"ql-size-small\">1. 负责公司旗下各新媒体渠道（包括微信、知乎、微博、小红书、头条等）内容运营工作，包括撰写、排版推送、粉丝互动等</span></p><p><span class=\"ql-size-small\">2. 对公司产品文案、活动文案、宣传文案等进行内容支持</span></p><p><span class=\"ql-size-small\">3. 跟踪自媒体内容运营效果，分析数据并及时反馈优化</span></p><p><strong>岗位要求</strong></p><p><span class=\"ql-size-small\">1. 本科以上学历，2年以上微信公众平台运营经验，30岁以下</span></p><p><span class=\"ql-size-small\">2. 了解互联网运营规律，行动力强，文笔好，沟通和团队协作能力强</span></p><p><span class=\"ql-size-small\">3. 熟悉教育行业、知识付费、留学生者优先</span></p>');
INSERT INTO `joinus` VALUES (6, '法务经理', 1, '66');

-- ----------------------------
-- Table structure for people
-- ----------------------------
DROP TABLE IF EXISTS `people`;
CREATE TABLE `people`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `des` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `thumb` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `type` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of people
-- ----------------------------
INSERT INTO `people` VALUES (1, '/imgs/people/60940c8ccbec7.png', 'Huddersfield大学应用数学 博士<br>上海光华学院剑桥国际中心 校长', '/imgs/people/60856a497b753.jpg', '<p>test</p>', 1);
INSERT INTO `people` VALUES (2, '/imgs/people/608573e0770ee.png', '斯坦福大学 硕士<br>学之行教育 创始人及董事', '/imgs/people/608573e518c4c.jpg', '', 1);
INSERT INTO `people` VALUES (3, '/imgs/people/60857405326c3.png', '复旦大学经济学 博士<br>国泰君安金融控股公司 副总经理', '/imgs/people/6085740a7a3f7.jpg', '', 1);
INSERT INTO `people` VALUES (4, '/imgs/people/60857405326c3.png', '复旦大学经济学 博士<br>国泰君安金融控股公司 副总经理', '/imgs/people/6085740a7a3f7.jpg', '', 1);
INSERT INTO `people` VALUES (5, '/imgs/people/608573e0770ee.png', '斯坦福大学 硕士<br>学之行教育 创始人及董事', '/imgs/people/608573e518c4c.jpg', '', 1);
INSERT INTO `people` VALUES (7, NULL, '高尔基', '/imgs/people/60882a298590b.jpg', '<p>读书有时会使人突然明白生活的意义，使他找到自己在生活中的位置。</p>', 2);
INSERT INTO `people` VALUES (8, NULL, '夏承焘', '/imgs/people/60882c96ae9be.jpg', '<p>“必读书要多，案头书要少。”我以为案头只能摆两本书，一本是精读的。另一本是泛读的，作为调剂。</p>', 2);
INSERT INTO `people` VALUES (9, NULL, '李霁野', '/imgs/people/60882ced75ed1.jpg', '<p>我们和十个人相交，未必有两三位可以成为朋友。从书中所得到的友谊温情，比例却比较高。</p>', 2);
INSERT INTO `people` VALUES (10, NULL, '林语堂', '/imgs/people/60882cd8c4ec7.jpg', '<p>读书不可以强读，强读必无效，反而有害，这是读书之第一义。</p>', 2);

-- ----------------------------
-- Table structure for service
-- ----------------------------
DROP TABLE IF EXISTS `service`;
CREATE TABLE `service`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `uid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'html的id属性',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of service
-- ----------------------------
INSERT INTO `service` VALUES (1, '职业发展', '通过职业能力测评和职业生涯规划访谈，与你一起确定个性化的求职、职业发展和背景提升的目标和辅导步骤。\r行业精英一站式求职辅导，结合行业特点，从简历呈现，到面试技巧，为你量身打造面试剧本。各行业专家结合真实职业场景打磨并亲授，金融建模、财务分析、商业分析等职业技能专项训练，打造职场胜任力，赋能职业成长。\r个人成长教练通过深层次的倾听、强有力的提问，帮你理清思路，发觉自己的潜能和智慧，告别消耗你的焦虑和困惑，聚焦能量，笃定前行，收获更好的自己。\r', '/service#develop', 'develop');
INSERT INTO `service` VALUES (2, '创新训练', '引进国内外最前沿的创新理论、工具、方法，打造一流的创新训练课程，提升创新思维，培养创新能力。 在梦想商学院除了教授创新知识体系，更注重商业实战，七大创新法则、世界咖啡等方法催生创新想法，沙盘模拟和案例讨论等方法落地创新想法，诞生伟大的创新实践。 创建企业家和高管的创新实践交流平台，交流心得体会和经验教训，为你的创新发展提供源源不断的能量和动力。', '/service#training', 'training');
INSERT INTO `service` VALUES (3, '创业孵化', '梦想商学院不但是创业者集聚的联合场所，也是创新创意中心以及创新产品的展示场所，更是思想交流、思维碰撞的道场。 梦想商学院联合各领域顶尖的梦想导师引进国内外的精品课程，打造权威的、一流的创业课程体系。企业家和投资者的贴身辅导，为创业者提供全方位的指导、助力、赋能。 在大众创业万众创新的时代洪流中，梦想商学院聚合创业专家和优质资源，提供创业孵化及投融资多方面的支持，引领高成长性创业项目发展，成就一代年轻人的梦想！', '/service#incubation', 'incubation');
INSERT INTO `service` VALUES (4, '公司介绍', '梦想商学院是光华教育集团最重要的教育创新举措之一，聚汇高端人才与资源，创建与引进全球精品教育和创新服务，除了提供高品质的线上课程，梦想商学院以上海和杭州为起点，打造线下实体商学院，旨在为光华学子和青年才俊赋能职业成长，成就事业梦想!\n<br>\n梦想商学院精心打造职业发展、创新训练、创业孵化三大服务模块，为个人成才和事业成就提供持续的引领、赋能和陪伴。\n培养未来的职场精英和青年领袖，引领高成长性企业发展，成就一代年轻人的梦想!', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
