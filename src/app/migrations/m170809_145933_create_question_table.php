<?php

use yii\db\Migration;

/**
 * Handles the creation of table `question`.
 */
class m170809_145933_create_question_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('question', [
            'id' => $this->primaryKey(),
			'question' => $this->text()->notNull(),
			'remarks' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('question');
    }
}
