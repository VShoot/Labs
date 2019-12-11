<?php

use yii\db\Migration;

class m191211_155936_03_create_table_trains extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%trains}}', [
            'id' => $this->primaryKey(),
            'type_id' => $this->integer(),
            'number' => $this->string(100)->notNull(),
            'id_stationStart' => $this->integer(),
            'id_stationFinish' => $this->integer(),
        ], $tableOptions);

        $this->createIndex('id_stationFinish', '{{%trains}}', 'id_stationFinish');
        $this->createIndex('type_id', '{{%trains}}', 'type_id');
        $this->createIndex('id_stationStart', '{{%trains}}', 'id_stationStart');
        $this->addForeignKey('trains_ibfk_1', '{{%trains}}', 'type_id', '{{%train_types}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('trains_ibfk_2', '{{%trains}}', 'id_stationStart', '{{%stops}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('trains_ibfk_3', '{{%trains}}', 'id_stationFinish', '{{%stops}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%trains}}');
    }
}
