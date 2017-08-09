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
			'interview_id' => $this->defineForeignKey('interview', 'id'),
			'question_id' => $this->defineForeignKey('question', 'id'),
        ]);
		if (Yii::$app->db->driverName != 'sqlite') {
			// add foreign key for table `interview`
			$this->addForeignKey(
				'fk-interview_question-interview_id',
				'interview_question',
				'interview_id',
				'interview',
				'id',
				'CASCADE'
			);
			// add foreign key for table `question`
			$this->addForeignKey(
				'fk-interview_question-question_id',
				'interview_question',
				'question_id',
				'question',
				'id',
				'CASCADE'
			);
		}
    }

	/**
	 * Return definition for a column that is a foreign key.
	 * If DB driver is sqlite, this will return definition with REFERENCES constrain,
	 * else it will return $this->integer()->notNull().
	 * @return mixed
	 */
	private function defineForeignKey($refTable, $refColumn)
	{
		return (Yii::$app->db->driverName == 'sqlite') ?
			"integer NOT NULL REFERENCES {$refTable}(${refColumn})" :
			$this->integer()->notNull();
	}

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('interview_question');
    }
}
