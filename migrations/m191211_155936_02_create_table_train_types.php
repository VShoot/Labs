<?php

use yii\db\Migration;

class m191211_155936_02_create_table_train_types extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%train_types}}', [
            'id' => $this->primaryKey(),
            'numberPlaces' => $this->string(11),
            'typeName' => $this->string(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%train_types}}');
    }
}
