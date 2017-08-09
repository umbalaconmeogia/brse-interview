<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category_question`.
 */
class m170809_145943_create_category_question_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('category_question', [
            'id' => $this->primaryKey(),
			'category_id' => $this->integer(),
			'question_id' => $this->integer(),
        ]);
		/*
        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-category_question-category_id',
            'category_question',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-category_question-question_id',
            'category_question',
            'question_id',
            'question',
            'id',
            'CASCADE'
        );
		*/
	}

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('category_question');
    }
}
