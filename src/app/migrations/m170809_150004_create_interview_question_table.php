<?php

use yii\db\Migration;

/**
 * Handles the creation of table `interview_question`.
 */
class m170809_150004_create_interview_question_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('interview_question', [
            'id' => $this->primaryKey(),
			'interview_id' => $this->integer(),
			'question_id' => $this->integer(),
        ]);
		/*
        // add foreign key for table `interview`
        $this->addForeignKey(
            'fk-interview_question-interview_id',
            'interview_question',
            'interview_id',
            'interview',
            'id',
            'CASCADE'
        );
        // add foreign key for table `interview`
        $this->addForeignKey(
            'fk-interview_question-question_id',
            'interview_question',
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
        $this->dropTable('interview_question');
    }
}
