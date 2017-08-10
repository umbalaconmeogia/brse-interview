<?php

use batsg\migrations\BaseMigrationCreateTable;

/**
 * Handles the creation of table `category_question`.
 */
class m170809_145943_create_category_question_table extends BaseMigrationCreateTable
{
    /**
     * @var string
     */
    protected $table = 'category_question';
    
    /**
     * {@inheritDoc}
     * @see \batsg\migrations\BaseMigrationCreateTable::createDbTable()
     */
    protected function createDbTable()
    {
        $this->createTableWithExtraFields($this->table, [
            'id' => $this->primaryKey(),
            'category_id' => $this->defineForeignKey('category', 'id'),
            'question_id' => $this->defineForeignKey('question', 'id'),
        ]);
        
        $this->addComments($this->table, 'カテゴリー・質問');
        
        // Add foreign keys
        $this->addForeignKeys($this->table, [
            ['category_id', 'category'],
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
