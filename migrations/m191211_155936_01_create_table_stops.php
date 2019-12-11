<?php

use yii\db\Migration;

class m191211_155936_01_create_table_stops extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%stops}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'info' => $this->string(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%stops}}');
    }
}
