<?php

use yii\db\Migration;

class m200927_105349_create_table_category extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%category}}',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
                'discountPercent' => $this->integer()->notNull(),
                'defaultPictureURL' => $this->string()->notNull(),
                'description' => $this->string(512)->notNull(),
                'warehouseName' => $this->string()->notNull(),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%category}}');
    }
}
