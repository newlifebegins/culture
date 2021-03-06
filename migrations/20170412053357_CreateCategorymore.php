<?php

use Phpmig\Migration\Migration;

class CreateCategorymore extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="CREATE TABLE IF NOT EXISTS `cu_categorymore` (
           `catid` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '栏目ID',
           `module` varchar(15) NOT NULL DEFAULT '' COMMENT '所属模块',
           `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '类别',
           `modelid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '模型ID',
           `domain` varchar(200) NOT NULL DEFAULT '' COMMENT '栏目绑定域名',
           `parentid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
           `arrparentid` varchar(255) NOT NULL DEFAULT '' COMMENT '所有父ID',
           `child` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否存在子栏目，1存在',
           `arrchildid` mediumtext COMMENT '所有子栏目ID',
           `catname` varchar(30) NOT NULL DEFAULT '' COMMENT '栏目名称',
           `image` varchar(100) NOT NULL DEFAULT '' COMMENT '栏目图片',
           `description` mediumtext COMMENT '栏目描述',
           `parentdir` varchar(100) NOT NULL DEFAULT '' COMMENT '父目录',
           `catdir` varchar(30) NOT NULL DEFAULT '' COMMENT '栏目目录',
           `url` varchar(100) NOT NULL DEFAULT '' COMMENT '链接地址',
          `hits` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '栏目点击数',
          `setting` mediumtext COMMENT '相关配置信息',
          `listorder` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
          `ismenu` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示',
          `sethtml` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否生成静态',
         `letter` varchar(30) NOT NULL DEFAULT '' COMMENT '栏目拼音',
          PRIMARY KEY (`catid`),
          KEY `module` (`module`,`parentid`,`listorder`,`catid`),
         KEY `siteid` (`type`)
        ) ENGINE=InnoDB DEFAULT  CHARSET=utf8 COMMENT='栏目表' AUTO_INCREMENT=1 ;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
       $sql="DROP TABLE cu_categorymore;";   
       $container = $this->getContainer();
       $container['db']->query($sql);
    }
}
