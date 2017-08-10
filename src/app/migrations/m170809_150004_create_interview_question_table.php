<?php

use batsg\migrations\BaseMigrationCreateTable;

/**
 * Handles the creation of table `interview_question`.
 */
class m170809_150004_create_interview_question_table extends BaseMigrationCreateTable
{
    /**
     * @var string
     */
    protected $table = 'interview_question';
    
    /**
     * {@inheritDoc}
     * @see \batsg\migrations\BaseMigrationCreateTable::createDbTable()
     */
    protected function createDbTable()
    {
        $this->createTableWithExtraFields($this->table, [
            'id' => $this->primaryKey(),
            'interview_id' => $this->defineForeignKey('interview', 'id'),
            'question_id' => $this->defineForeignKey('question', 'id'),
            'usage' => [$this->smallInteger()->defaultValue(1), '使用状況'],
        ]);
        
        $this->addComments($this->table, '面接・質問');
        
        // Add foreign keys
        $this->addForeignKeys($this->table, [
            ['interview_id', 'interview'],
            ['question_id', 'question'],
        ]);
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
}
