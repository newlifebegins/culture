<?php

use Phpmig\Migration\Migration;

class CreateNews extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="CREATE TABLE IF NOT EXISTS `cu_news` (
          `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
          `catid` smallint(5) unsigned NOT NULL DEFAULT '0',
         `typeid` smallint(5) unsigned NOT NULL DEFAULT '0',
         `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
         `style` varchar(24) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
         `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
         `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
         `tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
         `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
         `posid` tinyint(1) unsigned NOT NULL DEFAULT '0',
         `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
         `listorder` tinyint(3) unsigned NOT NULL DEFAULT '0',
         `status` tinyint(2) unsigned NOT NULL DEFAULT '1',
         `sysadd` tinyint(1) unsigned NOT NULL DEFAULT '0',
         `islink` tinyint(1) unsigned NOT NULL DEFAULT '0',
         `username` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
         `inputtime` int(10) unsigned NOT NULL DEFAULT '0',
         `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
         `views` int(11) NOT NULL DEFAULT '0' COMMENT '点击总数',
        `yesterdayviews` int(11) NOT NULL DEFAULT '0' COMMENT '最日',
        `dayviews` int(10) NOT NULL DEFAULT '0' COMMENT '今日点击数',
        `weekviews` int(10) NOT NULL DEFAULT '0' COMMENT '本周访问数',
        `monthviews` int(10) NOT NULL DEFAULT '0' COMMENT '本月访问',
         `viewsupdatetime` int(10) NOT NULL DEFAULT '0' COMMENT '点击数更新时间',
         `vurl` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '视频地址',
        `ref_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
        PRIMARY KEY (`id`),
        KEY `status` (`status`,`listorder`,`id`),
        KEY `listorder` (`catid`,`status`,`listorder`,`id`),
        KEY `catid` (`catid`,`weekviews`,`views`,`dayviews`,`monthviews`,`status`,`id`),
        KEY `thumb` (`thumb`)
       ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1  ;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql="DROP TABLE `cu_news;";   
    $container = $this->getContainer();
    $container['db']->query($sql);
    }
}
