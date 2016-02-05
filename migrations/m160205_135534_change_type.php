<?php

use yii\db\Schema;
use yii\db\Migration;

class m160205_135534_change_type extends Migration
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
        if (in_array('configuration', $tables))  {
            if ($dbType == "mysql") {
                $this->alterColumn('{{%configuration}}',
                    'type',
                    'ENUM(\'text\',\'textarea\',\'checkbox\',\'radio\',\'dropdown\',\'date\',\'datetime\') NULL DEFAULT \'text\''
                );
            }
        }
    }

    public function down()
    {
        $this->alterColumn('{{%configuration}}', 'type' ,'ENUM(\'text\',\'textarea\',\'checkbox\',\'radio\',\'dropdown\') NULL DEFAULT \'text\'');
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
