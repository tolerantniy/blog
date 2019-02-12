<?php

use yii\db\Migration;

/**
 * Class m190211_184326_posts_init
 */
class m190211_184326_posts_init extends Migration
{

    /**
     * @var string $table
     */
    private $table = '{{%posts}}';

    /**
     * @var string $tablePostRows
     */
    private $tablePostRows = '{{%post_rows}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'text' => $this->string(10000),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);

        $this->createTable($this->tablePostRows, [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'text' => $this->string(10000),
        ]);

        $this->addForeignKey('FK_pr_parent_id', $this->tablePostRows, 'parent_id', $this->table, 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_pr_parent_id', $this->tablePostRows);
        $this->dropTable($this->tablePostRows);
        $this->dropTable($this->table);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190211_184326_posts_init cannot be reverted.\n";

        return false;
    }
    */
}
