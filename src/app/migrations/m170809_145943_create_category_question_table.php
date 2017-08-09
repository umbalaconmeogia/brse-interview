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
			'category_id' => $this->defineForeignKey('category', 'id'),
			'question_id' => $this->defineForeignKey('question', 'id'),
        ]);
		if (Yii::$app->db->driverName != 'sqlite') {
			// add foreign key for table `category`
			$this->addForeignKey(
				'fk-category_question-category_id',
				'category_question',
				'category_id',
				'category',
				'id',
				'CASCADE'
			);
			// add foreign key for table `question`
			$this->addForeignKey(
				'fk-category_question-question_id',
				'category_question',
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
        $this->dropTable('category_question');
    }
}
