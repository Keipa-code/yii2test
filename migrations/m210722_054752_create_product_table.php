<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m210722_054752_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'product_name' => $this->string(50)->notNull(),
            'sku' => $this->string(20)->notNull(),
            'quantity' => $this->integer()->notNull(),
            'product_type' => $this->string(255),
            'image_url' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
