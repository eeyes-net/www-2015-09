CREATE DATABASE IF NOT EXISTS `test`;

DROP TABLE IF EXISTS `test`.`test_news`;

CREATE TABLE IF NOT EXISTS `test`.`test_news` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'id',
  `title` VARCHAR(80) NOT NULL COMMENT '文章标题',
  `url` VARCHAR(100) NOT NULL COMMENT '文章链接',
  `updatetime` INT NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE = MyISAM CHARSET = utf8 COLLATE utf8_general_ci;

DROP TABLE IF EXISTS `test`.`test_ticket`;

CREATE TABLE IF NOT EXISTS `test`.`test_ticket` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'id',
  `actitle` VARCHAR(200) NOT NULL COMMENT '活动名称',
  `acwhere` VARCHAR(20) NOT NULL COMMENT '活动地点',
  `actime` VARCHAR(20) NOT NULL COMMENT '活动时间',
  PRIMARY KEY (`id`)
) ENGINE = MyISAM CHARSET = utf8 COLLATE utf8_general_ci;

INSERT INTO `test`.`test_news` (`title`, `url`, `updatetime`) VALUES
  ('专访张嘉佳：从你的全世界路过后，让我留在你身边', 'http://news.eeyes.net/index.php?m=content&c=index&a=show&catid=11&id=1176', '1413290605'),
  ('小伙伴们，注意了，社团同乐会来袭了', 'http://news.eeyes.net/index.php?m=content&c=index&a=show&catid=6&id=1175', '1413302993'),
  ('彭康书院2014手绘文化衫决赛举行', 'http://news.eeyes.net/index.php?m=content&c=index&a=show&catid=21&id=1177', '1413740243'),
  ('厨艺大赛精彩上演', 'http://news.eeyes.net/index.php?m=content&c=index&a=show&catid=21&id=1178', '1413826695'),
  ('同乘环保之舟，共达绿色彼岸', 'http://news.eeyes.net/index.php?m=content&c=index&a=show&catid=6&id=1184', '1429284241'),
  ('2015美国数学建模竞赛颁奖暨动员大会举行', 'http://news.eeyes.net/index.php?m=content&c=index&a=show&catid=21&id=1191', '1429546395'),
  ('【活动预告】GRE教主琦叔驾到！', 'http://news.eeyes.net/index.php?m=content&c=index&a=show&catid=6&id=1192', '1431790112'),
  ('专访feeling音乐社社长强磊：坚强的花蕾', 'http://news.eeyes.net/index.php?m=content&c=index&a=show&catid=21&id=1193', '1432482241'),
  ('“最美的风景在路上”——记《自行车日记》首发分享沙龙', 'http://news.eeyes.net/index.php?m=content&c=index&a=show&catid=21&id=1194', '1432651438'),
  ('我校学生创业项目获300万天使投资', 'http://news.eeyes.net/index.php?m=content&c=index&a=show&catid=6&id=1195', '1460443815');

INSERT INTO `test`.`test_ticket` (`actitle`, `acwhere`, `actime`) VALUES
  ('第十三届金秋外语节英语辩论赛（总决赛）', '外文楼B座10楼报告厅', 1448121600),
  ('新尚超市会员卡办理即将开始', '新尚指定位置', '1448726400');
