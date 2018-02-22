<?php

use Phpmig\Migration\Migration;

class AlterTablePolicyCulture2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `cu_policy_culture` 
CHANGE COLUMN `publish_content` `publish_content` TEXT NOT NULL COMMENT '内容' ;
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `cu_policy_culture` 
CHANGE COLUMN `publish_content` `publish_content` TEXT NOT NULL COMMENT '内容' ;

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}