<?php

use yii\db\Schema;
use yii\db\Migration;

class m160205_062201_create_configuration_table extends Migration
{
    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        /* MYSQL */
        if (!in_array('configuration', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%configuration}}', [
                    'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'key' => 'VARCHAR(256) NULL',
                    'value' => 'VARCHAR(256) NULL',
                    'group' => 'VARCHAR(128) NULL DEFAULT \'general\'',
                    'type' => 'ENUM(\'text\',\'textarea\',\'checkbox\',\'radio\',\'dropdown\') NULL DEFAULT \'text\'',
                    'description' => 'VARCHAR(512) NULL',
                    'ordering' => 'INT(11) NULL',
                    'options' => 'VARCHAR(512) NULL',
                ], $tableOptions_mysql);
            }
        }
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `configuration`');
        $this->execute('SET foreign_key_checks = 1;');
        return true;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
