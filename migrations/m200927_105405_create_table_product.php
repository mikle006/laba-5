<?php

use yii\db\Migration;

class m200927_105405_create_table_product extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%product}}',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
                'expDate' => $this->date()->notNull(),
                'createDate' => $this->date()->notNull(),
                'photoURL' => $this->string()->notNull(),
                'categoryID' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('categoryID', '{{%product}}', ['categoryID']);

        $this->addForeignKey(
            'product_ibfk_1',
            '{{%product}}',
            ['categoryID'],
            '{{%category}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('{{%product}}');
    }
}
