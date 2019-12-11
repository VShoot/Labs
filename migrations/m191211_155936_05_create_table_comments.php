<?php

use yii\db\Migration;

class m191211_155936_05_create_table_comments extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%comments}}', [
            'id' => $this->integer()->notNull(),
            'id_user' => $this->integer(),
            'id_train' => $this->integer(),
            'text' => $this->text(),
        ], $tableOptions);

        $this->createIndex('id_train', '{{%comments}}', 'id_train');
        $this->createIndex('id_user', '{{%comments}}', 'id_user');
        $this->addForeignKey('comments_ibfk_1', '{{%comments}}', 'id_train', '{{%trains}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('comments_ibfk_2', '{{%comments}}', 'id_user', '{{%users}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%comments}}');
    }
}
